// Function to retrieve query parameters from the URL
function getQueryVariable(variable) {
    const query = window.location.search.substring(1);
    const vars = query.split('&');

    for (let i = 0; i < vars.length; i++) {
        const pair = vars[i].split('=');

        if (decodeURIComponent(pair[0]) === variable) {
            return decodeURIComponent(pair[1]);
        }
    }

    return null;
}

// Get project key and name query parameter from the URL
const projectKey = getQueryVariable('projectKey');
const projectName = getQueryVariable('projectName');


// Function to send data to the server
function sendDataToServer(data) {
    fetch('../php/createproject.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            // Handle success as needed, e.g., redirect to a confirmation page
            // navigateToPage('../confirmation/new-project-confirmation.html?projectKey=' + encodeURIComponent(data.projectKey) + '&projectName=' + encodeURIComponent(data.projectName));
        } else {
            // Handle errors, e.g., show an error message
            alert('An error occurred while creating the project.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

document.getElementById('project-btn-new').addEventListener('click', function () {
    });

document.getElementById('cancel-new').addEventListener('click', function () {
    navigateToPage('../project/create-project.html');
});