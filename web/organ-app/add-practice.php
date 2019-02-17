<?php
include 'db.php';

$db = getDb();

$practiceDuration = $_POST["practiceDuration"];
$practiceDate = $_POST["practice_date"];
$pieceId = $_POST["piece_id"];
$pieceName = $_POST["piece_name"];

echo $practiceDate;

// Insert a new Practice Event for this piece
// $query = 'INSERT INTO piece (name) VALUES (:pieceName)';
// $statement = $db->prepare($query);
// $statement->bindValue(':pieceName', $pieceName, PDO::PARAM_STR);
// $statement->execute();
// $pieceId = $db->lastInsertId('piece_id_seq');



// header("Location: piece-detail.php")
?>