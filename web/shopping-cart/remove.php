<?php
session_start();

// Receive the id from the POST request
$id = htmlspecialchars($_POST["id"]);

// IF the id is already found in the Session Variables
if (array_key_exists($id, $_SESSION)) {
    // Delete the Session Variable
    unset($_SESSION[$id]);
}

$itemCount = 0;
foreach ($_SESSION as $key => $value) {
    if ($key != "Address") {
        $itemCount = $itemCount + 1;
    }
}

header("Location: view-cart.php?count=$itemCount");
exit;
?>