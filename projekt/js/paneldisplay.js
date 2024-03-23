

// get the div element


var myDiv = document.getElementById('dropdownHamburger');
var Panel = document.getElementById('dropdownPanelId')
var panelbar = document.getElementById('panelSearchBar');


// add a click event listener to the div
myDiv.addEventListener('click', function() {
  // specify the action to take when the div is clicked

  if(Panel.style.display === "flex"){
    // experimental Panel.classList.add("closed");
    
    Panel.style.display = "none";
  }
  else {
    Panel.style.display = "flex";
    Panel.style.animation = "comein 1s forwards";
    //Panel.classList.remove("closed");
  }

});

//navbarmaxxing

window.onload = function() {
  var currentPage = document.body.id; // Get the id of the current page
  var navItems = document.querySelectorAll('.nav-container li'); // Select all navbar list items
  navItems.forEach(function(item) {
      if (item.dataset.page === currentPage) { // Check if the dataset.page attribute matches the current page id
          item.classList.add('active'); // Add 'active' class to the matching item
      }
  });
  var navItems = document.querySelectorAll('.footer-container li'); // Select all navbar list items
  navItems.forEach(function(item) {
      if (item.dataset.page === currentPage) { // Check if the dataset.page attribute matches the current page id
          item.classList.add('active-footer'); // Add 'active' class to the matching item
      }
  });
}






