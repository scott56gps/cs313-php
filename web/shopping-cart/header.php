<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div id="header-card" class="card">
    <h1>Scott's Organ Mercantile</h1>
    <div id="nav-card" class="card">
    <?php
    switch ($activePage) {
        case 'browse':
            echo '<h2>Browse</h2>';
            break;
        case 'view-cart':
            echo '<h2>View Cart</h2>';
            break;
        case 'checkout':
            echo '<h2>Checkout</h2>';
            break;
        case 'confirm':
            echo '<h2>Confirmation</h2>';
            break;
    }
    ?>
    </div>
</div>