<?php require_once("../constants.php"); ?>
<?php include_once('server.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
    <form method="post" action="register.php">
        <h1>S'inscrire sur <?php echo WEBSITE_NAME; ?></h1>
        <?php include('errors.php'); ?>
        <div>
            <label for="username">Identifiant : </label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="staff">Staff</label>
            <input type="checkbox" name="staff">
        </div>
        <div>
            <button type="submit" name="reg_user">S'inscrire</button>
            <footer>Déjà membre? <a href="login.php">Se connecter</a></footer>
        </div>
    </form>
</body>
</html>