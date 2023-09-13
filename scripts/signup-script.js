// Function to navigate to the next page
function navigateToPage(url) {
    window.location.href = url;
}

// Adding event listeners to the links
document.getElementById('privacy-policy').addEventListener('click', function () {
    console.log("here");
    navigateToPage('../landing-pages/privacy-policy.html');
});

document.getElementById('terms-of-use').addEventListener('click', function () {
    navigateToPage('../landing-pages/terms-of-use.html');
});

