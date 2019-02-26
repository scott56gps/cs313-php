<?php
// Start the Session
session_start();

include 'db.php';

$postAction = htmlspecialchars($_POST['action']);
$getAction = htmlspecialchars($_GET['action']);

$action = (empty($postAction) ? $getAction : $postAction);

function getStudent($username, $db) {
    $statement = $db->prepare('SELECT id, first_name, last_name, username, teacher_id FROM student WHERE username=:username');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    echo "Row: $row<br>";

    return $row;
}

function login($db) {
    if (isset($_POST["username"])) {
        // Receive the data from the POST request
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        echo "Username: $username";

        // Check the Database to see if the username exists
        $student = getStudent($username, $db);
        if (!empty($student)) {
            // Username exists
            // Log the user in by adding a session variable
            echo $student['id'];
            // $_SESSION['student_id'] = $row['id'];
            // $_SESSION['student_first_name'] = $row['first_name'];
            // $_SESSION['student_last_name'] = $row['last_name'];
            // $_SESSION['username'] = $username;
            // $_SESSION['teacher_id'] = $row['teacher_id'];

            // header("Location: pieces.php");
        } else {
            // Username is not in the database
            // Prevent user from logging in
            header("Location: login.php");
        }
    }
}

function signUp($db) {
    if (isset($_POST["username"])) {
        // Receive the data from the POST request
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $studentFirstName = htmlspecialchars($_POST["studentFirstName"]);
        $studentLastName = htmlspecialchars($_POST["studentLastName"]);
        $studentEmail = htmlspecialchars($_POST["studentEmail"]);

        $teacherId = htmlspecialchars($_POST["selectedTeacherId"]);

        // Check the Database to see if the username exists
        $student = getStudent($username, $db);

        if (!empty($student)) {
            // Username exists
            // Prevent user from signing up
            header("Location: login.php");
            
        } else {
            // Username is not in the database
            // Sign the user up by adding a new student to the student table
            $query = "INSERT INTO student (first_name, last_name, email, teacher_id, username, password) VALUES (:firstName, :lastName, :email, :teacherId, :username, :password)";
            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $studentFirstName, PDO::PARAM_STR);
            $statement->bindValue(':lastName', $studentLastName, PDO::PARAM_STR);
            $statement->bindValue(':email', $studentEmail, PDO::PARAM_STR);
            $statement->bindValue(':teacherId', $teacherId, PDO::PARAM_INT);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':password', $password, PDO::PARAM_STR);
            $statement->execute();

            // Get the newly added student
            $studentId = $db->lastInsertId('student_id_seq');
            $query = "SELECT id, first_name, last_name, teacher_id, username FROM student WHERE id = :studentId";
            $statement = $db->prepare($query);
            $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
            $statement->execute();
            $student = $statement->fetch(PDO::FETCH_ASSOC);

            // Add the new student's information to the session variables
            $_SESSION['student_id'] = $student['id'];
            $_SESSION['student_first_name'] = $student['first_name'];
            $_SESSION['student_last_name'] = $student['last_name'];
            $_SESSION['username'] = $username;
            $_SESSION['teacher_id'] = $student['teacher_id'];

            header("Location: pieces.php");
        } 
    }
}

function logout() {
    session_destroy();
    $_SESSION = array();

    header("Location: login.php");
}

switch($action) {
    case "login":
        $db = getDb();
        login($db);
        break;
    
    case "signUp":
        $db = getDb();
        signUp($db);
        break;

    case "logout":
        logout();
        break;
}
?>