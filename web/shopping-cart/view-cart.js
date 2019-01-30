function removeItem(id) {
    console.log(id);
    // Create AJAX Request
    var request = new XMLHttpRequest();

    // Receive returned data and report success to the user
    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            var url = new URL(request.responseURL);
            var itemCount = url.searchParams.get('count');
            document.querySelector('#cart-header > span > h2').innerHTML = 'Items in Cart: ' + itemCount;

            // Remove Go To Checkout button if necessary
            if (itemCount <= 0) {
                document.getElementById('go-to-checkout-button').remove();
            }

            // Delete the parent associated with this id
            document.getElementById(`${id}-name`).parentElement.remove();
        }
    }

    request.open('POST', 'remove.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('id=' + id);
}

document.getElementById('back-to-browse-button').addEventListener('click', () => {
    window.open('browse.php', '_self');
});

document.getElementById('go-to-checkout-button').addEventListener('click', () => {
    window.open('checkout.php', '_self');
});