<h1>Scripture Resources</h1>
<?php
include 'db.php';
$db = getDb();

$selectScriptureWithTopicQuery = 'SELECT b.name as book, s.chapter, s.verse, t.name as topic_name, s.content FROM scripture s JOIN book b ON b.id = s.book_id JOIN scripture_topic st ON st.scripture_id = s.id JOIN topic t ON t.id = st.topic_id';

$selectScriptureStatement = $db->prepare($selectScriptureWithTopicQuery);
$selectScriptureStatement->execute();
$rows = $selectScriptureStatement->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
  echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - <strong>' . $row['topic_name'] . '</strong> - "' . $row['content'] . '"<br/>';
}
?>
