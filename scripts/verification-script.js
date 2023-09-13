/* Script for the verification page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
    console.log("here");
    window.location.href = url;
}

// Adding event listeners to the links
document.getElementById('privacy-policy').addEventListener('click', function () {
    navigateToPage('../landing-pages/privacy-policy.html');
});

document.getElementById('terms-of-use').addEventListener('click', function () {
    navigateToPage('../landing-pages/terms-of-use.html');
});

document.getElementById('contact-us').addEventListener('click', function () {
    navigateToPage('../landing-pages/contact-us.html');
});

document.getElementById('logo').addEventListener('click', function () {
    navigateToPage('../confirmation/verification-success.html');
});

document.getElementById('verified').addEventListener('click', function () {
    navigateToPage('../signup/mfa.html');
});