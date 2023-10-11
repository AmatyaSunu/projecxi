// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

// Checks if an input field is not empty
function isNotEmpty(inputField) {
    return inputField !== '';
}

// Function to create project
function createTicket() {

    const title = document.getElementById('title').value.trim();
    const description = document.getElementById('description').value.trim();
    const priority = document.getElementById('Priority-p').value.trim();
    const assignee = document.getElementById('assignee').value.trim();
    const estimatedDate = document.getElementById('estimatedDate').value.trim() || new Date();
    const reporter = document.getElementById('reporter').value.trim() || null;
    const type = document.getElementById('type').value.trim();
    const relatedTicket = document.getElementById('relatedTicket').value.trim()  || null;
    const status = "To do";

    if (!isNotEmpty(title)) {
        alert('Please enter a valid title.');
        return;
    }

    if (!isNotEmpty(description)) {
        alert('Please enter a valid description.');
        return;
    }

    data = {
        title,
        description,
        priority,
        assignee,
        estimatedDate,
        reporter,
        type,
        relatedTicket,
        status
    }

    const queryString = new URLSearchParams(data).toString();
    // console.log("string", queryString);
    window.location.href = '../confirmation/new-ticket-confirmation.php?' + queryString;
}

document.getElementById('create-Ticket-button').addEventListener('click', createTicket);

document.getElementById('cancel-create-ticket').addEventListener('click', function () {
    navigateToPage('./kanban1.html');
});

document.getElementById('main-logo-ticket').addEventListener('click', function () {
    navigateToPage('../dashboard.html');
});