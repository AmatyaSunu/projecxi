// Function to navigate to the next page
function navigateToPage(url) {
  window.location.href = url;
}

// Adding event listeners to the links
const cantLoginLink = document.getElementById('cant-login');
if (cantLoginLink) {
  cantLoginLink.addEventListener('click', function () {
      navigateToPage('./signup/reset-password.html');
  });
}

const createAccountLink = document.getElementById('create-account');
if (createAccountLink) {
  createAccountLink.addEventListener('click', function () {
    navigateToPage('signup/signup.php');
  });
}

const privacyPolicyLink = document.getElementById('privacy-policy');
if (privacyPolicyLink) {
  privacyPolicyLink.addEventListener('click', function () {
      navigateToPage('../landing-pages/privacy-policy.html');
  });
}

const termsOfUseLink = document.getElementById('terms-of-use');
if (termsOfUseLink) {
  termsOfUseLink.addEventListener('click', function () {
      navigateToPage('../landing-pages/terms-of-use.html');
  });
}

// For continue login
const continueButton = document.getElementById('continue');
if (continueButton) {
  continueButton.addEventListener('click', navigateToLoginPage);
}

function navigateToLoginPage() {
  const userInput = document.getElementById('user-id');
  const userEmail = userInput.value.trim();

  if (userEmail === '' || !isValidEmail(userEmail)) {
      alert('Please enter a valid email address.');
  } else {
    window.location.href = 'signup/login-form.php?email='+ encodeURIComponent(userEmail);
  }
}

function isValidEmail(email) {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}