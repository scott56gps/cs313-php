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
            <h2>Browse</h2>
            <div class="card">
                <h3>Ruffati - Davies Concert Hall</h3>
                <img id="rufatti-image" src="https://pipeorgandatabase.org/photos/CA/SanFrancisco.DaviesSympho.FratelliRu.1020.222726.jpg" />
                <span id="rufatti-feedback"></span>
                <select id="rufatti-quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <button id="rufatti" onclick="parseItem(this.id);">Add To Cart</button>
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