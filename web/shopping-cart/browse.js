function clearTextTimeout(element) {
    element.innerHTML = "";
}

function postItem(id, name, quantity, imageUrl) {
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
    request.send('id=' + id + '&name=' + name + '&quantity=' + quantity + '&imageUrl=' + imageUrl);
}

function parseItem(id) {
    // Get the Quantity and Image URL for this id
    var name = document.querySelector(`#${id}~h3`).innerHTML;
    console.log(name);
    var quantityElement = document.getElementById(`${id}-quantity`);
    var imageElement = document.getElementById(`${id}-image`);

    postItem(id, name, quantityElement.value, imageElement.src);
}

document.getElementById('cart-icon').addEventListener('click', () => {
    console.log('I am in the listener');
    window.open('view-cart.php', '_self');
});