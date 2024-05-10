<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/include/connect.php";
include $_SERVER['DOCUMENT_ROOT'] . "/poo/Product.class.php";

$sql = "SELECT * FROM table_product WHERE product_id=:id";
$stmt = $db->prepare($sql);
$stmt->execute([":id" => 42]);
if ($row = $stmt->fetch()) {
    $product = new Product($row);
    echo $product->getName();
    var_dump($product);
}
