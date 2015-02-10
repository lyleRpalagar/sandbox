<!DOCTYPE HTML>
<html>

	<head>
			<title> Confirmation | Sunrise </title>
		    <script type='text/javascript' src='./js/jquery.min.js'></script>
		    <script type='text/javascript' src='./js/jquery.mobile.customized.min.js'></script>
		    <script type='text/javascript' src='./js/jquery.easing.1.3.js'></script> 
		    <script type="text/javascript" src="./js/placeholder_ie_fix.js"></script>
			<script type="text/javascript" src="http://proofing.openbook.net/proofing2/confirmation/js/emailValidation.js"></script>
		    <!--This code is for the Check in / out input fields  -->
		    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	    <link rel="stylesheet" href="../css/jquery-ui-1.10.3.custom.css" />
		    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
			<script>
			$(function() {
			  $( "#arrive" ).datepicker();
			  $( "#depart" ).datepicker();
			});
			</script>

	
				<!-- STYLING FOR BACKGROUND IMAGE -->
				<style>
				
/* ____________ Form ____________*/

.confirmationForm{ /*THIS WILL MOVE THE POSITION OF THE FORM  FROM UP,DOWN,LEFT,RIGHT*/
		position:inherit; 
		top:20%; /*POSITIVE NUMBER IS TO MOVE FORM UP, NEGATIVE NUMBER IS TO MOVE FORM DOWN*/
		left:10%;/*POSITIVE NUMBER IS TO MOVE FORM TO THE RIGHT , NEGATIVE NUMBER IS TO MOVE FORM TO THE LEFT*/
}

.transparentBackground{
	background-color: rgba(240,240,240,.5); /* THIS WILL CHANGE THE COLOR OF THE TRANSPARENT BACKGROUND OF THE FORM*/
	border-radius: 3%; /* THIS WILL CONTROL THE ROUNDNESS OF THE CORNERS OF THE FORM'S TRANSPARENT BACKGROUND*/
	width:370px;                      /*THIS WILL RESIZE THE WIDTH OF THE FORM*/
	position: inherit;
	top:-20px;
}

.confirmationFormContent{
	line-height: 1.2em; /*THIS WILL CHANGE THE FIRST PARAGRAPHS SPACING INBETWEEN THEM */
	font-family: "Lato";
}

#policyDiv{
	text-align:justify; /*[SEE .confirmationFormContent] */

}

.confirmationPolicyContent{
	font-size: 9px;
	font-family: "Lato";
	height: 4em; /*THIS WILL CONTROL THE SPACING BETWEEN THE BOTTOM OF THE POLICY CONTENT AND THE SUBMIT BUTTON */
	line-height: 0.9em !important;
}


/* _________________________________ [DO NOT TOUCH [REFERING TO MARKETING ]________________________________________ */
#stickyFooter{
	position:inherit; 
	bottom:0; 
	width:100%;
}

#formButton{
	padding:0px 0px 16px 0px;
	padding: 9px 1px 10px 8px;
	margin-left: 33%;margin-top: -1px;
	background: rgb(106,168,206);
	background: -moz-linear-gradient(top, rgba(106,168,206,1) 25%, rgba(61,122,160,1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(25%,rgba(106,168,206,1)), color-stop(100%,rgba(61,122,160,1)));
	background: -webkit-linear-gradient(top, rgba(106,168,206,1) 25%,rgba(61,122,160,1) 100%);
	background: -o-linear-gradient(top, rgba(106,168,206,1) 25%,rgba(61,122,160,1) 100%);
	background: -ms-linear-gradient(top, rgba(106,168,206,1) 25%,rgba(61,122,160,1) 100%);
	background: linear-gradient(to bottom, rgba(106,168,206,1) 25%,rgba(61,122,160,1) 100%);
	-webkit-box-shadow: inset 0 0 5px#888;
	box-shadow: inner 0 0 5px #888;
	border-radius: 6px;
	cursor: pointer;
	width:60%;
	color:#fff;
	font-size:16px;
	}


/*Transitions of the placeholders on the Form*/

/*http://css-tricks.com/hang-on-placeholders*/

[placeholder]:focus::-webkit-input-placeholder {
  transition: opacity 0.3s 0.3s ease; 
  opacity: 0;
}
input {
  border: 1px solid silver;
  padding: 3px;
}

/*Placeholder input */
input{
color: grey;
opacity: .83;
}

form .transparentBackground h1{
	margin-bottom:0;
}

.inputBoxSizing1, .error{
	line-height:2em;
	width:25em;
}

#inputBoxSizing2{
	line-height:2em;
	width:25em;
}

#inputBoxSizing3{
	line-height:2em;
	width:25em;
}

/* Css for Form validation */

#fullName{
	line-height:2em;
	width:25em;	
}
.error{
	border:solid #800000 !important;
}

#email{
	line-height:2em;
	width:25em;
}
#telephone{
	line-height:2em;
	width:25em;
}


/* MEDIA QUERIES */ 

/*______________________________ | 1400px < 2560px | ________________________*/
@media(min-width:1400px) and (max-width:2560px){
.transparentBackground{
position:relative;
top:-20px;
}
body{
background-size:100% !important;
}

/*______________________________ | 1024px | ________________________*/


@media(max-width:1024px){
.transparentBackground{
position:relative;
top:-20px;
}



/*______________________________ | 650px | ________________________*/


@media(max-width:650px){
	
.transparentBackground{
margin-top:110px;
margin-bottom:10px;
}
	
}

					.image{
						background-image: url('/confirmation/images/bg3.png');
					}
				</style>
				<!-- /STYLING FOR BACKGROUND IMAGE -->
				<script type="text/javascript" src="/confirmation/js/emailValidation.js"></script>

	</head> <!-- /head -->

<!-- IMAGE BACKGROUNG -->
<!--TO CHANGE THE IMAGE OF THE BACKGROUND SIMPLY CHANGE [.... /example.png] to whatever the new image will be  -->
<body id="home" class="image"> 
		<?php include '../confirmation/include/headerConfirmation.php'; ?>


			<div id="wrapper">
					<!-- _______________________________Submission Form _______________________________ -->

					<form class="confirmationForm">
						<div class="transparentBackground">
							<table>

							 <th>
							 	<tr>
							 		<td> 
							 			<h1>Template Name</h1>
							 				<p>You're only minutes away from the perfect vacation. Warm tropical islands, white sandy beaches, blue-green water over beautiful coral reefs, and much more.</p>
							 		</td>
							 	</tr>

							 <th>
								<tr>
								 
				<!-- <td valign="top"> <label for="[name]">[ insert if you want to put the names on the side of the form ] </label> </td> --> <!-- /td -->
								 
									 <td valign="top">
									 
									  <input type="text" id="fullName" class="inputBoxSizing1" name="fullName" maxlength="50" size="39" placeholder=" First &amp; Last Name&#42; ">
									 
									  </td> <!-- /td -->
								 
								 </tr> <!-- /tr -->
	<!-- 								 
								<tr>
								 
									 <td valign="top">
									 
									  <label for="last_name">Last Name *</label>
									 
									  </td>
	 
								 
									 <td valign="top">
									 
									  <input  type="text" name="last_name" maxlength="50" size="30">
									 
									  </td>
								 
								 </tr>
	--> 
								 
								<tr>
								 
				<!-- <td valign="top"> <label for="[name]">[ insert if you want to put the names on the side of the form ] </label> </td> --> <!-- /td -->
									 
									 <td valign="top">
									 
									  <input type="text" id="email" class="inputBoxSizing1"  name="email" maxlength="80" size="39" placeholder=" Email&#42;">
									 
									  </td> <!-- /td -->
								 
								 </tr> <!-- /tr -->
								 
								<tr>
								 
				<!-- <td valign="top"> <label for="[name]">[ insert if you want to put the names on the side of the form ] </label> </td> --> <!-- /td -->
									 
									 <td valign="top">
									 
									  <input type="text" id="telephone" class="inputBoxSizing1"   name="telephone" maxlength="30" size="39" placeholder=" Phone">
									 
									  </td> <!-- /td -->
								 
								 </tr> <!-- /tr -->
								 
								<tr>

									<!-- <td valign="top"> <label for="[name]">[ insert if you want to put the names on the side of the form ] </label> </td> --> <!-- /td -->
									 
									 <td valign="top">
									 
									 <input  type="text" id="arrive" name="arrive" class="date" maxlength="11" size="19" placeholder=" Check-in" style="line-height:2em;">

									 <input  type="text" id="depart" name="depart" class="date" maxlength="12" size="19" placeholder=" Check-out" style="line-height:2em;">
									  </td> <!-- /td -->
								 
								 </tr> <!-- /tr -->
								 
	<!-- 								 <td valign="top">
								 
								  <label for="comments">Comments *</label>
								 
								  </td> 
								 
								 <td valign="top">
								 
								  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
								 
								  </td>
								 
								 </tr>
	 -->

				 		 <!-- _________Policy _________ -->
								<tr>
								 <td>
								 	<div class="policyDiv">
								 		<p>&#42;We respect your privacy and will never give away your information to any third party.</p> 
								 	</div>
								 </td>
								</tr>

						 <!-- _________End Policy _________ -->
								 
								 <tr>
								 
									 <td colspan="2" style="text-align:center">
									 
									 	 <input id="formButton" type="button" value="Submit" onclick="emailValidation()";>



<!-- _____________________| TO MAKE ANOTHER PAGE CHANGE THE VALUE="TEMPLATE" INTO THE NAME YOUR [NAME]CONFIRMATION.PHP IS  |________________________-->

									 	 <input type="hidden" id="packages" value="template">

<!-- _____________________|^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ |________________________-->
									


									 <p id="required-p">*required</p>
									  </td> <!-- /td -->
								 
								 </tr> <!-- /tr -->
							 
							</table>
					 	</div> <!--/transparentBackground -->
					</form>

					<!-- _______________________________END Submission Form _______________________________ -->

			</div> <!-- /wrapper -->

<div id="stickyFooter">
		<?php include '../confirmation/include/footerConfirmation.php'; ?>
</div>

</body><!-- /body -->

</html>
