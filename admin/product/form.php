<?php
    include $_SERVER["DOCUMENT_ROOT"]."/admin/include/protect.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/admin/include/connect.php";
    $product_name="";
    $product_serie="";
    $product_id=0;
    $product_author="";
    $product_stock=0;
    $product_type_id=0;
    if(isset ($_GET['id']) && $_GET['id']>0){
        $sql="SELECT * FROM table_product WHERE product_id=:product_id";
        $stmt=$db->prepare($sql);
        $stmt->bindValue(":product_id",$_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        if($row=$stmt->fetch()){
            $product_name=$row['product_name'];
            $product_serie=$row['product_serie'];
            $product_id=$row['product_id'];
            $product_author=$row['product_author'];
            $product_stock=$row['product_stock'];
            $product_type_id=$row['product_type_id'];
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formu</title>
    <link rel="stylesheet" href="css/styleForm.css">
</head>
<body>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="product_image">Image</label>
        <input type="file" name="product_image" id="product_image">
        <label for="product_name">Titre</label>
        <input type="text" id="product_name" name="product_name" value="<?= htmlspecialchars($product_name);?>">
        <label for="product_serie">Série</label>
        <input type="text" id="product_serie" name="product_serie" value="<?= htmlspecialchars($product_serie);?>">
        <label for="product_author">Auteur</label>
        <input type="text" id="product_author" name="product_author" value="<?= htmlspecialchars($product_author);?>">
        <label for="product_stock">Stock</label>
        <input type="text" id="product_stock" name="product_stock" value="<?= htmlspecialchars($product_stock);?>">
        <input type="hidden" name="product_id" value="<?= $product_id;?>">
        <label for="product_type_id">Type</label>
        <select id="product_type_id" name="product_type_id" required>
            <option value="0">Sélectionnez un élément</option>
            <?php $sqlType="SELECT * FROM table_type";
            $stmtType=$db->prepare($sqlType);
            $stmtType->execute();
            $recordsetType=$stmtType->fetchAll();
            foreach ($recordsetType as $rowType){?>
                <option value="<?= $rowType['type_id'];?>"<?= $rowType['type_id']==$product_type_id?"selected":"";?>>
                <?= $rowType['type_name'];?>
                </option>
            <?php } ?>
        </select>
        <input class="bouton"type="submit" value="Enregistrer">
    </form>
</body>
</html>