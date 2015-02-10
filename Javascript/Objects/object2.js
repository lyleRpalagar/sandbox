// Create an object and put it in a variable.
var car = {
	 // create variable and put values into the variable
	 type: "Fiat",
	 model: "500",
	 color: "white"

};

// Displays the object values depending on what you are targeting.
console.log("Inside the car object type it is: "+ car.type);

// IF loop; if the color of the object white than display "its white" else display error
if(car.color == "white"){
	console.log("its white");
}
	else{
		console.log("error");
	}


// Breaking the program
// showing null 
var carError ={
    type: "",
    model: "500",
    color: "white"
}
// null will be displayed as an empty string!
console.log('[' + carError.type  + ']' +
	        '[' + carError.model + ']' +
	        '[' + carError.color + ']'  );