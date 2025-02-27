/* Script for the signup page
Author: Tasmia */

// Function to navigate to the next page
function navigateToPage(url) {
  window.location.href = url;
}

// Adding event listeners to the links
document
  .getElementById("privacy-policy")
  .addEventListener("click", function () {
    navigateToPage("../landing-pages/privacy-policy.html");
  });

document.getElementById("terms-of-use").addEventListener("click", function () {
  navigateToPage("../landing-pages/terms-of-use.html");
});

// Check validity of input element
function createAccount(event) {
  const signupForm = document.getElementById("signupForm");

  const companyNameInput = document.getElementById("company-name");
  const firstNameInput = document.getElementById("first-name");
  const lastNameInput = document.getElementById("last-name");
  const fullNameInput = firstNameInput + " " + lastNameInput;
  const contactNumberInput = document.getElementById("contact-number");
  const signupEmailInput = document.getElementById("signup-email");
  const passwordInput = document.getElementById("password");

  if (!isNotEmpty(companyNameInput)) {
    event.preventDefault();
    alert("Please enter a valid company name.");
    return;
  }

  if (!isNotEmpty(firstNameInput)) {
    alert("Please enter a valid first name.");
    return;
  }

  if (!isNotEmpty(lastNameInput)) {
    alert("Please enter a valid last name.");
    return;
  }

  if (!isNotEmpty(signupEmailInput) || !isEmailValid(signupEmailInput)) {
    alert("Please enter a valid email address.");
    return;
  }

  if (!isValidPassword(passwordInput)) {
    alert(
      "Please enter a valid password. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character."
    );
    return;
  }

  data = {
    companyName: companyNameInput.value,
    firstName: firstNameInput.value,
    lastName: lastNameInput.value,
    fullName: firstNameInput.value,
    email: signupEmailInput.value,
    contactNumber: contactNumberInput.value,
    password: passwordInput.value,
  };

  const queryString = new URLSearchParams(data).toString();

  window.location.href = "../php/signup.php?" + queryString;
}

// Checks if an input field is not empty
function isNotEmpty(inputField) {
  return inputField.value.trim() !== "";
}

// Checks if email address validity
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

const signupForm = document.getElementById("signupForm");
signupForm.addEventListener("submit", function (event) {
  event.preventDefault();
  createAccount();
});
