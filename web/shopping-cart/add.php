<?php
session_start();

function createItemObject($id, $quantity, $imageUrl) {
    $itemObject->id = $id;
    $itemObject->quantity = $quantity;
    $itemObject->imageUrl = $imageUrl;

    return $itemObject;
}

// Receive the id from the POST request
$id = htmlspecialchars($_POST["id"]);
$quantity = htmlspecialchars($_POST["quantity"]);
$imageUrl = htmlspecialchars($_POST["imageUrl"]);

// IF the id is already found in the Session Variables
if (array_key_exists($id, $_SESSION)) {
    // Update the Session variable with the appropriate quantity
    $itemObject = json_decode($_SESSION[$id], TRUE);

    $itemObject->quantity = $quantity;

    $_SESSION["id"] = json_encode($itemObject);
} else {
    // Create an association in Session for this id
    $itemObject = createItemObject($id, $quantity, $imageUrl);
    $_SESSION["id"] = json_encode($itemObject);
}

echo 'Hola :)';

header('Location: browse.php');
exit;
?>