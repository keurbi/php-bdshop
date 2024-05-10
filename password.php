<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/include/connect.php";

// Initialisation de $total
$total = isset($_GET['total']) ? $_GET['total'] : 0;

if (isset($_POST['subscription_sent'])) {
    // Si le formulaire de l'adresse e-mail est soumis
    $sql = "SELECT * FROM table_customer WHERE customer_mail = :mail";
    $stmt = $db->prepare($sql);
    $stmt->execute([':mail' => $_POST['mail']]);

    if ($row = $stmt->fetch()) {
        // Si le mail existe dans la base de données
        $id = $row['customer_id'];

        // Générer un token et le mettre à jour dans la base de données
        $token = md5(random_int(0, 100000) . date("ymdhis"));
        $sql = "UPDATE table_customer SET customer_token = :customer_token WHERE customer_id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':customer_token' => $token, ':id' => $id]);

        // Rediriger vers la même page avec les paramètres id et token
        header("Location: password.php?total=2&id=$id&token=$token");
        exit(); // Terminer le script pour éviter l'exécution du reste du code
    }
}

if ($total == 2 && isset($_GET['id']) && isset($_GET['token'])) {
    // Si le total est 2 et les paramètres id et token sont définis dans l'URL
    if (isset($_POST['pwd']) && isset($_POST['pwdConfirm'])) {
        // Si le deuxième formulaire est soumis
        if ($_POST['pwd'] == $_POST['pwdConfirm']) {
            // Si les mots de passe correspondent

            // Vérifier si l'id et le token correspondent à une entrée dans la base de données
            $sql = "SELECT * FROM table_customer WHERE customer_id = :id AND customer_token = :token";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $_GET['id'], ':token' => $_GET['token']]);

            if ($stmt->fetch()) {
                // Si l'entrée existe, mettre à jour le mot de passe dans la base de données
                $sql = "UPDATE table_customer SET customer_token = '', customer_password = :customer_password WHERE customer_id = :id";
                $stmt = $db->prepare($sql);
                $stmt->execute([':customer_password' => $_POST['pwd'], ':id' => $_GET['id']]);

                // Rediriger vers une autre page ou effectuer d'autres actions nécessaires
                header("Location: success.php");
                exit();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouveauMDP</title>
</head>

<body>

    <?php if ($total == 0) { ?>
        <!-- Premier formulaire -->
        <form action="password.php" method="post">
            <label for="mail">Votre mail</label>
            <input type="text" name="mail" id="mail">
            <input type="hidden" name="subscription_sent" value="1">
            <input class="bouton" type="submit" value="Envoyer">
        </form>
    <?php } ?>

    <?php if ($total == 2) { ?>
        <!-- Deuxième formulaire -->
        <form action="password.php?total=2&id=<?= $_GET['id']; ?>&token=<?= $_GET['token']; ?>" method="post">
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="pwd">
            <label for="pwdConfirm">Confirmez votre mot de passe</label>
            <input type="password" name="pwdConfirm" id="pwdConfirm">
            <input type="hidden" name="subscription_sent" value="1">
            <input class="bouton" type="submit" value="Enregistrer">
        </form>
    <?php } ?>

</body>

</html>