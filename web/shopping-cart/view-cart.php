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
            
        </div>
    </body>
    <script src="browse.js"></script>
</html>