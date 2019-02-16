<?php
include 'db.php';

$db = getDb();

// Get the passed piece name
$pieceName = htmlspecialchars($_POST["name"]);
$studentId = htmlspecialchars($_POST["studentId"]);

// Insert the piece into the piece table
$query = 'INSERT INTO piece (name) VALUES (:pieceName)';
$statement = $db->prepare($query);
$statement->bindValue(':pieceName', $pieceName, PDO::PARAM_STR);
$statement->execute();
$pieceId = $db->lastInsertId('piece_id_seq');

// Insert a new record into the student_piece table for this piece
$query = 'INSERT INTO student_piece (student_id, piece_id) VALUES (:studentId, :pieceId)';
$statement = $db->prepare($query);
$statement->bindValue(':studentId', $studentId, PDO::PARAM_STR);
$statement->bindValue(':pieceId', $pieceId, PDO::PARAM_STR);
$statement->execute();

// Redirect back to the pieces page
header("Location: pieces.php")
?>