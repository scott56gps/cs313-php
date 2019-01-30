<?php
session_start();

function generateOptions() {
    for ($i = 1; $i < 11; $i++) {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }
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
            <div class="card">
                <h3>Ruffatti - Davies Concert Hall</h3>
                <div class="container">
                    <img id="ruffatti-image" src="https://pipeorgandatabase.org/photos/CA/SanFrancisco.DaviesSympho.FratelliRu.1020.222726.jpg" />
                    <div class="item">
                        <span><strong>Quantity</strong></span>
                        <select id="ruffatti-quantity">
                            <?php
                            generateOptions();
                            ?>
                        </select>
                        <br>
                        <button id="ruffatti" onclick="parseItem(this.id);">Add To Cart</button>
                        <br>
                        <span id="ruffatti-feedback"></span>
                    </div>
                </div>
            </div>
            <div class="card">
            <h3>Rieger - Christ Church, Oxford, England</h3>
                <div class="container">
                    <img id="rieger-image" src="https://pipedreams.publicradio.org/gallery/united_kingdom/images/oxford_christ-church_rieger_lg.jpg" />
                    <div class="item">
                        <span><strong>Quantity</strong></span>
                        <select id="rieger-quantity">
                            <?php
                            generateOptions();
                            ?>
                        </select>
                        <br>
                        <button id="rieger" onclick="parseItem(this.id);">Add To Cart</button>
                        <br>
                        <span id="rieger-feedback"></span>
                    </div>
                </div>
            </div>
            <div class="card">
            <h3>Glatter-Gotz - Claremont United Church of Christ Congregational</h3>
                <div class="container">
                    <img id="glatter-image" src="http://pipedreams.publicradio.org/gallery/us_west/california/images/claremont_ucc_glatter-gotz-rosales_lg.jpg" />
                    <div class="item">
                        <span><strong>Quantity</strong></span>
                        <select id="glatter-quantity">
                        <?php
                        generateOptions();
                        ?>
                        </select>
                        <br>
                        <button id="glatter" onclick="parseItem(this.id);">Add To Cart</button>
                        <br>
                        <span id="glatter-feedback"></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="browse.js"></script>
</html>