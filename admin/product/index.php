<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/include/protect.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/include/connect.php";
$nbPerPage = 50;
$page = 1;
if (isset($_GET['p']) && $_GET['p'] > 0) {
    $page = $_GET['p'];
}
$sql = "SELECT COUNT(*) AS total FROM table_product";
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();
$total = $row['total'];
$sql = "SELECT * FROM table_product LEFT JOIN table_type ON table_product.product_type_id=table_type.type_id ORDER BY product_name ASC LIMIT :offset, :limit";
$stmt = $db->prepare($sql);
$stmt->bindValue(":offset", ($page - 1) * $nbPerPage, PDO::PARAM_INT);
$stmt->bindValue(":limit", $nbPerPage, PDO::PARAM_INT);
$stmt->execute();
$recordset = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Couverture</th>
                <th scope="col">Série</th>
                <th scope="col">Title</th>
                <th scope="col">Prix</th>
                <th scope="col">Stock</th>
                <th scope="col">Auteur</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recordset as $row) { ?>
                <tr border="">
                    <td>
                        <?php if ($row['product_image'] != "") { ?>
                            <img src="/upload/product/xs_<?= htmlspecialchars($row['product_image']); ?>" alt="Couverture de la BD:<?= $row['product_name']; ?>" width="100%">
                    </td>
                <?php } ?>
                <td><?= htmlspecialchars($row['product_serie']); ?></td>
                <td><?= htmlspecialchars($row['product_name']); ?></td>
                <td><?= htmlspecialchars($row['product_price']); ?></td>
                <td><?= htmlspecialchars($row['product_stock']); ?></td>
                <td><?= htmlspecialchars($row['product_author']); ?></td>
                <td><?= htmlspecialchars($row['type_name']); ?></td>
                <td class="actions">
                    <a class="bouton" role="button" href="form.php?id=<?= htmlspecialchars($row['product_id']); ?>']">Modifier</a>
                    <button data-id="<?= htmlspecialchars($row['product_id']) ?>" class="btn_delete"> Supprimer </button>
                    <!-- <a class="bouton" role="button" href="delete.php?id= <?= htmlspecialchars($row['product_id']); ?>']">Supprimer</a> -->
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div id="modal_delete">
        <p> Certain ?</p>
        <a class="btn-warning" id="modal_confirm">Oui</a>
        <button id="modal_cancel">Annuler</button>
    </div>
    <ul>
        <?php for ($i = 1; $i <= ceil($total / $nbPerPage); $i++) { ?>
            <li> <a href=" index.php?p=<?= $i; ?>"><?= $i; ?></a></li>
        <?php } ?>
    </ul>
    <span style="display: none" id="token"><?= $_SESSION['token']; ?>;</span>
    <!-- on met sur une seule ligne le span car js interprète le retour à la ligne comme un espace-->
</body>
<script>
    let btns = document.querySelectorAll(".btn_delete");
    btns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            document.getElementById("modal_confirm").setAttribute("href", "delete.php?id=" + btn.getAttribute("data-id") + "&token=<?= $_SESSION['token']; ?>");
            document.getElementById("modal_delete").style.display = "block";
        })
    })
    document.getElementById("modal_cancel").addEventListener("click", function() {
        document.getElementById("modal_delete").style.display = "none";
    })
</script>

</html>