<?php
    session_start();?>

<?php    $dbconn = mysqli_connect('localhost','root','','playstop');
        $name = "Back 4 Blood";
    $sql = "SELECT games.name, games.release_date, genres.genre_name, publishers.publisher_name,
                    platforms.platform_name, developers.developer_name, games.description
                    FROM genres
                    INNER JOIN game_genre ON genres.genre_id = game_genre.genre_id
                    INNER JOIN games ON games.game_id = game_genre.game_id
                    INNER JOIN developers ON games.developer_id = developers.developer_id
                    INNER JOIN publishers ON games.publisher_id = publishers.publisher_id
                    INNER JOIN game_platform ON games.game_id = game_platform.game_id
                    INNER JOIN platforms ON game_platform.platform_id = platforms.platform_id
                    WHERE games.name LIKE '%$name%'";
    $result=mysqli_query($dbconn, $sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta lang="en">
    <title>Playstop Gamepage</title>
    <link href="gamepage.css" rel="stylesheet">
<!--    <link href="searchpage.css" rel="stylesheet"-->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap" rel="stylesheet">
</head>
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
    <article class="content">
        <div class="content-imgcover">
            <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co2mhj.png">
        </div>
            <div class="content-description">
                <div class="title"><p><?php echo $name ?></p></div>
                <div class="description"><p><?php echo $row['description'] ?></p></div>
                <div class="genre_rating"  >
                    <div class="genre"><p>Genre: Shooter</p></div>
                    <div class="ratingnote"><p>Rating: 9/10</p></div>
                </div>
            </div>
        <div class="info-more">
            <div class="icon-info">
                <i class="fa-solid fa-calendar"> Release date: 07/20/2021</i>
            </div>
            <div class="icon-info">
                <i class="fa-solid fa-industry"> Developer: </i>
            </div>
            <div class="icon-info">
                <i class="fa-solid fa-bullhorn"> Publisher: </i>
            </div>
            <div class="icon-info">
                <i class="fa-solid fa-gamepad"> Platform: </i>
            </div>
        </div>
    </article>
</div>
