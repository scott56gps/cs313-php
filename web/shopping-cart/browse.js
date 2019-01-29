function clearTextTimeout(element) {
    element.innerHTML = "";
}

function postItem(id, quantity, imageUrl) {
    // Create AJAX Request
    var request = new XMLHttpRequest();

    // Receive returned data and report success to the user
    request.onreadystatechange = () => {
        if (this.readyState == 4 && this.status == 200) {
            console.log(request.responseText);
            var feedbackElement = document.getElementById(`${id}-feedback`);
            feedbackElement.innerHTML = 'Added to Cart';
            setTimeout(clearTextTimeout, 5000, feedbackElement);
        }
    }

    request.open('POST', 'add.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('id=' + id + '&quantity=' + quantity + '&imageUrl=' + imageUrl);
}

function parseItem(id) {
    // Get the Quantity and Image URL for this id
    var quantityElement = document.getElementById(`${id}-quantity`);
    var imageElement = document.getElementById(`${id}-image`);

    postItem(id, quantityElement.value, imageElement.src);
}