<?php
// Start the Session
session_start();

// Receive the data from the POST request
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

if (isset($_POST["username"])) {
    // Check the Database to see if the username exists
    include 'db.php';
    $db = getDb();

    $statement = $db->prepare('SELECT * FROM student WHERE username=:username');
    $statement->bindValue(':username', $username, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if (empty($row)) {
        // Username is not in the database
        // Prevent user from logging in
        header("Location: login.php");
    } else {
        // Username exists
        // Log the user in by adding a session variable
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['student_first_name'] = $row['student_first_name'];
        $_SESSION['student_last_name'] = $row['student_last_name'];
        $_SESSION['username'] = $username;

        header("Location: pieces.php");
    }
}
?>