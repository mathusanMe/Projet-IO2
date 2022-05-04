<?php 
    require_once("../constants.php");

    session_start();
    
    $db = mysqli_connect(HOST_NAME, USER, PASSWORD, DATABASE_NAME);

    if (mysqli_connect_errno()) {
        printf("Connexion impossible: %s\n", mysqli_connect_error());
        exit();
    }
?>