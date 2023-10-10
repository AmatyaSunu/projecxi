/* Script for the dashboard page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

function getProjectDetail(elem) {
    const trElement = document.getElementById(elem);
    const tdElements = trElement.getElementsByTagName("td");

    const projectKey = tdElements[0].textContent;
    const projectName = tdElements[1].textContent;

    return { projectKey, projectName };
}

// Adding event listeners to the links
document.getElementById('create-project').addEventListener('click', function () {
    navigateToPage('./project/create-project.html');
});

document.getElementById('kanban1').addEventListener('click', function () {
    const { projectKey, projectName } = getProjectDetail('kanban1');
    navigateToPage(`./project/kanban1.html?projectKey=${encodeURIComponent(projectKey)}&projectName=${encodeURIComponent(projectName)}`);
});

document.getElementById('kanban2').addEventListener('click', function () {
    const { projectKey, projectName } = getProjectDetail('kanban2');
    navigateToPage(`./project/kanban2.html?projectKey=${encodeURIComponent(projectKey)}&projectName=${encodeURIComponent(projectName)}`);
});

// Added code for dropdown menu
document.addEventListener("DOMContentLoaded", function () {
    const dropdownIcon = document.getElementById("dropdownIcon");
    const dropdownContent = document.getElementById("dropdownContent");

    dropdownIcon.addEventListener("click", function () {
        dropdownContent.classList.toggle("show");
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener("click", function (event) {
        if (!event.target.matches("#dropdownIcon")) {
            if (dropdownContent.classList.contains("show")) {
                dropdownContent.classList.remove("show");
            }
        }
    });
});
