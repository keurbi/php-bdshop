<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/include/connect.php";

$sql = "SELECT * FROM table_product LIMIT 12";
$stmt = $db->prepare($sql);
$stmt->execute();
$recordset = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANIER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="listing.css">
</head>

<body>
    <div class="products  ">
        <div class="row container-fluid">
            <?php
            foreach ($recordset as $row) { ?>
                <div class="product col-4">
                    <h4 class="product_title"><?= $row['product_name']; ?></h4>
                    <?php
                    if (!empty($row['product_image'])) { ?>
                        <img src="/upload/product/xs_<?= $row['product_image']; ?>" alt=" <?= $row['product_serie'] . $row['product_author'] ?>" title=" <?= $row['product_serie'] . $row['product_author'] ?>" class="product_image">
                    <?php } else {
                        echo "<p class='cent'>Désolé nous n'avons pas d'image pour ce livre</p>";
                    } ?>
                    <button class="product_add" data-id="<?= $row['product_id']; ?>">+</button>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="cart">
        <h3>Shopping Cart</h3>
        <hr />
        <ul class="added_products">

        </ul>
    </div>
</body>
<script>
    // on sélectionne tous les éléments avec la classe donnée (tous les boutons donc)
    let btns = document.querySelectorAll(".product_add");
    // on boucle sur notre tableau de boutons pour mieux cibler le bouton cliqué
    btns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            // on fetch vers notre fichier qui nous renvoie les données du produit en question
            fetch("addCart.php?product_id=" + btn.getAttribute("data-id"))
                .then(function(response) {
                    return response.json();
                    //on réceptionne la réponse de notre fichier en json
                })
                .then(function(data) {
                    document.getElementById("added_products").innerHTML = "";
                    data.forEach(function(cart) {
                        document.getElementById("added_products").append(cart.product_name);
                        document.getElementById("added_products").append(cart.product_image);
                        document.getElementById("added_products").append(cart.product_price);
                        document.getElementById("added_products").append(cart.cart_quantity);
                    })
                })
        })
    })
</script>

</html>