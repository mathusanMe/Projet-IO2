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

    if (isset($_POST['delUser']) && isset($_POST['staffKey'])) {
        if ($_POST['staffKey'] == "mdp") {
            $delUser = $_POST['delUser'];
            $user_query = "DELETE FROM PLAYSTOP.USERS WHERE username='$delUser';";
            if (!mysqli_query($db, $user_query)){
                echo "Erreur : " . mysqli_error($db);
            }
        }
        unset($_POST['staffKey'], $_POST['delUser']);
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
                <h2 class="title">Supprimer un compte</h2>
            </div>
            <form method="post" action="settings.php">
                <div>
                    <label for="username">Identifiant (user) : </label>
                    <input type="text" name="delUser">
                </div>
                <div>
                    <label for="password">Staff Key : </label>
                    <input type="password" name="staffKey">
                </div>
                <div>
                    <button type="submit" name="login_user">Supprimer</button>
                </div>
            </form>
        </div>
    </article>
</body>
</html>