<?php
session_start();

// Get the posted Address from the checkout page
$address = htmlspecialchars($_POST["Address"]);

// Save to Session Variables
$_SESSION["Address"] = $address;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scott's Organ Mercantile - Confirmation</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <div class="main-content">
        <?php
            echo '<div class="card"
            <h3>Shipping to ' . $address . '</div>';
            // Loop through the items in $_SESSION
            foreach ($_SESSION as $key => $value) {
                if ($key != "Address") {
                    // Generate a new object
                    $itemObject = json_decode($_SESSION[$key], TRUE);

                    echo '<div class="card">
                    <h3 id="' . $itemObject['id'] . '-name">' . $itemObject['name'] . '</h3>
                    <div class="container">
                        <img id="' . $itemObject['id'] . '-image" src="' . $itemObject['imageUrl'] . '" />
                        <div class="item">
                            <span><strong>Quantity</strong></span>
                            <span><strong>' . $itemObject['quantity'] . '
                            <br>
                            <button id="' . $itemObject['id'] . '" onclick="removeItem(this.id);">Remove Item From Cart</button>
                        </div>
                    </div>
                </div>';
                }
            }
            ?>
        </div>
    </body>
</html>