<?php
    include 'includes/connection.php';
    include 'imageEmailController.php';

    // grabs the id from the url 
    $id = $_GET["id"];
    // puts the id into a variable and put it into a sql statement so that we can pull the correct table they are associated to
    $query =  mysql_query("SELECT * FROM website_testing_user WHERE id_user='".$id."'");
    // grabs the table and then with the database table put them into an array and call the correct table needed.
    $res = mysql_fetch_array($query);
    $firstname =  $res['fname']; // pulling fname column from the database table 
    $lastname  =  $res['lname']; // pulling lname column from the database table
    $email     =  $res['email']; // pulling email  column  from the database table 
    $propName  =  $res['property']; // pulling username column from the database table
    $website   =  $res['website']; // pulling website column from the database table
    $id_user   =  $res['id_user'];
    $fullname  = $firstname.' '.$lastname;

    // if the the client wants update their information 
    // the reason why we use $_POST[variable] was becuse this sql statment is saying in the div id ="inputUpdateForm" grabe the name of the input
    // field and update it to the database.
         if(isset($_POST['submit'])){
            $u = "UPDATE website_testing_user SET `fname`    = '$_POST[firstname]',
                                                  `lname`    = '$_POST[lastname]',
                                                  `email`    = '$_POST[email]',
                                                  `property` = '$_POST[propName]',
                                                  `website`  = '$_POST[website]' WHERE id_user = $_POST[id_user]";
    // run the query ($u) or die   
        mysql_query($u) or die(mysql_error());  
    // if it didnt die than send them back to the page with the updated information                                       
        header('Location: submission.php?id='.$_POST['id_user']);                         
         }
?> 
<!DOCTYPE HTML>
<html>
    <head>
        <?php include "includes/head.php";?>
        <title> Work Order | OpenBook </title>

    </head>
    <body onload="getHeight()">
       <div id="header">

          <?php include "includes/header.php";?>

      </div>

          <!-- This div will show when in mobile perspective -->
            <div id="phoneSquare" class="phone"><a href="tel:+12086240374"><img id="callPhone" src="img/phone.png" /></a></div>
            <div class="clear"></div>
          <!-- /phoneSquare --> 

          <div id="wrapper" style="margin-bottom:-20px;">

<div id="errorMSG" class='hide'>
    <h2 style="color:red; margin-top:5%;"> Invalid Extension, please re-enter your workorder form with the correct extension. </h2>
</div>


          <div id="informationButton"  id="reveal"><button type="button" onclick="edit()"> Edit </button></div>
            <div id="information" class="reveal">
                <?php echo $res['property']; ?>  <br />
                <?php echo $res['website']; ?>   <br />
                <?php echo $res['fname']." ".$res['lname']; ?> <br />
                <?php echo $res['email']; ?>  
            </div> <!-- information -->
          <div class="clear"></div>
<!-- =================  THIS FORM IS KEPT HIDDEN UNTIL THE USER CLICKS THE EDIT() THAN THE INFORATION DIV WILL BE HIDDEN AND THIS FORM WILL BE REVEALED ==== -->
             <form id = "updateForm" action = "<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST" >
                 <div id="inputUpdateForm" class="hide">
                       <label> Property Name: </label>  <input type="text" class="inputSize" name = "propName" maxlength:"50"  size="27" value="<?php echo $res['property']; ?>"/>    <br />
                       <label> Website Name: </label> <input type="text" class="inputSize" name = "website"  maxlength:"50" size="27" value="<?php echo $res['website']; ?>" />     <br />
                       <label> First Name: </label>  <input type="text" maxlength:"25"    name = "firstname" size="11" value="<?php echo $res['fname'];?>">
                        <label> Last Name:</label> <input type="text" maxlength:"25"    name = "lastname"  size="11" value ="<?php echo $res['lname']; ?>" /> <br />
                        <label> Email Address: </label> <input type="text" class="inputSize" name = "email"   maxlength:"50"  size="27" value="<?php echo $res['email']; ?>" /> 
                         <input type="hidden" maxlength:"50"  name = "id_user" value="<?php echo $id_user ?>" />
                         <input type="submit" value="Update" id="updateButton"  name = "submit" /><br />
                      <a href="updatePSW.php" > Change Password </a><br/>

                      <div id="cancel">
                      <a href="submission.php?id=<?php echo $id ?>" > Cancel </a>
                      </div>
                 </div> <!-- inputUpdateForm -->
             </form><!-- informationForm -->
          <div class="clear"></div>
<!-- =========================================== Actual Work Order ========================================================================================== -->
              <form id="contentForm"  action = "emailController/email.php"  method = "POST"  enctype="multipart/form-data">
                    <div id = "websitePages">

                    <h2> Page Name: <span class="headerDescription">{ Example: Home Page }</h2>
                    <input type="text" name="pageHeader0" id="pageHeader0" placeholder="Enter Page Name"/>

                  <div class="clear"></div>
                      <textarea name="myInputs0" name="myInputs0" id="myInputs0" placeholder="Enter Page Changes..." rows="10" style='width:100%;'></textarea>  
                      <hr style='margin-top: 4%; height:2px; background-color: #58595B; opacity: 0.5; width:100%'>
                     <!-- I========== Image Button ===== -->
                   			 
                   			   <div id='imagePosition'>
                   			      	<input type="button" value="+Add Another Image:" onclick="addImg('imagePosition')" class='imageFile'/>
                   			   </div><!-- imagePosition -->
                   			 
                     <!-- ========== /Image Button ===== -->
                      <div class="clear"></div>     
                      <br/> 
                    
                    </div> <!-- /websitePages -->
                    <div id="submitButton">
                      <input type="hidden" name="id_user"  value="<?php echo $id_user ?>" />
                      <input type="hidden" name="fullname" value="<?php echo $fullname?>"/>
                      <input type="hidden" name="email"    value="<?php echo $email; ?>" />
                      <input type="hidden" name="website"  value="<?php echo $website; ?>" />
                      <input type="hidden" name="propName" value="<?php echo $propName; ?>" />
                      <input type="button" value=" +Add Another Page " id="add" onclick="addInput('websitePages')" />


                     <!-- <div id="imageComment" style="text-align:center;">
                        <p> *Note - if sending new photos or requesting photo alterations please clearly label all photos.</p>
                        <p> &nbsp;Make sure you specify each new image name in the comment box.</p>
                        <p style="font-size: 85%;"><i>( Allowed Extensions: .png .gif .jpeg .pdf .docx .jgp .txt .pdf )</i></p>
                      </div>  -->
                      <input type="submit" value="Submit Work Order" name="submit" id="submission"/> <div class='clear'></div>
                      <br/>
                    </div> <!-- submitButton -->
              </form>
<!-- ==================================================================================================================================================== -->

        </div>


        <div id="footerSub">
          <div id="copyright" style="float: left; margin-left:15px;">Copyright OpenBook inc. © 2014 </div>
          <div id="websiteURL" style="float:right; margin-right:15px;"><a href="www.openbook.net" style="color: #fff; text-decoration:none;">openbook.net</a></div>
          <a href="logout.php" style="float: right; padding-right: 3%; color: #fff; text-decoration: none;"> Logout </a>
        </div>
    </body>
</html>