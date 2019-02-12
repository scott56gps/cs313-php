<?php
// Start the Session
session_start();

if (isset($_GET["username"])) {
    $_SESSION["username"] = $_GET["username"];
    header("Location: https://cs313-teach02.herokuapp.com/home.php");
}

if (isset($_GET["loginRedirect"])) {
    header("Location: https://cs313-teach02.herokuapp.com/login.php");
}
?>