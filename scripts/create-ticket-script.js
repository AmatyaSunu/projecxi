// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

document.getElementById('create-Ticket-button').addEventListener('click', function () {
    navigateToPage('../confirmation/new-ticket-confirmation.html');
});

document.getElementById('cancel-create-ticket').addEventListener('click', function () {
    navigateToPage('./kanban1.html');
});

document.getElementById('main-logo-ticket').addEventListener('click', function () {
    navigateToPage('../dashboard.html');
});