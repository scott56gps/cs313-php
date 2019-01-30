<?php
session_start();
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div id="header-card" class="card">
    <h1>Scott's Organ Mercantile</h1>
    <div id="nav-card" class="card">
        <div id="page-name" class="item">
        <?php
        switch ($activePage) {
            case 'browse':
                echo '<h2>Browse</h2>';
                break;
            case 'view-cart':
                echo '<h2>View Cart</h2>';
                echo '<button id="back-to-browse-button">Back to Browse</button>';
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
        <div id="cart-header" class="item">
            <?php
            $itemCount = 0;
            foreach ($_SESSION as $key => $value) {
                if ($key != "Address") {
                    $itemCount = $itemCount + 1;
                }
            }
            echo '<span><h2 id="itemCount">Items in Cart: ' . $itemCount . '</h2></span>';
            if ($activePage == 'browse') {
                // Show the Cart Button
                echo '<input id="cart-icon" type="image" src="https://freeiconshop.com/wp-content/uploads/edd/cart-outline.png" />';
            } elseif ($activePage == 'view-cart' && $itemCount > 0) {
                echo '<button id="go-to-checkout-button">Proceed To Checkout!</button>';
            }
            ?>
        </div>
    </div>
</div>