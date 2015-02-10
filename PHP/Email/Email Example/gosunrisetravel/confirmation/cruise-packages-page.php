<!DOCTYPE HTML>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Cruise Packages | Sunrise Travel</title>
		<meta http-equiv="content-language" content="en-us">
		<link rel="stylesheet" href="../css/style.css" />
		<meta name="robots" content="noindex">
		<?php include '../confirmation/include/headConfirmation.php'; ?>
	
				<!-- STYLING FOR BACKGROUND IMAGE -->
				<style>
					.image{
						background-image: url('/confirmation/images/bg3.png');
					}
				</style>
				<!-- /STYLING FOR BACKGROUND IMAGE -->

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
							 			<h1>Cruise Packages</h1>
							 				<p>You're only minutes away from the perfect vacation. Relax and enjoy luxurious amenties and fine dining as you visit some of the world's most beautiful destinations.</p>
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

									 	 <input type="hidden" id="packages" value="cruise-packages-page">

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
