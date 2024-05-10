<?php

include $_SERVER['DOCUMENT_ROOT'] . "/admin/include/connect.php";
$step = 1;

if (!empty($_POST['customer_mail'])) {
    $step = 2;
    $sql = "SELECT customer_id FROM table_customer WHERE customer_mail = :customer_mail AND customer_status = 1 ORDER BY customer_id DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute([':customer_mail' => $_POST['customer_mail']]);
    if ($row = $stmt->fetch()) {
        $customer_id = $row['customer_id'];
        $token = md5(random_int(0, 100000)) . date("ymdhis");
        $sql = "UPDATE table_customer SET customer_token=:customer_token WHERE customer_id = :customer_id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':customer_token' => $token, ':customer_id' => $customer_id]);
        //envoi lien par mail
        $link = "<a href='password.php?id=" . $id . "&token=" . $token . ">cliquez-ici</a>";
    }
}

if (!empty($_GET['id']) && !empty($_GET['token'])) {
    $sql = "SELECT customer_id FROM table_customer WHERE customer_id=:customer_id AND customer_token=:customer_token";
    $stmt = $db->prepare($sql);
    $stmt->execute([':customer_id' => $_GET['id'], 'customer_token' => $_GET['token']]);
    if ($row = $stmt->fetch()) {
        $step = 3;
        $customer_id = $row['customer_id'];
    }
}
if (!empty($_POST['customer_password']) && !empty($_POST['customer_password_confirm']) && $_POST['customer_password'] == $_POST['customer_password_confirm']) {
    $step = 4;
    $sql = "UPDATE table_customer SET customer_token = '',customer_password=:customer_password WHERE customer_id=:customer_id ";
    $stmt = $db->prepare($sql);
    $stmt->execute([':customer_password' => password_hash($_POST['customer_password'], PASSWORD_DEFAULT), ':customer_id' => $_POST['customer_id']]);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password forgotten</title>
</head>

<body>
    <?php
    if ($step == 1) { ?>
        <form action="password.php" method="post">
            <label for="customer_email">Email</label>
            <input type="email" name="customer_mail" required>
            <input type="submit" value="Envoyer">
        </form>
    <?php }
    if ($step == 2) { ?>
        <p> Un mail vous a été envoyé.</p>
        <?= $link; ?>
    <?php }
    if ($step == 3) { ?>
        <form action="" method="post">
            <label for="customer_password">Mot de passe</label>
            <input type="password" name="customer_password" id="" required>
            <label for="customer_password_confirm">Mot de passe à nouveau</label>
            <input type="password" name="customer_password_confirm" id="" required>
            <input type="hidden" name="customer_id" value="<?= htmlspecialchars($customer_id); ?>">
            <input type="submit" value="Envoyer">
        </form>
    <?php }
    if ($step == 4) { ?>
        <p>Votre mot de passe a été réinitialisé.</p>
        <a href="login.php">Se connecter</a>
    <?php } ?>

</body>

</html>