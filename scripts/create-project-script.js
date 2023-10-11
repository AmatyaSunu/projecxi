/* Script for the create project page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

// Checks if an input field is not empty
function isNotEmpty(inputField) {
    return inputField !== '';
}

// Function to create project
function createProject() {
    console.log("here");
    const projectKey = document.getElementById('project-key').value.trim();
    const projectName = document.getElementById('project-name').value.trim();
    const url = document.getElementById('url').value.trim();
    const projectType = document.getElementById('project-type').value.trim();
    const projectLead = document.getElementById('project-lead').value.trim();
    const description = document.getElementById('description').value.trim();
    const defaultAssignee = document.getElementById('default-assignee').value.trim();
    const currentDate = new Date();

    // Extract day, month, and year
    const day = String(currentDate.getDate()).padStart(2, '0');
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const year = currentDate.getFullYear();

    // Format the date as "yyyy/mm/dd"
    const startDate = `${year}/${month}/${day}`;

    if (!isNotEmpty(projectName)) {
        alert('Please enter a valid title.');
        return;
    }

    if (!isNotEmpty(description)) {
        alert('Please enter a valid description.');
        return;
    }

    if (!isNotEmpty(projectLead)) {
        alert('Please enter a valid lead.');
        return;
    }

    if (!isNotEmpty(projectKey)) {
        alert('Please enter a valid key.');
        return;
    }

    data = {
        projectKey,
        projectName,
        url,
        projectType,
        description,
        defaultAssignee,
        startDate
    }

    const queryString = new URLSearchParams(data).toString();
    console.log("string", queryString);
    window.location.href = '../confirmation/new-project-confirmation.php?' + queryString;
} 

document.getElementById('create-project-btn').addEventListener('click', createProject);

document.getElementById('main-logo-project').addEventListener('click', function () {
    navigateToPage('../dashboard.php');
});