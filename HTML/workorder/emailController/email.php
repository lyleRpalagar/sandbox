<?php
 
session_start();
  
      $allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt","","PDF","JPG","DOC","DOCX","GIF","JPEG","PNG");
      $files = array();


      
      foreach($_FILES as $name=>$file) {
        $file_name = $file['name']; 
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
           if(!in_array($ext,$allowedExtensions)) {
              header("Location: ../submission.php?id=".$_POST['id_user']."&value=a");
              exit();
           }


              $server_file = "clientImages/$path_parts[basename]";
              move_uploaded_file($temp_name,$server_file);
              array_push($files,$server_file);




      }

      // email fields: to, from, subject, and so on
      $to = "lyle.palagar@openbook.net";
      $from = "From: " .$_POST['email']; 
      $subject = $_POST['propName']."Filled out a Work Order Form.";
      // =================================================================================================================== 
      //Website
      $website = $_POST['website'];
                       
      //Content 
      $property  =  $_POST['propName'];
      $name = $_POST['fullname'];
      $email = $_POST['email'];

      $title0 = $_POST['pageHeader0'];
      $title1 = $_POST['pageHeader1'];
      $title2 = $_POST['pageHeader2'];
      $title3 = $_POST['pageHeader3'];
      $title4 = $_POST['pageHeader4'];
      $title5 = $_POST['pageHeader5'];

      $message0   =  $_POST["myInputs0"]; 
      $message1   =  $_POST["myInputs1"];
      $message2   =  $_POST["myInputs2"];
      $message3   =  $_POST["myInputs3"];
      $message4   =  $_POST["myInputs4"];
      $message5   =  $_POST["myInputs5"]; 
    
      $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                      <html xmlns="http://www.w3.org/1999/xhtml">
                          <head>
                                  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
                                  <title> Work Order | Openbook </title>

                                        <style type="text/css">

                                                /*////// RESET STYLES //////*/
                                                body, #bodyTable, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;}
                                                table{border-collapse:collapse;}
                                                img, a img{border:0; outline:none; text-decoration:none;}
                                                h1, h2, h3, h4, h5, h6{margin:0; padding:0;}
                                                p{margin: 1em 0;}

                                                /*////// CLIENT-SPECIFIC STYLES //////*/
                                                .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail/Outlook.com to display emails at full width. */
                                                .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;} /* Force Hotmail/Outlook.com to display line heights normally. */
                                                table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up. */
                                                #outlook a{padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message. */
                                                img{-ms-interpolation-mode: bicubic;} /* Force IE to smoothly render resized images. */
                                                body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;} /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */

                                  </style>
                      
                          </head> 
                          <body style="font-family:Arial, Helvetica, sans-serif; color:#000; width:900px;">
                              <center>
                              <table style="width=900px;"  cellspacing="2" cellpadding="4">
                                
                                <tr>
                                  <td colspan="2"  style="background-color:#1C75BC ">
                                    <center>
                                      <h1 style="color:#fff;" >WORK ORDER</h1>
                                      </center>
                                    </td>
                                </tr>
                          
                                    <tr> 
                                      <td colspan="2" style="text-align:left;float:right;">
                                        
                                         <span><b>Contact Name:</b>  </span>'.$name.'<br/>
                                         <span style="padding-left: 69px";><b>Email:</b>         </span> '.$email.'<br/><br/>
                                         <span><b>Property Name :</b></span>'.$property.'<br/>
                                           <span style="padding-left: 56px;"><b>Website:</b>       </span>'.$website.'<br/>
                                                
                                      </td>
                                    </tr>
                          
                                    <tr>
                                      <td>
                          
                                        <b> Request 1: '.$title0.'  </b>
                                          <p>'.$message0.'</p>
                                          <br/><br/>
                                        <b> Request 2: '.$title1.' </b>
                                          <p>'.$message1.'</p>
                                          <br/><br/>
                                        <b> Request 3: '.$title2.' </b>
                                          <p>'.$message2.'</p>
                                          <br/><br/>
                                        <b> Request 4: '.$title3.' </b>
                                          <p>'.$message3.'</p>
                                          <br/><br/>
                                        <b> Request 5: '.$title4.' </b>
                                          <p>'.$message4.'</p>
                                          <br/><br/>  
                                      
                                      </td>
                                    </tr>
                          
                                    <tr>
                                      <td colspan="2" style="background:#1C75BC">
                                        <center>
                                          <p style="color:#fff; float:left; padding-left:10px;">Copyright openbook inc. &copy; 2014<p>
                                          <p style="color:#fff; float:right; padding-right:10px;">openbook.net</p>
                                        </center>
                                      </td> 
                                    </tr>
                          
                                  </table>
                          
                                  </center>
                              </body>
                      </html>';




      // =================================================================================================================== 
      $headers = "From: ".$email."\r\nReply-To: ".$email;
       
      // boundary 
  $semi_rand = md5(time()); 
  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
       
      // headers for attachment 
      $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
       
     // multipart boundary 
  $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
  $message .= "--{$mime_boundary}\n";
       
      // preparing attachments
      for($x=0;$x<count($files);$x++){
        $file = fopen($files[$x],"rb");
        $data = fread($file,filesize($files[$x]));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";
      }
       
      // send
      $ok = @mail($to, $subject, $message, $headers); 
      if ($ok) { 
        header("Location: confirmation.php");
      } else { 
        echo "<p>mail could not be sent!</p>"; 
      }

      
?>