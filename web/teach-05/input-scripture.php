<?php
include 'db.php';
$db = getDb();

// The secure way
$statement = $db->prepare('SELECT id, name FROM topic');
$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="insert-scripture.php" method="post">
    <label for="bookInput">Book:</label>
    <input type="text" id="bookInput" name="book" />
    <input type="text" id="chapterInput" name="chapter" />
    <input type="text" id="verseInput" name="verse" />
    <textarea id="contentInput" name="content"></textarea>
    <?php
    foreach ($rows as $row) {
        echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '" />' . $row['name'];
    }
    ?>
    <input type="submit" value="Insert" />
</form>
