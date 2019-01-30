<?php
session_start();

$itemCount = 0;
foreach ($_SESSION as $key => $value) {
    if ($key != "Address") {
        $itemCount = $itemCount + 1;
    }
}

// echo $itemCount;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scott's Organ Mercantile</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <div class="main-content">
            <div class="card">
                <h3>Ruffatti - Davies Concert Hall</h3>
                <div class="container">
                    <img id="ruffatti-image" src="https://pipeorgandatabase.org/photos/CA/SanFrancisco.DaviesSympho.FratelliRu.1020.222726.jpg" />
                    <div class="item">
                        <span><strong>Quantity</strong></span>
                        <select id="ruffatti-quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <br>
                        <button id="ruffatti" onclick="parseItem(this.id);">Add To Cart</button>
                        <br>
                        <span id="ruffatti-feedback"></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3>Awesome Surfboard</h3>
            </div>
            <div class="card">
                <h3>Gnarly Surboard Dude!</h3>
            </div>
        </div>
    </body>
    <script src="browse.js"></script>
</html>