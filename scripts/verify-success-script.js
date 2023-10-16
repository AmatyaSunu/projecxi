/* Script for the verification page
Author: Sunidhi Amatya */

// Function to navigate to the next page
function navigateToPage(url) {
  window.location.href = url;
}

// Adding event listeners to the links
document.getElementById("verified").addEventListener("click", function () {
  navigateToPage("../signup/mfa.html");
});
