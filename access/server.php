<?php
    include_once("utils.php");
    require_once("../constants.php");
?>

<?php
    session_start();

    $username = "";
    $errors = array();

    $HOST_NAME = HOST_NAME;
    $USER = USER;
    $PASSWORD = PASSWORD;
    $DATABASE_NAME = DATABASE_NAME;
    
    $db = connectDB($HOST_NAME, $USER, $PASSWORD, $DATABASE_NAME);

    #region REG_USER inscription de l'utilisateur

    if (isset($_POST['reg_user'])) {
        // définir les entrées issues du formulaire

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);   
        $staff = isset($_POST['staff']) ? 1 : 0;

        // validation des entrées
        if (empty($username)) { array_push($errors, "L'identifiant est requis"); }
        if (empty($password)) { array_push($errors, "Le mot de passe est requis"); }

        // vérifier si l'identifiant est déjà pris
        $user_check_query = "SELECT * FROM USERS WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['username'] === $username) {
                array_push($errors, "Identifiant déjà utilisé");
            }
        }

        // enregistrer l'utilisateur si tout est bon
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "INSERT INTO USERS (username, password, staff) VALUES ('$username', '$password', '$staff');";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['staff'] = $staff;
            $_SESSION['success'] = "Vous êtes connecté";

            header('location: ../main.php');
        }
    }
    #endregion

    #region LOGIN_USER connexion de l'utilisateur

    if (isset($_POST['login_user'])) {

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (empty($username)) { array_push($errors, "L'identifiant est requis"); }
        if (empty($password)) { array_push($errors, "Le mot de passe est requis"); }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM USERS WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);

            if (mysqli_num_rows($results) == 1) {
                $user = mysqli_fetch_assoc($results);

                $_SESSION['username'] = $username;
                $_SESSION['staff'] = $user['staff'];
                $_SESSION['success'] = "Vous êtes connecté";
                
                header('location: ../main.php');
            } else {
                array_push($errors, "Mauvaise combination Identifiant/Mot de passe");
            }
        }
    }
    #endregion
?>