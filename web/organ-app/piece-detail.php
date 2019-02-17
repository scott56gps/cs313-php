<?php
session_start();

include 'db.php';
$db = getDb();

if (!isset($_SESSION['username'])) {
    header ("Location: session.php?login=FALSE");
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
        <div class="card add-element">
            <h2>Start Practice</h2>
            <div class="stopwatch">
                <!-- The following code was based on code from https://jsfiddle.net/Daniel_Hug/pvk6p/ -->
                <!-- The Author is Daniel Hug.  I give him the credit for this Stopwatch. -->
                <h2><time id="clockDisplay">00:00:00</time></h2>
                <button id="startButton">Start</button>
                <button id="stopButton">Stop</button>
                <button id="clearButton">Clear</button>
            </div>
            <form action="add-practice.php" method="post">
                <input id="practiceTime" type="hidden" name="practiceDuration" value="00:00:00" />
                <input type="hidden" name="piece_id" value="<?php echo $pieceId; ?>" />
                <input type="hidden" name="piece_name" value="<?php echo $pieceName; ?>" />
                <input type="submit" value="Log Practice" />
            </form>
        </div>
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
                $timeDisplay = $timeDisplay . ($hours > 0 ? ' ':'') . $minutes . ' Minutes';
            }

            echo "<div class='card'><h2>$date</h2>$timeDisplay</div>";
        }
        ?>
    </div>
    <script src="piece-detail.js"></script>
</body>
</html>