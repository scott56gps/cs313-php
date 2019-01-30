function clearTextTimeout(element) {
    element.innerHTML = "";
}

function postItem(id, quantity, imageUrl) {
    console.log('IN POST ITEM');

    // Create AJAX Request
    var request = new XMLHttpRequest();

    // Receive returned data and report success to the user
    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            var url = new URL(request.responseURL);
            document.querySelector('#cart-header > span > h2').innerHTML = 'Items in Cart: ' + url.searchParams.get('count');
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