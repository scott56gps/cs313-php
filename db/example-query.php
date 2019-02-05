<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  foreach($db->query('SELECT * FROM student') as $row) {
      echo 'student_id: ' . $row['student_id'];
      echo 'student_first_name: ' . $row['student_first_name'];
      echo 'student_last_name: ' . $row['student_last_name'];
      echo 'teacher_id: ' . $row['teacher_id'];
      echo 'username: ' . $row['username'];
      echo 'password: ' . $row['password'];
  }
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>