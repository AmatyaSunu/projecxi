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

// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

document.getElementById('project-btn-new').addEventListener('click', function () {
    navigateToPage(`../project/kanban.html?projectKey=${encodeURIComponent(projectKey)}&projectName=${encodeURIComponent(projectName)}`);
});

document.getElementById('cancel-new').addEventListener('click', function () {
    navigateToPage('../project/create-project.html');
});