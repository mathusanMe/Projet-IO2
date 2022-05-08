<!--fonction pour imprimer des résultats-->
<?php

function printResult($result){
    $name=""; ?>
    <div class="card" >
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <figure >
                <img src="<?php echo $row['thumbnail_url'] ?>">
                <?php $name=$row['name']; ?>
                <a href="gamepage.php?name=<?php echo $row['name']?>"><figcaption><?php echo $row['name'] ?></figcaption></a>
            </figure>
        <?php endwhile; ?>
    </div>
<?php } ?>
