<?php
    function connectDB($hostname, $user, $password, $dbname) {
        $db = mysqli_connect($hostname, $user, $password, $dbname);

        if (mysqli_connect_errno()) {
            printf("Connexion impossible: %s\n", mysqli_connect_error());
            exit();
        }

        return $db;
    }
?>