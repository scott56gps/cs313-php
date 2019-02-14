<?php
session_start();

include 'db.php';
$db = getDb();

if (!isset($_SESSION['username'])) {
    header ("Location: login.php");
}

$pieceId = $_GET['piece_id'];
$pieceName = $_GET['piece_name'];

// Get all the practice events for this piece
$query = 'SELECT duration, practice_date FROM practice_event WHERE piece_id = :pieceId';
$statement = $db->prepare($query);
$statement->bindValue(':pieceId', $pieceId, PDO::PARAM_INT);
$statement->execute();
$practiceEvents = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="styles.css" rel="stylesheet" />
    <title><?php echo $pieceName ?></title>
</head>
<body>
    <?php
        include 'sidebar.php';
    ?>
    <div class="main-content">
        <h1>Practice Report for <?php echo $pieceName ?></h1>
        <?php
        foreach($practiceEvents as $practiceEvent) {
            $date = $practiceEvent['practice_date'];
            $duration = $practiceEvent['duration'];

            $timestamp = strtotime($duration);
            $hours = idate('h', $timestamp);
            $minutes = idate('i', $timestamp);

            $timeDisplay = '';
            if ($hours > 0) {
                $timeDisplay = $timeDisplay . $hours . ' Hours';
            }

            if ($minutes > 0) {
                $timeDisplay = $timeDisplay . $minutes . ' Minutes';
            }

            echo "<div class='card'><h2>$date</h2>$timeDisplay</div>";
        }
        ?>
    </div>
</body>
</html>