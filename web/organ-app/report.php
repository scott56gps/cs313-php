<?php
session_start();

include 'db.php';
$db = getDb();

if (!isset($_SESSION['username'])) {
    header ("Location: session.php?login=FALSE");
}

$studentId = $_SESSION['student_id'];
$studentFirstName = $_SESSION['student_first_name'];
$teacherId = $_SESSION['teacher_id'];

// Get the pieces for this user from the database
$statement = $db->prepare('SELECT p.id, p.name FROM piece p JOIN student_piece sp ON p.id = sp.piece_id WHERE sp.student_id = :studentId');
$statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
$statement->execute();
$pieces = $statement->fetchAll(PDO::FETCH_ASSOC);

// Get the teacher for this user
$query = "SELECT first_name, last_name, email FROM teacher WHERE id = :teacherId";
$statement = $db->prepare($query);
$statement->bindValue(':teacherId', $teacherId, PDO::PARAM_INT);
$statement->execute();
$teacher = $statement->fetch(PDO::FETCH_ASSOC);
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
            <h1>My Report</h1>
            <div class="report-header">
                <?php
                $teacherName = $teacher['first_name'] . ' ' . $teacher['last_name'];

                echo "<h2>Send Report to $teacherName</h2>";
                ?>
            </div>
            <?php
            foreach($pieces as $piece) {
                $name = $piece['name'];
                $pieceId = $piece['id'];

                // Get the total duration for this piece
                $query = 'SELECT SUM(pe.duration) as total_duration FROM practice_event pe WHERE piece_id = :pieceId';
                $statement = $db->prepare($query);
                $statement->bindValue(':pieceId', $pieceId, PDO::PARAM_INT);
                $statement->execute();
                $totalDuration = $statement->fetch(PDO::FETCH_ASSOC);
                $totalDuration = $totalDuration['total_duration'];

                if (!empty($totalDuration)) {
                    $timeDisplay = getTimeDisplay($totalDuration);
                } else {
                    $timeDisplay = '';
                }

                echo "<div class='card'><h2>$name</h2>$timeDisplay</div>";
            }
            ?>
        </div>
    </body>
</html>