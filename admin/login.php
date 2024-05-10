<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/include/connect.php";
if (isset($_POST['login']) && isset($_POST['pwd'])) {
    echo "test";
    $sql = "SELECT * FROM table_admin WHERE admin_login= :login";
    $stmt = $db->prepare($sql);
    $stmt->execute([":login" => $_POST['login']]);
    if ($row = $stmt->fetch()) {
        if (password_verify($_POST['pwd'], $row['admin_password'])) {
            session_start();
            $_SESSION['user_connected'] = "ok";
            $_SESSION['user_id'] = $row['admin_id'];
            $_SESSION['token'] = md5(random_int(0, 100000) . date("ymdhis"));
            header("Location:/admin/product/index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="login.php" method="post">
        <label class="login" for="mail">mail
            <input type="mail" name="login" id="login">
        </label>
        <label class="pwd" for="password">password
            <input type="password" name="pwd" id="pwd">
        </label>
        <input class="bouton" type="submit" value="ok">
        <form>
</body>

</html>