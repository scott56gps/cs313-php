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
        echo '<a href="pieces.php" class="' . ($activePage == 'home') ? 'activeNav':'' . '">My Pieces</a>';
    }

    echo '<a href="login.php" class="' . ($activePage == 'home') ? 'activeNav':'' . '">Login</a>';
    ?>
</div>
