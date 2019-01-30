<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scott's Organ Mercantile - Checkout</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <div class="main-content">
            <form id="addressForm" class="card" method="post" action="add.php">
                <label for="addressInput">Please Enter Address:</label>
                <textarea id="addressInput" rows="4" cols="50" name="Address" placeholder="Address"></textarea>
                <label for="addressSubmit">Save and Continue</label>
                <input id="addressSubmit" type="submit" />
            </form>
        </div>
    </body>
</html>