<!-- // ignore if non-JS browser

function emailValidation(){

	var error = false;

	//grab the input from the form by the user
	var fullName = document.getElementById("fullName").value;  // First & Last Name
	var telephone = document.getElementById("telephone").value; // Phone
	var email = document.getElementById("email").value;       // Email Address
	var arrive = document.getElementById("arrive").value; // Check-in Date
	var depart = document.getElementById("depart").value; // Check-out Date
	var packages = document.getElementById("packages").value; // grab  the value where that id is on.
	// check to see if the input fields are filled 

	//FULL NAME
		if(fullName == "" || fullName == " First & Last Name* "){
			document.getElementById('fullName').className = "error";
			error = true;
		}
			else{
				document.getElementById("fullName").className = "";
			}
	//EMail		
		if(email =="" || email ==" Email*"){
			document.getElementById("email").className = "error";
			error = true;
		}
			else{
				document.getElementById("email").className = "";
			}

			if(email != "" && email != " Email*"){
				if(email.indexOf('@') === -1 || email.indexOf('.') === -1){
					document.getElementById("required-p").innerHTML = "*required - Please provide a valid e-mail address";
					document.getElementById("email").className = "error";
					error = true;
				}
					else{
						document.getElementById("required-p").innerHTML = "*required";
					}
			}

	//ERROR
		if(error){
			document.getElementById("required-p").className = "required-p-error";
			return;
		}

		// IF you added an input field you must pass it through the window.location . please use the syntax given (ie. + "&example=" + example; )
		// THIS will pass it to the php confirmation-controller-email.php
			else{
				window.location = "/confirmation/confirmation-controller-email.php?fullName=" + fullName+ "&telephone="
				 + telephone + "&email=" + email + "&arrive=" + arrive + "&depart=" + depart + "&packages=" + packages;
			}
}