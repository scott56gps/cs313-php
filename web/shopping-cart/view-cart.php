<?php
session_start();

function generateOptions($quantity) {
    $optionString = '';
    for ($i = 1; $i < $quantity + 1; $i++) {
        $optionString . '<option value="' . $i . '">' . $i . '</option>';
    }

    return $optionString;
}

function createItemObject($id, $name, $quantity, $imageUrl) {
    $itemObject->id = $id;
    $itemObject->quantity = $quantity;
    $itemObject->imageUrl = $imageUrl;

    return $itemObject;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scott's Organ Mercantile - View Cart</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <div class="main-content">
            <?php
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
    <script src="view-cart.js"></script>
</html>