<?php
// On appelle le fichier protect.php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/include/protect.php";
// On se lie a la base de donnée qui est dans un autre dossier
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/include/connect.php";
include "config.php";
// On veut savoir l'extension du fichier
// generatefilename à 2 paramètre : le nom de fichier et le nom qu'on veut lui donner
function generateFilename($filename, $title)
{
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $title = str_replace(" ", "-", $title);
    // strtolower = mettre tout en minuscule
    $arrayKO = ["à", "â", "ä", " "]; // à compléter
    $arrayOK = ["a", "a", "a", "-"]; // à compléter
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $title = str_replace($arrayKO, $arrayOK, $title);
    return date("Ymdhis") . "-" . strtolower($title . "." . $extension);
}

// Permet la modification d'un champ
if (isset($_POST['product_id']) && $_POST['product_id'] > 0) {
    // Requête Update
    $sql = "UPDATE table_product SET product_name= :product_name,product_serie= :product_serie, product_author= :product_author, product_stock= :product_stock , product_type_id= :product_type_id WHERE product_id= :product_id";
    $stmt = $db->prepare($sql);
    // Mettre la valeur enregistrée a la bonne place
    $stmt->bindValue(":product_id", $_POST['product_id']);
} else {
    // Permet ajout dans un champ de la bdd
    // Requête insert into
    $sql = "INSERT INTO table_product (product_name,product_serie,product_author,product_stock,product_type_id)
        VALUES (:product_name, :product_serie, :product_author, :product_stock, :product_type_id)";
    $stmt = $db->prepare($sql);
}
// Mettre la valeur enregistrée à la bonne place // Sorti du if pour les écrire qu'une fois au lieu de l'écrire dans chaque cas
$stmt->bindValue(":product_name", $_POST['product_name']);
$stmt->bindValue(":product_serie", $_POST['product_serie']);
$stmt->bindValue(":product_author", $_POST['product_author']);
$stmt->bindValue(":product_stock", $_POST['product_stock']);
$stmt->bindValue(":product_type_id", $_POST['product_type_id']);

// Pareil que les valeurs du dessus (éviter les doublons)
$stmt->execute();

$path = $_SERVER["DOCUMENT_ROOT"] . "/upload/product/";
//chemin vers dossier d'images

if (isset($_FILES['product_image']) && $_FILES['product_image']['name'] != "" && $_FILES['product_image']['error'] == 0) {
    if (isset($_POST['product_id']) && $_POST['product_id'] > 0) {
        //si on a une image et que c'est une modification
        $sql = "SELECT product_image FROM table_product WHERE product_id = :product_id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':product_id' => $_POST['product_id']]);
        if ($row = $stmt->fetch()) {
            if ($row['product_image'] != "") {
                foreach ($images as $image) {
                    if (file_exists($path . $image['prefix'] . "_" . $row['product_image'])) {
                        unlink($path . $image['prefix'] . "_" . $row['product_image']);
                    }
                }
            }
        }
    }
    $filename = generateFilename($_FILES['product_image']['name'], $_POST['product_name']);
    move_uploaded_file($_FILES['product_image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] . "/upload/product/" . $filename);
    $prefix = "";
    foreach ($images as $image) {
        $imgDestWidth = $image['width'];
        $imgDestHeight = $image['height'];
        switch ($_FILES['product_image']['type']) {
            case
            "image/jpeg":
                $imgSrc = imagecreatefromjpeg($path . $prefix . $filename);
                break;
            case
            "image/png":
                $imgSrc = imagecreatefrompng($path . $prefix . $filename);
                break;
            case
            "image/gif":
                $imgSrc = imagecreatefromgif($path . $prefix . $filename);
                break;
            default:
                echo "oups";
                exit();
        }
        $sizes = getimagesize($path . $prefix . $filename);
        $imageSrcWidth = $sizes[0];
        $imageSrcHeight = $sizes[1];
        $toResize = true;
        if ($imageSrcWidth > $imageSrcHeight) {
            //paysage
            if ($image['width'] == $image['height']) {
                //crop
                $imgSrcZoneX = round(($imageSrcWidth - $imageSrcHeight) / 2);
                $imgSrcZoneY = 0;
                $imgSrcZoneWidth = $imageSrcHeight;
                $imgSrcZoneHeight = $imageSrcHeight;
            } else {
                //resize
                if ($imageSrcWidth <= $imgDestWidth) {
                    //pas de resize
                    $toResize = false;
                }
                $imgDestHeight = round($imageSrcHeight * $imgDestWidth / $imageSrcWidth);
                $imgSrcZoneX = 0;
                $imgSrcZoneY = 0;
                $imgSrcZoneWidth = $imageSrcWidth;
                $imgSrcZoneHeight = $imageSrcHeight;
            }
        } else {
            //portrait
            if ($image['width'] == $image['height']) {
                //crop
                $imgSrcZoneX = 0;
                $imgSrcZoneY = round(($imageSrcHeight - $imageSrcWidth) / 2);
                $imgSrcZoneWidth = $imageSrcWidth;
                $imgSrcZoneHeight = $imageSrcWidth;
            } else {
                //resize
                if ($imageSrcHeight <= $imgDestHeight) {
                    //pas de resize
                    $toResize = false;
                }
                $imgDestHeight = round($imageSrcWidth * $imgDestHeight / $imageSrcHeight);
                $imgSrcZoneX = 0;
                $imgSrcZoneY = 0;
                $imgSrcZoneWidth = $imageSrcWidth;
                $imgSrcZoneHeight = $imageSrcHeight;
            }
            //portrait
        }
        if ($toResize) {
            $imgDest = imagecreatetruecolor($imgDestWidth, $imgDestHeight);
            imagecopyresampled($imgDest, $imgSrc, 0, 0, $imgSrcZoneX, $imgSrcZoneY, $imgDestWidth, $imgDestHeight, $imgSrcZoneWidth, $imgSrcZoneHeight);
            switch ($_FILES['product_image']['type']) {
                case
                "image/jpeg":
                    $imgSrc = imagejpeg($imgDest, $path . $image['prefix'] . "_" . $filename, 97);
                    break;
                case
                "image/png":
                    $imgSrc = imagepng($imgDest, $path . $image['prefix'] . "_" . $filename, 5);
                    break;
                case
                "image/gif":
                    $imgSrc = imagegif($imgDest, $path . $image['prefix'] . "_" . $filename);
                    break;
            }
        } else {
            copy($path . $prefix . $filename, $path . $image['prefix'] . "_" . $filename);
        }
        if ($image['width'] != $image['height']) {
            $prefix = $image['prefix'] . "_";
        }
    }
    unlink($path . $filename);
    $sql = "UPDATE table_product SET product_image= :product_image WHERE product_id = :product_id ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":product_image", $filename, PDO::PARAM_STR);
    $stmt->bindValue(":product_id", ($_POST['product_id'] > 0 ? $_POST['product_id'] : $db->lastInsertId()), PDO::PARAM_INT);
    $stmt->execute();
}

// Redirection
header("Location:index.php");
