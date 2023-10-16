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
document
  .getElementById("create-project")
  .addEventListener("click", function () {
    navigateToPage("./project/create-project.php");
  });

function navigateToPage(url, projectKey, projectName) {
  if (projectKey) {
    window.location.href =
      "php/setProjectId.php?projectKey=" +
      projectKey +
      "&redirectUrl=" +
      encodeURIComponent(url) +
      "&projectName=" +
      projectName;
  } else {
    window.location.href = url;
  }
}

document.querySelectorAll(".project-row").forEach((row) => {
  row.addEventListener("click", function () {
    const projectKey = this.getElementsByTagName("td")[0].textContent;
    const projectName = this.getElementsByTagName("td")[1].textContent;
    const redirectUrl =
      "../project/kanband.php?projectKey=" +
      encodeURIComponent(projectKey) +
      "&projectName=" +
      encodeURIComponent(projectName);
    navigateToPage(redirectUrl, projectKey, projectName);
  });
});

document.getElementById("projects").addEventListener("click", function () {
  navigateToPage("../project.php");
});

document.getElementById("profile").addEventListener("click", function () {
  navigateToPage("php/profile.php");
});

document.getElementById("contact-us").addEventListener("click", function () {
  navigateToPage("../landing-pages/contact-us.html");
});

document.getElementById("faq").addEventListener("click", function () {
  navigateToPage("../faq.html");
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
