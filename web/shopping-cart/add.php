<?php
session_start();

function createItemObject($id, $name, $quantity, $imageUrl) {
    $itemObject->id = $id;
    $itemObject->name = $name;
    $itemObject->quantity = $quantity;
    $itemObject->imageUrl = $imageUrl;

    return $itemObject;
}

// Receive the data from the POST request
$id = htmlspecialchars($_POST["id"]);
$name = htmlspecialchars($_POST["name"]);
$quantity = htmlspecialchars($_POST["quantity"]);
$imageUrl = htmlspecialchars($_POST["imageUrl"]);

// If the Address was sent
if (array_key_exists("Address", $_POST)) {
    // Save the Address to the Session Variables
    $_SESSION["Address"] = htmlspecialchars($_POST["Address"]);

    // Redirect to Confirmation Page
    header("Location: confirm.php");
    exit;
}

// IF the id is already found in the Session Variables
if (array_key_exists($id, $_SESSION)) {
    // Update the Session variable with the appropriate quantity
    $itemObject = json_decode($_SESSION[$id], TRUE);

    $itemObject->quantity = $quantity;

    $_SESSION[$id] = json_encode($itemObject);
} else {
    // Create an association in Session for this id
    $itemObject = createItemObject($id, $name, $quantity, $imageUrl);
    $_SESSION[$id] = json_encode($itemObject);
}

$itemCount = 0;
foreach ($_SESSION as $key => $value) {
    if ($key != 'Address') {
        $itemCount = $itemCount + 1;
    }
}

header("Location: browse.php?count=$itemCount");
exit;
?>