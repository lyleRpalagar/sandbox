<!DOCTYPE HTML>
<html>
	<head>
	<meta charset = "utf-8">
		<title> Work Order | Template</title>
		<link rel="stylesheet" type="text/css" href="http://localhost:8080/Template/Work%20Order%20Template/css/custom.css" />
		
		<script type="text/javascript">
			 	var counter = 1;
			 	var limit = 5;


			 	// Creates a div and inserting (.innerHTML) a textarea field with an input button to delete the current textarea (which leads the the deleteTextArea(d) function ).
			  function addInput(websitePages){
			  		if(counter == limit) {
			  			alert (" You have reached the limit of adding " + counter + " fields. \n Please submit this form, and start a new sheet. Thank you \n - OpenBook Support.");
			  		}
			  		else { 
			  			var newdiv = document.createElement('div');
			  			newdiv.innerHTML = " <br/> <textarea 'name='myInputs"+counter+"' cols='39' rows='10' placeholder= 'Example : Home Page'  ></textarea><input type='button' value=' - ' id='subtract' onclick='deleteTextArea(this)'>";
			  			document.getElementById('websitePages').appendChild(newdiv);
			  			counter++;
			  		}
			  }

			  // goes to the parent node which is input -> than another parent node which is textarea and removes that child
			  function deleteTextArea(d){
			  	d.parentNode.parentNode.removeChild(d.parentNode);
			  	counter--;
			  }
			
		</script>
	</head>

	<body>
		<div id="wrapper">
						<div id="contact_form">
							<h2 id ="title"> WORK ORDER FORM </h2> <!-- title -->
							<form>
							 	<input type="text" name="propName" placeholder="Property Name " > <br/>
							 	<input type="text" name="website" placeholder="http:// " > 
									<br/>
									<br/>
										<input type="text" name="contact" placeholder = "Contact Name " > <br/>
										<input type="text" name="number"  placeholder = "Number "       > <br/>
										<input type="text" name="email"   placeholder = "Email "        >  
											<div id = "websitePages">
												<textarea name="myInputs0" placeholder="Example : Home Page" cols="39" rows="10"></textarea>
												<br/>
											</div> <!-- /websitePages -->
								<div id="submitButton">
									<input type="button" value=" + " id="add" onclick="addInput('websitePages')">
<!-- 									<input type="button" value=" - " id="subtract" onclick="subInput()"> -->
												<input id="formButton" type="button" value="Submit" onclick="emailValidation()";>
								</div> <!-- submitButton -->
								<!-- footer --> 
									<div id="footer">
											<p>&copy; 2011 OpenBook | 208.624.0374 </p>
									    </div> <!-- footer -->
							</form>
						</div> <!-- contact_form -->		

					
		</div> <!-- wrapper -->
	</body>
</html>