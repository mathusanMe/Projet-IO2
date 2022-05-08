<?php 
    include_once("../constants.php");
    include_once("../access/utils.php"); 
?>
<?php session_start(); ?>

<?php
    $HOST_NAME = HOST_NAME;
    $USER = USER;
    $PASSWORD = PASSWORD;
    $DATABASE_NAME = DATABASE_NAME;
    
    $dbconn = connectDB($HOST_NAME, $USER, $PASSWORD, $DATABASE_NAME);
    
    $sql = "SELECT * FROM games ORDER BY release_date DESC";
    $sql1= "SELECT * FROM games";
    $result=mysqli_query($dbconn, $sql);
    $result1=mysqli_query($dbconn, $sql1);
    $row=mysqli_fetch_assoc($result);
    $row1=mysqli_fetch_assoc($result1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta lang="en">
    <title>Playstop Home</title>
    <link href="home.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<header class="page_header">
    <div class="header_search_bar">
        <form class="search_bar" action="searchpage.php" method="post" >
            <input class="search_text" type="text" name="search_input" placeholder="Game, genre, creators...">
            <button type="submit" name="submit-search">
                <i class="bx bx-search"></i>
            </button>
        </form>
    </div>
</header>
<div class="page-content_center">
    <div class="header_logo">
        <img src="images/playstopLogo.jpg" alt="playstopLogo">
    </div>
    <div class="sidebar">
        <div class="icon" >
            <a href="#"><i class="fa-solid fa-house"></i></a>
        </div>
        <div class="icon"  >
            <a href="#"><i class="fa-solid fa-user"></i></a>
        </div>
        <div class="icon" >
            <a href="#"><i class="fa-solid fa-gear"></i></a>
        </div>
    </div>
    <div class="content_game_new">
        <div class="box_new">
            <p>New Game</p>
            <a href="gamepage.php?name=<?php echo $row['name'] ?>"><h2><?php echo $row['name'] ?></h2></a>
        </div>
        <div class="box_new">
            <p>Positive rating</p>
            <a href="gamepage.php?name=<?php echo $row1['name']"><h2><?php echo $row1['name'] ?></h2></a>
        </div>
         <div class="box_new">
            <p>Old days game</p>
            <a href="gamepage.php?name=<?php echo 'The Witcher 3: Wild Hunt'?>">
                <h2><?php echo 'The Witcher 3: Wild Hunt' ?></h2></a>
        </div>
    </div>
</div>

