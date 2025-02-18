/* Script for the create project page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
  window.location.href = url;
}

// Checks if an input field is not empty
function isNotEmpty(inputField) {
  return inputField !== "";
}

// Function to create project
function createProject() {
  const projectKey = document.getElementById("project-key").value.trim();
  const projectName = document.getElementById("project-name").value.trim();
  const url = document.getElementById("url").value.trim();
  const projectType = document.getElementById("project-type").value.trim();
  const projectLead = document.getElementById("project-lead").value.trim();
  const description = document.getElementById("description").value.trim();
  const defaultAssignee = document
    .getElementById("default-assignee")
    .value.trim();
  const currentDate = new Date();
  const status = "Progress";

  // Extract day, month, and year
  const day = String(currentDate.getDate()).padStart(2, "0");
  const month = String(currentDate.getMonth() + 1).padStart(2, "0");
  const year = currentDate.getFullYear();

  // Format the date as "yyyy/mm/dd"
  const startDate = `${year}/${month}/${day}`;

  if (!isNotEmpty(projectName)) {
    alert("Please enter a valid title.");
    return;
  }

  if (!isNotEmpty(description)) {
    alert("Please enter a valid description.");
    return;
  }

  if (!isNotEmpty(projectLead)) {
    alert("Please enter a valid lead.");
    return;
  }

  if (!isNotEmpty(projectKey)) {
    alert("Please enter a valid key.");
    return;
  }

  data = {
    projectKey,
    projectName,
    url,
    projectType,
    projectLead,
    description,
    defaultAssignee,
    startDate,
    status,
  };

  console.log("query", data);

  const queryString = new URLSearchParams(data).toString();

  window.location.href =
    "../confirmation/new-project-confirmation.php?" + queryString;
}

document
  .getElementById("create-project-btn")
  .addEventListener("click", createProject);

document
  .getElementById("main-logo-project")
  .addEventListener("click", function () {
    navigateToPage("../dashboard.php");
  });

// Adding event listeners to the links
document.getElementById("dashboard").addEventListener("click", function () {
  navigateToPage("../dashboard.php");
});
document.getElementById("projects").addEventListener("click", function () {
  navigateToPage("../project.php");
});

document.getElementById("profile").addEventListener("click", function () {
  navigateToPage("../php/profile.php");
});

document.getElementById("contact-us").addEventListener("click", function () {
  navigateToPage("../landing-pages/contact-us.html");
});

document.getElementById("faq").addEventListener("click", function () {
  navigateToPage("../faq.html");
});

document.getElementById("terms-of-use").addEventListener("click", function () {
  navigateToPage("../landing-pages/terms-of-use.html");
});

// Function to clear user-related session data
function clearSessionData() {
  sessionStorage.clear();
}

// Function to logout
function logout() {
  // Display a confirmation dialog
  const confirmed = window.confirm("Are you sure you want to logout?");

  if (confirmed) {
    // Clear user-related session data
    clearSessionData();

    // Redirect to the login page
    navigateToPage("./signup/login-form.php");
  }
}

// Adding an event listener to the logout link
document.getElementById("logout").addEventListener("click", function () {
  logout();
});
