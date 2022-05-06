<nav>
    <div class="brand_logo"><i class="fa-brands fa-playstation"></i></div>
    <div class="menu">
        <a href="main.php"><i class="fa-solid fa-house"></i></a>
        <a href="my_profile.php"><i class="fa-solid fa-user"></i></a>
        <?php if($_SESSION['staff']): ?>
            <a href="settings.php"><i class="fa-solid fa-gear"></i></a>
        <?php endif; ?>
    </div>
</nav>