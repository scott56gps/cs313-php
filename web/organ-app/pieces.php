<?php
session_start();

include 'db.php';
include 'pieceFunctions.php';
$db = getDb();

if (!isset($_SESSION['username'])) {
    header ("Location: session.php?login=FALSE");
}

$studentId = $_SESSION['student_id'];
$studentFirstName = $_SESSION['student_first_name'];

// Get the pieces for this user from the database
$query = 'SELECT p.id, p.name, SUM(pe.duration) as total_duration FROM piece p JOIN student_piece sp ON p.id = sp.piece_id JOIN practice_event pe ON pe.piece_id = p.id WHERE sp.student_id = :studentId GROUP BY p.id, p.name';
$statement = $db->prepare($query);
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
            <h1>My Pieces</h1>
            <?php
            foreach($pieces as $piece) {
                $name = $piece['name'];
                $pieceId = $piece['id'];
                $totalDuration = $piece['total_duration'];

                echo $totalDuration;

                $timeDisplay = getTimeDisplay($totalDuration);

                echo "<div class='card'><h2><a href='piece-detail.php?piece_id=$pieceId&piece_name=$name'>$name</a></h2>$timeDisplay</div>";
            }
            ?>
        </div>
    </body>
</html>