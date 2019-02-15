<?php
session_start();

$activePage = basename($_SERVER['PHP_SELF'], ".php");

$isLoggedIn = FALSE;

if (isset($_SESSION['username'])) {
    $isLoggedIn = TRUE;
}
?>
<div class="sidebar">
    <?php
    if ($isLoggedIn) {
        echo '<div class="' . (($activePage == 'pieces') ? 'activeNav':'') . '"><a href="pieces.php">My Pieces</a></div>';
        echo '<div class="' . (($activePage == 'report') ? 'activeNav':'') . '"><a href="report.php">My Report</a></div>';
        echo '<div class="' . (($activePage == 'login') ? 'activeNav':'') . '"><a href="session.php?login=FALSE">Logout</a></div>';
    } else {
        echo '<div class="' . (($activePage == 'login') ? 'activeNav':'') . '"><a href="login.php">Login</a></div>';
    }
    ?>
</div>
