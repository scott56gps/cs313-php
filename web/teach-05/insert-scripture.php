<?php
include 'db.php';
$db = getDb();

$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];
$topics = $_POST['topics'];

$selectBookIdStatement = $db->prepare('SELECT id FROM book WHERE name = :book');
$selectBookIdStatement->bindParam(':book', $book, PDO::PARAM_STR);
$selectBookIdStatement->execute();
$row = $selectBookIdStatement->fetch(PDO::FETCH_ASSOC);

if (empty($row)) {
    // Insert into the Database
    $insertBookStatement = $db->prepare('INSERT INTO book (name) VALUES (:book)');
    $insertBookStatement->bindParam(':book', $book, PDO::PARAM_STR);
    $insertBookStatement->execute();

    $bookId = $db->lastInsertId('book_id_seq');
} else {
    // We have the id we need
    $bookId = $row['id'];
}

$insertScriptureStatement = $db->prepare('INSERT INTO scripture (book_id, chapter, verse, content) VALUES (:book_id, :chapter, :verse, :content)');
$insertScriptureStatement->bindParam(':book_id', $bookId, PDO::PARAM_INT);
$insertScriptureStatement->bindParam(':chapter', $chapter, PDO::PARAM_STR);
$insertScriptureStatement->bindParam(':verse', $verse, PDO::PARAM_STR);
$insertScriptureStatement->bindParam(':content', $content, PDO::PARAM_STR);
$insertScriptureStatement->execute();
$scriptureId = $db->lastInsertId('scripture_id_seq');

foreach($topics as $topicId) {
    $insertScriptureTopicStatement = $db->prepare('INSERT INTO scripture_topic (topic_id, scripture_id) VALUES (:topic_id, :scripture_id)');
    $insertScriptureTopicStatement->bindParam(':topic_id', $topicId, PDO::PARAM_INT);
    $insertScriptureTopicStatement->bindParam(':scripture_id', $scriptureId, PDO::PARAM_INT);
    $insertScriptureTopicStatement->execute();
}

// Redirect to display page
header("Location: scriptures.php");
?>
