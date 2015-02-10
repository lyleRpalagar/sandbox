// The two functions below :
// 1 - Changes the transition from a hamburger to an X and if clicked again from an X to a hamburger
// 2 - created a global variable called stmt and gave it a value of close. If the nav-toggle has been clicked changed
// the stmt value to open and than show the navigation list, if the stmt value is open than change the value of the stmt
// to close and hide the navigation list.

// Summary: These two functions does is when the hamburger icon has been clicked it either shows or hides the navigation list.
var stmt = "close";
document.querySelector( "#nav-toggle" ).addEventListener( "click", function() {
  				this.classList.toggle( "active" );
});
	

$('#nav-toggle').click(function(){
	if(stmt == "close"){
		stmt = "open";
		document.getElementById('nav_wrapper').setAttribute("class", "show");
	}
	else if(stmt == "open"){
		stmt = "close";
		document.getElementById('nav_wrapper').setAttribute("class", "hide");
	}

		else{
			window.alert('Something is wrong with the Hamburger Icon toggle functions');
		}
});

// This function is to help fix a bug in the first function above where if the client were to click the hamburger icon
// again it will set the navigation to hide, and if the client resize the window the navigation will still have the class 
// hide. The funciton below figures what size the window is and changes the class to either hide and show.
$(window).resize(function(){
	var userWidth = $(window).width();
	if(userWidth > 500){
		document.getElementById('nav_wrapper').setAttribute("class", "show");
	}
	else{
		document.getElementById('nav_wrapper').setAttribute("class", "hide");
	}
});

// Get Height() :
// grabs the height of the user's device and adds on the height to the container; 
// Objective : this is used to place the footer on the bottom of the screen
function getHeight(){
	var usersHeight = screen.height;
	var uHeight = usersHeight - 300;
			document.getElementById('container').style.minHeight=uHeight+10+"px";
}