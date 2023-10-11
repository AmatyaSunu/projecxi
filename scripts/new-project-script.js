/* Script for the create project page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

document.getElementById('project-btn-new').addEventListener('click', navigateToPage('../project/kanban.html'));