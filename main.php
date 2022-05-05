<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "Tu dois te connecter d'abord";
        header('location: access/login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: access/login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <script src="https://kit.fontawesome.com/0a95c06f89.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <article>
        <header>
            <?php include_once("header.php"); ?>
        </header>
        
        <div class="container">
            <?php if (isset($_SESSION['success'])) : ?>
                <div>
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <?php if (isset($_SESSION['username'])) : ?>
                <p>Bienvenue <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p> <a href="main.php?logout='1'" style="color: red;">logout</a></p>
            <?php endif ?>
        </div>
    </article>
</body>
</html>
