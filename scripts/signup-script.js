/* Script for the signup page
Author: Tasmia */

// Function to navigate to the next page
function navigateToPage(url) {
  window.location.href = url;
}

/* // Adding event listeners to the links
document.getElementById('privacy-policy').addEventListener('click', function () {
    navigateToPage('../landing-pages/privacy-policy.html');
});

document.getElementById('terms-of-use').addEventListener('click', function () {
    navigateToPage('../landing-pages/terms-of-use.html');
});

*/

// Check validity of input element
function createAccount(event) {
  event.preventDefault(); // Prevent the form from submitting by default

  const signupForm = document.getElementById("signupForm");

  const companyNameInput = document.getElementById("company-name");
  const firstNameInput = document.getElementById("first-name");
  const lastNameInput = document.getElementById("last-name");
  const signupEmailInput = document.getElementById("signup-email");
  const passwordInput = document.getElementById("password");

  // Checks Company Name validity
  if (!isNotEmpty(companyNameInput)) {
    alert("Please enter a valid company name.");
    return;
  }

  // Checks First Name validity
  if (!isNotEmpty(firstNameInput)) {
    alert("Please enter a valid first name.");
    return;
  }

  // Check Last Name validity
  if (!isNotEmpty(lastNameInput)) {
    alert("Please enter a valid last name.");
    return;
  }

  // Check Email validity
  if (!isNotEmpty(signupEmailInput) || !isEmailValid(signupEmailInput)) {
    alert("Please enter a valid email address.");
    return;
  }

  // Check Password validity
  if (!isValidPassword(passwordInput)) {
    alert(
      "Please enter a valid password. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character."
    );
    return;
  }
}

// Checks if an input field is not empty
function isNotEmpty(inputField) {
  return inputField.value.trim() !== "";
}

// Checks if an email address is valid
function isEmailValid(email) {
  const correctPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return correctPattern.test(email.value.trim());
}

// Checks validity of password
function isValidPassword(password) {
  const passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return passwordPattern.test(password.value.trim());
}

// Add event listener to the Create Account button
const signupForm = document.getElementById("signupForm");
signupForm.addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent the form from submitting by default
  createAccount(event);
});
