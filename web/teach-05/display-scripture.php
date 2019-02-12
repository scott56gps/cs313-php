<h1>Scripture Resources</h1>
<?php
include 'db.php';
$db = getDb();

$selectScriptureWithTopicQuery = 'SELECT s.id, b.name as book, s.chapter, s.verse, t.name as topic_name, s.content FROM scripture s JOIN book b ON b.id = s.book_id JOIN scripture_topic st ON st.scripture_id = s.id JOIN topic t ON t.id = st.topic_id';

$selectScriptureStatement = $db->prepare($selectScriptureWithTopicQuery);
$selectScriptureStatement->execute();
$rows = $selectScriptureStatement->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
  echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - <strong>';

  // For this Scripture, query all the topics.  We will display them as a list
  //  after the reference.
  $selectTopicsForScriptureQuery = 'SELECT t.name FROM topic t JOIN scripture_topic st ON st.topic_id = t.id WHERE st.scripture_id = :scriptureId';

  $selectTopicsForScriptureStatement = $db->prepare($selectTopicsForScriptureQuery);
  $selectTopicsForScriptureStatement->bindParam(':scriptureId', $row['id'], PDO::PARAM_INT);
  $selectTopicsForScriptureStatement->execute();
  $rows = $selectTopicsForScriptureStatement->fetchAll(PDO::FETCH_ASSOC);

  foreach($rows as $row) {
    echo ' ' . $row['name'] . ' ';
  }

  echo  '</strong>- "' . $row['content'] . '"<br/>';
}
?>
