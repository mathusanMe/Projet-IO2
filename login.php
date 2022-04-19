<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Se connecter</title>
</head>
<body>
    <div>
        <h2>Login</h2>
    </div>

    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div>
            <label>Identifiant</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Mot de passe</label>
            <input type="password" name="password">
        </div>
        <div>
            <button type="submit" name="login_user">Se connecter</button>
            <footer>Pas encore membre? <a href="register.php">S'inscrire ici!</a></footer>
        </div>
    </form>
</body>
</html>