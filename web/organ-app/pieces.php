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
$query = 'SELECT p.id, p.name FROM piece p JOIN student_piece sp ON p.id = sp.piece_id WHERE sp.student_id = :studentId';
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

                // Query database for the practice times for each of these pieces
                $query = 'SELECT SUM(pe.duration) as total_duration FROM practice_event pe WHERE piece_id = :pieceId';
                $statement = $db->prepare($query);
                $statement->bindValue(':pieceId', $studentId, PDO::PARAM_INT);
                $statement->execute();
                $totalDuration = $statement->fetch(PDO::FETCH_ASSOC);

                if (!empty($totalDuration)) {
                    $timeDisplay = getTimeDisplay($totalDuration);
                } else {
                    $timeDisplay = '';
                }

                echo "<div class='card'><h2><a href='piece-detail.php?piece_id=$pieceId&piece_name=$name'>$name</a></h2>$timeDisplay</div>";
            }
            ?>
            <div class="card add-piece">
                <h2>Add New Piece</h2>
                <form action="add-piece.php" method="post">
                    <label for="nameInput">Name</label>
                    <input id="nameInput" type="text" name="name" />
                    <input type="hidden" name="studentId" value="<?php echo $studentId; ?>" />
                    <input type="submit" value="Add Piece" />
                </form>
            </div>
        </div>
    </body>
</html>