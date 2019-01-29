function clearTextTimeout(element) {
    element.innerHTML = "";
}

function createAddItemDto(id, quantity) {
    // Create AJAX Request
    var request = new XMLHttpRequest();

    // Receive returned data and report success to the user
    request.onreadystatechange = () => {
        if (this.readyState == 4 && this.status == 200) {
            var feedbackElement = document.getElementById('rufatti-feedback');
            feedbackElement.innerHTML = 'Added to Cart';
            setTimeout(clearTextTimeout, 5000, feedbackElement);
        }
    }

    request.open('POST', 'add.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('id=' + id + '&quantity=' + quantity);
}