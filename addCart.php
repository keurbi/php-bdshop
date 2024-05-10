<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/include/connect.php";

if (isset($_GET['product_id'])) {
    $sql = "SELECT product_name, product_image, product_price, cart_quantity FROM table_cart INNER JOIN table_product WHERE table_cart.cart_product_id = table_product.product_id AND cart_customer_id=67";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $recordset = $stmt->fetchAll((PDO::FETCH_ASSOC));
    print json_encode($recordset, JSON_PRETTY_PRINT);
};
