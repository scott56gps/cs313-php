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

  // The manual, not-secure way
//   foreach($db->query('SELECT * FROM student') as $row) {
//       echo 'student_id: ' . $row['student_id'];
//       echo 'student_first_name: ' . $row['student_first_name'];
//       echo 'student_last_name: ' . $row['student_last_name'];
//       echo 'teacher_id: ' . $row['teacher_id'];
//       echo 'username: ' . $row['username'];
//       echo 'password: ' . $row['password'];
//   }

  // The secure way
  $id = 1;
  $statement = $db->prepare('SELECT student_first_name FROM student WHERE id=:id');
  $statement->bindValue(':id', $id, PDO::PARAM_INT);
  $statement->execute();
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $row) {
      echo 'studentFirstName: ' . $row['student_first_name'] . '<br/>';
  }
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>