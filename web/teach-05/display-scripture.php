<h1>Scripture Resources</h1>
<?php
include 'db.php';
$db = getDb();



foreach ($rows as $row) {
  echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "' . $row['content'] . '"<br/>';
}
?>
