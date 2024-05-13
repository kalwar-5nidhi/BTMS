document.addEventListener("DOMContentLoaded", function() {
    var userIcon = document.getElementById("userIcon");
    var dropdownContent = document.querySelector(".dropdown-content");
  
    userIcon.addEventListener("click", function() {
      dropdownContent.classList.toggle("show-dropdown");
    });
  });
  