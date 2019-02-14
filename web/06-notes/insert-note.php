<?php
include 'db.php';

$db = getDb();

$course_id = htmlspecialchars($_POST['course_id']);
$date = htmlspecialchars($_POST['date']);
$content = htmlspecialchars($_POST['content']);

echo "Hola";

$query = 'INSERT INTO note (date, content, course_id) VALUES (:date, :content, :course_id)';
$statement = $db->prepare($query);
$statement->bindValue(':date', $date, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->bindValue(':course_id', $course_id, PDO::PARAM_INT);
$statement->execute();


header("Location: notes.php?course_id=$course_id");
?>