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
</head>
<body>
    <article>
        <header>
            <h1>Page d'accueil</h1>
            <nav>
                <a href="main.php">Accueil</a>
                <a href="user/my_profile.php">My Profile</a>
            </nav>
        </header>
        
        <div>
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
