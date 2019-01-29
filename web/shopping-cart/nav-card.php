<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div id="nav-card" class="card">
    <?php
    switch ($activePage) {
        case 'browse':
            echo '<h2>Browse</h2>';
        case 'view-cart':
            echo '<h2>View Cart</h2>';
        case 'checkout':
            echo '<h2>Checkout</h2>';
        case 'confirm':
            echo '<h2>Confirmation</h2>';
    }
    ?>
</div>