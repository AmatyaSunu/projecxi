/* Script for the dashboard page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

// Adding event listeners to the links
document.getElementById('create-project').addEventListener('click', function () {
    navigateToPage('./project/create-project.html');
});

document.getElementById('kanban1').addEventListener('click', function () {
    navigateToPage('./project/kanban1.html');
});

document.getElementById('kanban2').addEventListener('click', function () {
    navigateToPage('./project/kanban.html');
});