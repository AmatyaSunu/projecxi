/* Script for the login form page
Author: Tasmia*/
/*
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

// Get email query parameter from the URL
const emailParam = getQueryVariable('email');

// Set value of the input field with the email parameter
const emailInput = document.getElementById('emailID');
if (emailParam !== null) {
    emailInput.value = emailParam;
}

// Checks validity of password
function isValidPassword(password) {
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordPattern.test(password);
}

// Checks validity of email
function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

// Navigate to dashboard page after valid password entry
function navigateToDashboardPage() {
    const passwordInput = document.getElementById('password');
    const userPassword = passwordInput.value.trim();

    const userInput = document.getElementById('emailID');
    const userEmail = userInput.value.trim();

    if (userEmail === '' || !isValidEmail(userEmail)) {
        alert('Please enter a valid email address.');
    } else if (!isValidPassword(userPassword)) {
        const alertMessage = `Password must meet the following criteria:
  - At least 8 characters long.
  - Contains at least one lowercase letter.
  - Contains at least one uppercase letter.
  - Contains at least one digit (number).
  - Contains at least one special character (e.g., !@#$%^&*).`;

        alert(alertMessage);
    } else {
        // Authenication
        if (userEmail == loginEmail && userPassword == loginPassword) {
            window.location.href = `../dashboard.html`;
        } else {
            alert('Wrong Credential: Please enter a valid email or password.')
        }
    }
}

// Navigate back to landing page after cancel
document.getElementById('cancel').addEventListener('click', function () {
    window.location.href = '../index.html';
});

document.getElementById('login').addEventListener('click', navigateToDashboardPage);

*/

// Checks validity of password
function isValidPassword(password) {
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordPattern.test(password);
}

// Checks validity of email
function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

// Navigate to dashboard page after valid password entry
function navigateToDashboardPage() {
    const passwordInput = document.getElementById('password');
    const userPassword = passwordInput.value.trim();

    const userInput = document.getElementById('emailID');
    const userEmail = userInput.value.trim();

    if (userEmail === '' || !isValidEmail(userEmail)) {
        alert('Please enter a valid email address.');
    } else if (!isValidPassword(userPassword)) {
        const alertMessage = `Password must meet the following criteria:
  - At least 8 characters long.
  - Contains at least one lowercase letter.
  - Contains at least one uppercase letter.
  - Contains at least one digit (number).
  - Contains at least one special character (e.g., !@#$%^&*).`;

        alert(alertMessage);
    } else {
        // Send the form data to the server for authentication
        // You can use AJAX or Fetch API to send a POST request to your login.php script here
        // The server will handle the authentication and redirect if successful
        // Example using Fetch API:
        fetch('../php/login.php', {
            method: 'POST',
            body: JSON.stringify({ email: userEmail, password: userPassword }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '../dashboard.html';
            } else {
                alert('Wrong Credential: Please enter a valid email or password.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });
    }
}

// Navigate back to landing page after cancel
document.getElementById('cancel').addEventListener('click', function () {
    window.location.href = '../index.html';
});

document.getElementById('login').addEventListener('click', navigateToDashboardPage);