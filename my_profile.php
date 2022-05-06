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
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/my_profile.css">
</head>
<body>
    <article>
        <header>
            <?php include_once("header.php"); ?>
        </header>
        <div class="container">
            <div>
                <h2 class="title">Bonjour, <?php echo $username; ?></h2>
                <h4 class="ratings"><?php echo $num_of_ratings ?> Evaluation<?php echo $num_of_ratings > 1 ? "s" : "" ?></h4>
            </div>
            <div class="card-container">
                <?php while($ratings = mysqli_fetch_assoc($results)): ?>
                    <div class="card" style="background-image: url(<?php echo "'" . $ratings['thumbnail_url'] . "'"; ?>); cursor: pointer" onclick="window.location='main.php';">
                        <i  id="emoji" 
                            class="<?php echo rating_to_emoji((int) $ratings['score']); ?>" 
                            style="color: <?php echo style_emoji((int) $ratings['score']); ?>">
                        </i>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </article>
</body>
</html>