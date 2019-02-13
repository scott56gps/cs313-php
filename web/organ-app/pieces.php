<?php
session_start();

include 'db.php';
$db = getDb();

$studentId = $_SESSION['student_id'];
$studentFirstName = $_SESSION['student_first_name'];

// Get the pieces for this user from the database
$statement = $db->prepare('SELECT p.name FROM piece p JOIN student_piece sp ON p.id = sp.piece_id WHERE sp.student_id = :studentId');
$statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
$statement->execute();
$pieces = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        echo "<title>$studentFirstName's Pieces</title>";
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
            foreach($pieces as $piece) {
                echo '<div class="card"><h2>' . $piece['name'] . '</h2></div>';
            }
            ?>
        </div>
    </body>
</html>