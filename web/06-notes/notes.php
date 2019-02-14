<?php
include 'db.php';

$db = getDb();

// Get the Query Parameter
$id = $_GET['course_id'];

$query = 'SELECT id, name, course_code FROM course WHERE id = :id';
$statement = $db->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$course = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
</head>
<body>
    <?php
    $courseName = $course['name'];
    $courseCode = $course['course_code'];
    echo "<h1>Notes for $courseCode - $courseName";
    ?>
</body>
</html>