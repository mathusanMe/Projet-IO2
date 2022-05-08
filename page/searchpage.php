<?php
    session_start();?>

<?php function printResult($result){
    $name=""; ?>
    <div class="card" >
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <figure >
                <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co2zpu.png">
                <?php $name=$row['name'];
                        $_SESSION['name']=$name; ?>
                <a href="gamepage.php"><figcaption><?php echo $row['name'] ?></figcaption></a>
            </figure>
        <?php endwhile; ?>
    </div>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta lang="en">
    <title>Playstop game result page</title>
    <link href="searchpage.css" rel="stylesheet">
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
    <div class="select_filter">
        <div class="filter">
            <form action="searchpage.php" method="post">
            <select name="order" >
                <option name="game_name" >Name</option>
                <option value="release_date" >Release date</option>
                <option value="rating" >Rating</option>
            </select>
            </form>
        </div>
        <div class="filter" >
            <form action="searchpage.php" method="post">
            <select name="platform" >
                <option value="3">PS4</option>
                <option value="4">PS5</option>
                <option value="5">PC</option>
                <option value="1">Xbox One</option>
                <option value="2">Xbox One Series S/x</option>
                <option value="6">Nintendo Switch</option>
            </select>
            </form>
        </div>
    </div>
</div>


    <?php 
        include_once("../constants.php");
        include_once("../access/utils.php"); 
    ?>

    <?php
        $HOST_NAME = HOST_NAME;
        $USER = USER;
        $PASSWORD = PASSWORD;
        $DATABASE_NAME = DATABASE_NAME;
        
        $dbconn = connectDB($HOST_NAME, $USER, $PASSWORD, $DATABASE_NAME); 
    ?>

    <?php #function for searching result in database
        if(isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($dbconn, $_POST['search_input']);

            #Query to select data in database
            $sql = "SELECT games.name, games.release_date, genres.genre_name, publishers.publisher_name,
                    platforms.platform_name, developers.developer_name
                    FROM genres
                    INNER JOIN game_genre ON genres.genre_id = game_genre.genre_id
                    INNER JOIN games ON games.game_id = game_genre.game_id
                    INNER JOIN developers ON games.developer_id = developers.developer_id
                    INNER JOIN publishers ON games.publisher_id = publishers.publisher_id
                    INNER JOIN game_platform ON games.game_id = game_platform.game_id
                    INNER JOIN platforms ON game_platform.platform_id = platforms.platform_id
                    WHERE games.name LIKE '%$search%' OR games.release_date LIKE '%$search%' OR 
                          genres.genre_name LIKE '%$search%' OR publishers.publisher_name LIKE '%$search%' OR 
                          platforms.platform_name LIKE '%$search%' OR developers.developer_name LIKE '%$search%'
                    GROUP BY games.name";

            $result = mysqli_query($dbconn, $sql);
            printResult($result);} ?>

    <?php
        if(isset($_POST['order'])){
            $content= mysqli_escape_string($dbconn, $_POST['game_name']);
            $sql = "SELECT * FROM game WHERE game_name LIKE '%$content%'
                    ORDER BY game_name ASC";
            $result = mysqli_query($dbconn, $sql);
            printResult($result);} ?>



</body>

</html>
