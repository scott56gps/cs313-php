<?php
session_start();

$studentFirstName = $_SESSION['student_first_name'];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        echo "<title>$studentFirstName's Pieces"
        ?>
        <link href="styles.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        include 'sidebar.php';
        ?>
        <div class="main-content">
            <h2>My Pieces</h2>
            <?php
            
            ?>
        </div>
    </body>
</html>