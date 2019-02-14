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

    <form action="insert-note.php" method="post">
        <input type="date" name="date" /><br>
        <input type="hidden" name="course_id" value="<?php echo $courseId; ?>" /><br>
        <textarea name="content"></textarea><br>
        <input type="submit" value="Save Note" />
    </form>

    <?php
    $query = 'SELECT id, date, content FROM note WHERE course_id = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $courseId, PDO::PARAM_INT);
    $statement->execute();
    $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach($notes as $note) {
        $date = $note['date'];
        $content = $note['content'];

        echo "<p>Date: $date</p>";
        echo "<p>Content: $content</p>";
    }
    ?>
</body>
</html>