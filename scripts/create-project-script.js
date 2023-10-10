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
    console.log("check");
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

    localStorage.setItem('projectData', JSON.stringify(data));

    navigateToPage('../confirmation/new-project-confirmation.html?projectKey=' + encodeURIComponent(data.projectKey) + '&projectName=' + encodeURIComponent(data.projectName));
}

// // Function to send data to the server
// function sendDataToServer(data) {
//     console.log("data", data)
//     fetch('../php/createproject.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(data)
//     })
//         .then(response => {
//             console.log("return", response);
//         if (response.ok) {
//             console.log("sucess");
//             // Handle success as needed, e.g., redirect to a confirmation page
//             // navigateToPage('../confirmation/new-project-confirmation.html?projectKey=' + encodeURIComponent(data.projectKey) + '&projectName=' + encodeURIComponent(data.projectName));
//         } else {
//             // Handle errors, e.g., show an error message
//             alert('An error occurred while creating the project.');
//         }
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// } 

document.getElementById('create-project-btn').addEventListener('click', createProject);

document.getElementById('main-logo-project').addEventListener('click', function () {
    navigateToPage('../dashboard.php');
});