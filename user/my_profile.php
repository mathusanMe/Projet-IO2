<?php
    require_once("../access/connectDB.php");

    $username = "";

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header('Location: ../main.php');
    }
    $user_ratings_query = "SELECT name, score FROM USERS INNER JOIN RATINGS USING(user_id) INNER JOIN GAMES USING(game_id) WHERE username='$username'";
    $results = mysqli_query($db, $user_ratings_query);
    $num_of_ratings = mysqli_num_rows($results);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>My Profile</title>
</head>
<body>
    <article>
        <header>
            <h1>My Profile</h1>
            <nav>
                <a href="../main.php">Accueil</a>
                <a href="my_profile.php">My Profile</a>
            </nav>
        </header>
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
                </div>
            <?php endwhile; ?>
        </div>
    </article>
</body>
</html>