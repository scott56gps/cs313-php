<?php
include 'db.php';

$db = getDb();

$practiceDuration = $_POST["practiceDuration"];
$practiceDate = $_POST["practice_date"];
$pieceId = $_POST["piece_id"];
$pieceName = $_POST["piece_name"];

// Insert a new Practice Event for this piece
$query = 'INSERT INTO practice_event pe (piece_id, duration, practice_date) VALUES (:pieceId, :duration, :practiceDate)';
$statement = $db->prepare($query);
$statement->bindValue(':pieceId', $pieceId, PDO::PARAM_INT);
$statement->bindValue(':duration', $practiceDuration, PDO::PARAM_STR);
$statement->bindValue(':practiceDate', $practiceDate, PDO::PARAM_STR);
$statement->execute();

header("Location: piece-detail.php?piece_id=$pieceId&piece_name=$pieceName");
?>