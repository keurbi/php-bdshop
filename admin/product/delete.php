<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/include/protect.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/include/connect.php";
include "config.php";

if (isset($_GET['token']) && $_GET['token'] == $_SESSION['token'])
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $sql = "SELECT product_image FROM table_product WHERE product_id = :product_id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':product_id' => $_GET['id']]);
        if ($row = $stmt->fetch()) {
            if ($row['product_image'] != "") {
                foreach ($images as $image) {
                    if (file_exists($path . $image['prefix'] . "_" . $row['product_image'])) {
                        unlink($path . $image['prefix'] . "_" . $row['product_image']);
                    }
                }
            }
        }
        $sql = "DELETE FROM table_product WHERE product_id=:product_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":product_id", $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
    }
header("Location:index.php");
