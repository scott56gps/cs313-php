<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div class="header">
    <div class="card">
        <h1>Scott Nicholes</h1>
        <h2><em>Families are Forever...</em></h2>
        Current Time in Italy:
        <?php
        //$today = date("Y-m-d");
        setlocale(LC_TIME, "it_IT.utf8");
        echo strftime("%I:%M %p");
        ?>
    </div>
    <ul class="navBar">
        <li class="<?php echo ($activePage == 'home') ? 'activeNav':''; ?>"><a href="home.php">Home</a></li>
        <li class="<?php echo ($activePage == 'assignments') ? 'activeNav':''; ?>"><a href="assignments.php">Assignments</a></li>
    </ul>
</div>