/* Script for the landing page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
  window.location.href = url;
}

// Adding event listeners to the links
document.getElementById('cant-login').addEventListener('click', function () {
  navigateToPage('./signup/reset-password.html');
});

document.getElementById('create-account').addEventListener('click', function () {
  navigateToPage('./signup/signup.html');
});

document.getElementById('privacy-policy').addEventListener('click', function () {
  console.log("here");
  navigateToPage('./landing-pages/privacy-policy.html');
});

document.getElementById('terms-of-use').addEventListener('click', function () {
  navigateToPage('./landing-pages/terms-of-use.html');
});

// For continue login
function navigateToLoginPage() {
  const userInput = document.getElementById('user-id');
  const userEmail = userInput.value.trim();

  if (userEmail === '' || !isValidEmail(userEmail)) {
    alert('Please enter a valid email address.');
  } else {
    const nextPageUrl = `./signup/login-form.html?email=${encodeURIComponent(userEmail)}`;
    window.location.href = nextPageUrl;
  }
}

function isValidEmail(email) {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}

document.getElementById('continue').addEventListener('click', navigateToLoginPage);

