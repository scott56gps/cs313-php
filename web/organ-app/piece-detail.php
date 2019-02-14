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
    <title><?php echo $pieceName ?></title>
</head>
<body>
    
</body>
</html>