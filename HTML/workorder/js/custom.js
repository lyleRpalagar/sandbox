function edit(){
	document.getElementById('inputUpdateForm').setAttribute("class", "reveal");
	document.getElementById('information').setAttribute("class", "hide");
	document.getElementById('informationButton').setAttribute("class","hide");
}
// Creates a div and inserting (.innerHTML) a textarea field with an input button to delete the current textarea (which leads the the deleteTextArea(d) function ).
			    var counter = 1;
			 	var limit = 5;
			  function addInput(websitePages){
			  		if(counter == limit) {
			  			alert(" You have reached the limit of adding " + counter + " fields. \n Please submit this form, and start a new sheet. Thank you \n - OpenBook Support.");
			  		}
			  		else { 
			  			var newdiv = document.createElement('div');
			  			var createDiv ="<br/> <h2>Page Name: <span class='headerDescription'>{ Example: Home Page }</h2> <input type='text' name='pageHeader"+counter+"' id='pageHeader"+counter+"' placeholder='Enter Page Name'/>  <div class='clear'></div>  <textarea name='myInputs"+counter+"' id='myInputs"+counter+"' rows='10' style='width:100%;' placeholder= 'Example : Home Page'  ></textarea> <input type='button' value='x' class='subtract' onclick='deleteTextArea(this)'><hr style='margin-top: 4%; height:2px; background-color: #58595B; opacity: 0.5; width:100%'> <div id='imagePosition"+counter+"'><input type='button' value='+Add Another Image:' onclick='addImg"+counter+"(imagePosition)' class='imageFile'/> </div>  <div class='clear'></div> ";
			  			newdiv.innerHTML = createDiv; 
			  			document.getElementById('websitePages').appendChild(newdiv);
			  			counter++;
			  		}
			  }

// goes to the parent node which is input -> than another parent node which is textarea and removes that child
			  function deleteTextArea(d){
			  	d.parentNode.parentNode.removeChild(d.parentNode);
			  	counter--;
			  }
			  
    var count = 1;
    var limited = 7;
	function addImg(imagePosition){
		if(count == limited) {
			alert(" You have reached the limit of adding  images in that section - OpenBook Support.");

		}
		else{
			var newdiv = document.createElement('ul');
			newdiv.innerHTML = "<li><input type='file' name='image"+count+"' class='image'></li>";
			document.getElementById('imagePosition').appendChild(newdiv);
			count++;
		}
	}

//repeated .....
    var limited1 = 13;
	function addImg1(imagePosition1){
		if(count > 6 && count == limited1) {
			alert(" You have reached the limit of adding  images in that section - OpenBook Support.");

		}
		else{
			var newdiv = document.createElement('ul');
			newdiv.innerHTML = "<input type='file' name='image"+count+"' class='image'>";
			document.getElementById('imagePosition1').appendChild(newdiv);
			count++;
		}
	}	

//repeated .....
    var limited2 = 19;
	function addImg2(imagePosition2){
		if(count > 12 && count == limited2) {
			alert(" You have reached the limit of adding  images in that section - OpenBook Support.");

		}
		else{
			var newdiv = document.createElement('ul');
			newdiv.innerHTML = "<input type='file' name='image"+count+"' class='image'>";
			document.getElementById('imagePosition2').appendChild(newdiv);
			count++;
		}
	}		  


//repeated .....
    var limited3 = 25;
	function addImg3(imagePosition3){
		if(count > 19 && count == limited3) {
			alert(" You have reached the limit of adding  images in that section - OpenBook Support.");

		}
		else{
			var newdiv = document.createElement('ul');
			newdiv.innerHTML = "<input type='file' name='image"+count+"' class='image'>";
			document.getElementById('imagePosition3').appendChild(newdiv);
			count++;
		}
	}

//repeated .....
    var limited4 = 31;
	function addImg4(imagePosition4){
		if(count > 25 && count == limited4) {
			alert(" You have reached the limit of adding  images in that section - OpenBook Support.");

		}
		else{
			var newdiv = document.createElement('ul');
			newdiv.innerHTML = "<input type='file' name='image"+count+"' class='image'>";
			document.getElementById('imagePosition4').appendChild(newdiv);
			count++;
		}
	}

//repeated .....
    var limited5 = 36;
	function addImg5(imagePosition5){
		if(count > 31 && count == limited5) {
			alert(" You have reached the limit of adding  images in that section - OpenBook Support.");

		}
		else{
			var newdiv = document.createElement('ul');
			newdiv.innerHTML = "<input type='file' name='image"+count+"' class='image'>";
			document.getElementById('imagePosition5').appendChild(newdiv);
			count++;
		}
	}



function getHeight(){
	var usersHeight = screen.height;
	var uHeight = usersHeight - 257;
	var submission = document.getElementById('submission');
	var exist = false;

	if(!submission){
	 document.getElementById('wrapper').style.minHeight=uHeight+"px";
	}

		else {
			document.getElementById('wrapper').style.minHeight=uHeight+54+"px";
		}
 

 // Grab url see if the url has "value=a at" in the url. IF it does reveal an error ELSE hide the msg.
 // this is used for submission.php to check if the file had the right extension.
 var pathArray = window.location.href.slice(window.location.href.indexOf('?')).split('&');
	
	if(pathArray[1] == 'value=a'){
		 		document.getElementById('errorMSG').setAttribute("class", "reveal");
	 	}
	 	else{
	 		document.getElementById('errorMSG').setAttribute("class","hide");
	 	}
}


