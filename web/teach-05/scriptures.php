<?php
$book = $_POST["book"];

// Generate appropriate query
$query = '';
if (empty($book)) {
  $query = 'SELECT b.name as book, s.chapter, s.verse, s.content FROM scripture s JOIN book b ON b.id = s.book_id;';
} else {
  $query = 'SELECT b.name as book, s.chapter, s.verse, s.content FROM scripture s JOIN book b ON b.id = s.book_id WHERE b.name = :book;';
}

try {
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
  $statement = $db->prepare();
  $statement->bindValue(':book', $book, PDO::PARAM_INT);
  $statement->execute();
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
<h1>Scripture Resources</h1>
<?php
foreach ($rows as $row) {
  echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "' . $row['content'] . '"<br/>';
}
?>