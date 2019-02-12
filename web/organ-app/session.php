<?php
// Start the Session
session_start();

// Receive the data from the POST request
$id = htmlspecialchars($_POST["username"]);
$name = htmlspecialchars($_POST["password"]);

if (isset($_POST["username"])) {
    // Check the Database to see if the username exists
    include 'db.php';
    $db = getDb();

    $statement = $db->prepare('SELECT username FROM student WHERE username=:username');
    $statement->bindValue(':username', $username, PDO::PARAM_INT);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) == 0) {
        // Username is not in the database
    } else {
        // Username exists
    }

    foreach ($rows as $row) {
        
    }

    // $_SESSION["username"] = $_POST["username"];
    // header("Location: login.php");
}
?>