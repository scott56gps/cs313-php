<?php
session_start();

$teacherEmail = htmlspecialchars($_POST['teacher_email']);

$studentFirstName = $_SESSION['student_first_name'];
$studentLastName = $_SESSION['student_last_name'];
$studentEmail = $_SESSION['student_email'];
$pieces = $_SESSION['sending_pieces'];

// Send an email to the teacher
$message = "";
$headers = "From: $studentEmail\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

foreach($pieces as $piece) {
    $name = $piece['name'];
    $pieceId = $piece['id'];

    // Get the total duration for this piece
    $query = 'SELECT SUM(pe.duration) as total_duration FROM practice_event pe WHERE piece_id = :pieceId';
    $statement = $db->prepare($query);
    $statement->bindValue(':pieceId', $pieceId, PDO::PARAM_INT);
    $statement->execute();
    $totalDuration = $statement->fetch(PDO::FETCH_ASSOC);
    $totalDuration = $totalDuration['total_duration'];

    if (!empty($totalDuration)) {
        $timeDisplay = getTimeDisplay($totalDuration);
    } else {
        $timeDisplay = '';
    }

    $message .= "<div><h2>$name - $timeDisplay</h2></div><br>";
}

echo $message . "<br>";
echo $headers;
// mail($teacherEmail, "Report for $studentFirstName $studentLastName", $message, $headers);

// Clear the pieces session variable
unset($_SESSION['sending_pieces']);

// header("Location: report.php");
?>