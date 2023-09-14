// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

document.getElementById('create-ticket').addEventListener('click', function () {
    navigateToPage('../project/kanban1.html');
});

document.getElementById('cancel-ticket').addEventListener('click', function () {
    navigateToPage('../project/kanban.html');
});