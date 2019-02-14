<?php
include 'db.php';

$db = getDb();

$query = 'SELECT id, name, course_code FROM course';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
</head>
<body>
    <h1>Notes App</h1>

    <h2>Courses</h2>

    <ul>
        <?php
        foreach($courses as $course) {
            $id = $course['id'];
            $name = $course['name'];
            $courseCode = $course['course_code'];

            echo "<li><a href='notes.php?course_id=$id'>$courseCode - $name</a></li>";
        }
        ?>
    </ul>
</body>
</html>