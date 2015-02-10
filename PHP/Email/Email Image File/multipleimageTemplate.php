 <form id="contentForm"  action = "testimage.php"  method = "POST"  enctype="multipart/form-data">
<!-- must have be in a form entype ="multiplart/form-data" also input type must be file with name being in an array and must include 
multiple attribute if you want the user to select more than one file  -->
 <input type="file" name="image[]" multiple="multiple">

 <input type="submit" name="submit" value ="submit">

 </form>

 <?php
 // see if the submit button as been pressed
 	if(isset($_POST['submit'])){

// goes through the loop of the array of how many images there are { count() }  
		 for($i=0; $i<count($_FILES['image']['name']); $i++){
			// needs these code	
		 /*need */		$image_name = $_FILES['image']['name'][$i];
   				 		$image_type = $_FILES['image']['type'][$i];
		 				$image_size = $_FILES['image']['size'][$i];
		 /*need */		$image_tmp_name=$_FILES['image']['tmp_name'][$i];
			// if there is no files uploaded than push a javascript alert error msg to the user     // optional**
			if($image_name==''){
		 			echo "<script> alert('Please Select an Image') </script>";
		 			exit();
		 		}
		 			else{

		 				// upload the image using move_uploaded_file(filename,destination)
		 				move_uploaded_file($image_tmp_name,"images/$image_name");
		 			//echo it out to the user //optional**
		 				echo "Image Uploaded Successfully <br/> Here is the Image:<br/><br/>";
		 				echo "<img src ='clientImages/$image_name' width='50' height='50'>";
		 			}
		 }		
 	}


 ?>