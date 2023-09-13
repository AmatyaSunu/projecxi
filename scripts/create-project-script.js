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
    const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based, so add 1
    const year = currentDate.getFullYear();

    // Format the date as "dd/mm/yyyy"
    const startDate = `${day}/${month}/${year}`;


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

    console.log(data);
    navigateToPage(`./kanban.html?projectKey=${encodeURIComponent(projectKey)}&projectName=${encodeURIComponent(projectName)}&projectLead=${encodeURIComponent(projectLead)}&startDate=${encodeURIComponent(startDate)}`)

    // Send a POST request to the dashboard page with the data object in the body
    // fetch('../dashboard.html', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json'
    //     },
    //     body: JSON.stringify(data)
    // })
    // .then(response => {
    //     if (response.ok) {
    //         navigateToPage('../dashboard.html');
    //     } else {
    //         alert('An error occurred while creating the project.');
    //     }
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    // });
}

document.getElementById('create-project-btn').addEventListener('click', createProject);

// document.getElementById('cancel-btn').addEventListener('click', navigateToPage('../dashboard.html'));