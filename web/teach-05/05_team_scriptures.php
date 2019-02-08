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

  // The secure way
  $id = 1;
  $statement = $db->prepare('SELECT b.name as book, s.chapter, s.verse, s.content FROM scripture s JOIN book b ON b.id = s.book_id;');
//   $statement->bindValue(':id', $id, PDO::PARAM_INT);
  $statement->execute();
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $row) {
    echo $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - "' . $row['content'] . '<br/>';
  }
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>