function clearTextTimeout(element) {
    element.innerHTML = "";
}

function removeItem(id) {
    // Create AJAX Request
    var request = new XMLHttpRequest();

    // Receive returned data and report success to the user
    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            var url = new URL(request.responseURL);
            document.querySelector('#cart-header > span > h2').innerHTML = 'Items in Cart: ' + url.searchParams.get('count');

            // Delete the parent associated with this id
            document.querySelector(`#${id}-name`).parentElement.remove();
        }
    }

    request.open('POST', 'remove.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('id=' + id);
}

document.getElementById('back-to-browse-button').addEventListener('click', () => {
    window.open('browse.php', '_self');
});