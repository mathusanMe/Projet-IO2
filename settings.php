<?php
    include_once("access/utils.php");
    require_once("constants.php");
    require_once("utils.php");
?>

<?php
    session_start();

    $HOST_NAME = HOST_NAME;
    $USER = USER;
    $PASSWORD = PASSWORD;
    $DATABASE_NAME = DATABASE_NAME;
    
    $db = connectDB($HOST_NAME, $USER, $PASSWORD, $DATABASE_NAME);

    $username = "";

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header('Location: ../main.php');
    }

    if (isset($_POST['delUser'])) {
        $delUser = $_POST['delUser'];
        $user_query = "SELECT * FROM PLAYSTOP.USERS WHERE username='$delUser' LIMIT 1;";
        $query = mysqli_query($db, $user_query);
        $result = mysqli_fetch_assoc($query);

        if (!empty($result) && !$result['staff']) {
            $user_query = "DELETE FROM PLAYSTOP.USERS WHERE username='$delUser';";
            if (!mysqli_query($db, $user_query)){
                echo "Erreur : " . mysqli_error($db);
            }
        }

        if (empty($result)) {
            $returnmsg = "Utilisateur \"{$delUser}\" est inexistant";
        }

        if (!empty($result) && $result['staff']) {
            $returnmsg = "Utilisateur \"{$delUser}\" est un administrateur";
        }
            
        unset($_POST['delUser']);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <script src="https://kit.fontawesome.com/0a95c06f89.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/settings.css">
</head>
<body>
    <article>
        <header>
            <?php include_once("header.php"); ?>
        </header>
        <div class="container">
            <div>
                <h2>Supprimer un compte</h2>
            </div>
            <?php if (isset($returnmsg)): ?>
                <h3 style="color: red"><?php echo $returnmsg; ?></h3>
            <?php endif; ?>
            <form method="post" action="settings.php">
                <div>
                    <label for="username">Utilisateur concerné : </label>
                    <input type="text" name="delUser">
                </div>
                <div>
                    <button type="submit" name="login_user">Supprimer</button>
                </div>
            </form>
        </div>
    </article>
</body>
</html>