

// get the div element


var myDiv = document.getElementById('dropdownHamburger');
var Panel = document.getElementById('dropdownPanelId')
var panelbar = document.getElementById('panelSearchBar');


// add a click event listener to the div
myDiv.addEventListener('click', function() {
  // specify the action to take when the div is clicked

  if(Panel.style.display === "flex"){
    Panel.style.display = "none";
  }
  else {
    Panel.style.display = "flex";
  }

});




