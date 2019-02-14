<?php
include 'db.php';

$db = getDb();

// Get the Query Parameter
$courseId = htmlspecialchars($_GET['course_id']);

$query = 'SELECT id, name, course_code FROM course WHERE id = :id';
$statement = $db->prepare($query);
$statement->bindValue(':id', $courseId, PDO::PARAM_INT);
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

    <form action="insert_note.php" method="post">
        <input type="date" name="date" /><br>
        <input type="hidden" name="course_id" value="<?php echo $courseId; ?>" /><br>
        <textarea name="content"></textarea><br>
        <input type="submit" value="Save Note" />
    </form>
</body>
</html>