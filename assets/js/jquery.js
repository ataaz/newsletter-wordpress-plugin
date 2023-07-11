// Get the modal
var modal = document.getElementById("newsletter-form");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Function to check if the user has scrolled past 40% of the article
function isScrolledPast40Percent() {
  var articleHeight = document.documentElement.scrollHeight;
  var windowHeight = window.innerHeight;
  var scrollPosition = window.scrollY || window.pageYOffset || document.body.scrollTop + (document.documentElement && document.documentElement.scrollTop || 0);
  var scrollPercentage = (scrollPosition / (articleHeight - windowHeight)) * 100;
  return scrollPercentage >= 40;
}

// Function to show the newsletter sign-up form
function showNewsletterForm() {
  // Code to show the newsletter sign-up form
  modal.style.display = 'block';
}

// Function to check if the user has closed the newsletter form
function hasUserClosedForm() {
  // Code to check if the user has closed the form
  return localStorage.getItem('newsletterClosed') === 'true';
}

// Function to set the user interaction status
function setUserInteractionStatus() {
  // Code to set the user interaction status
  localStorage.setItem('newsletterClosed', 'true');
}

// Function to handle the display of the newsletter sign-up form
function handleNewsletterFormDisplay() {
  if (!hasUserClosedForm() && isScrolledPast40Percent()) {
    showNewsletterForm();
    setUserInteractionStatus();
    // Remove the scroll event listener once the form is shown
    window.removeEventListener('scroll', handleNewsletterFormDisplay);
  }
}

// Event listener for scroll event
window.addEventListener('scroll', handleNewsletterFormDisplay);

// Trigger the initial check on page load
handleNewsletterFormDisplay();