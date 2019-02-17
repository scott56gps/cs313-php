<?php
$teacherEmail = $_POST['teacher_email'];

echo "<script>window.alert($teacherEmail)</script>";

header("Location: report.php");
?>