<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div class="header">
    <div class="card">
        <div class="row">
            <div class="column">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/2/29/Count_von_Count_kneeling.png/200px-Count_von_Count_kneeling.png" />
            </div>
            <div class="column">
                <h1>The Count's Organ Mercantile</h1>
            </div>
    </div>
    <!-- <ul class="navBar">
        <li class="<?php echo ($activePage == 'home') ? 'activeNav':''; ?>"><a href="/home.php">Home</a></li>
        <li class="<?php echo ($activePage == 'about-us') ? 'activeNav':''; ?>"><a href="/about-us.php">About Us</a></li>
        <li class="<?php echo ($activePage == 'login') ? 'activeNav':''; ?>"><a href="/login.php">Login</a></li>
    </ul> -->
</div>