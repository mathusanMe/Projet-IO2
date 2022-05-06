<?php require_once("../constants.php"); ?>
<?php include_once("server.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
    <?php 
        $msg = &$_SESSION['msg'];
        if (isset($msg)) {
            echo $msg;
            unset($msg);
        }
    ?>
    <form method="post" action="login.php">
        <h1>Se connecter à <?php echo WEBSITE_NAME; ?></h1>
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
            <button type="submit" name="login_user">Se connecter</button>
            <footer>Pas encore membre? <a href="register.php">S'inscrire ici!</a></footer>
        </div>
    </form>
</body>
</html>