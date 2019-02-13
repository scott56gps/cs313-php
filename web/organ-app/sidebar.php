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
        echo '<a href="pieces.php">My Pieces</a>';
    }
    ?>
    <a href="login.php">Login</a>
</div>
