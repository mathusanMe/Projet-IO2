<?php
    include_once("access/utils.php");
    require_once("constants.php");
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
    $user_ratings_query = "SELECT name, thumbnail_url, high_res_url, score FROM USERS INNER JOIN RATINGS USING(user_id) INNER JOIN GAMES USING(game_id) WHERE username='$username'";
    $results = mysqli_query($db, $user_ratings_query);
    $num_of_ratings = mysqli_num_rows($results);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <script src="https://kit.fontawesome.com/0a95c06f89.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <article>
        <header>
            <?php include_once("header.php"); ?>
        </header>
        <div class="container">
            <div>
                <!-- STAFF/CLIENT IMAGE -->
                <h2><?php echo $username; ?></h2>
                <p><?php echo $num_of_ratings ?> Rating<?php echo $num_of_ratings > 1 ? "s" : "" ?></p>
            </div>
            <div>
                <?php while($ratings = mysqli_fetch_assoc($results)): ?>
                    <div>
                        <h3><?php echo $ratings['name']; ?></h3>
                        <p><?php echo $ratings['score']; ?></p>
                        <img src="<?php echo $ratings['thumbnail_url']; ?>" alt="<?php echo $ratings['name']; ?>">
                        <img src="<?php echo $ratings['high_res_url']; ?>" alt="<?php echo $ratings['name']; ?>">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </article>
</body>
</html>