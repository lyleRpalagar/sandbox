<?php  
    function compareEmail($email){
            $db = connectToGetTutor(); // Variable to connect to DB so that we can start a MYSQL query.
            
            // Compare the User's Data to the Database
            $sql = $db->query("SELECT * FROM users WHERE email = '".$email."' LIMIT 1 ");
           
           // Count the number of Rows from results you get from the Query.
            $rows = $sql->fetchAll();
            $num_rows = count($rows);
            // if Query table pulls out more than one row , results = false
            if($num_rows == 1){
              $result = false;
              return $result;
            }
            // if Query table pulls out no rows , results = true
            else{
                $result = true;
                return $result;
            }
     }
// This function can be used to Grab the Users Email  
    function getEmail($username, $password){
    	$db = connectToGetTutor(); // Variable to connect to DB so that we can start a MYSQL query.
        foreach($db->query('SELECT * FROM credentials WHERE username="'.$username.'" AND password="'.$password.'"') as $row){
              $email = $row['email'];
              return $email;
        }
    }

     function grabEmailFromURL($email){
        $db = connectToGetTutor(); // Variable to connect to DB so that we can start a MYSQL query. 
         // grab the data from the table row and put it into an array
        foreach($db->query("SELECT * FROM users WHERE email = '" .$email."'") as $row){
           $row;
              return $row;
        }
     }

    function loginUser($username, $password){
            $db = connectToGetTutor(); // Variable to connect to DB so that we can start a MYSQL query.
            
            // Compare the User's Data to the Database
            $sql = $db->query("SELECT * FROM credentials WHERE username='".$username."' AND password='".$password."' LIMIT 1; ");
           
           // Count the number of Rows from results you get from the Query.
            $rows = $sql->fetchAll();
            $num_rows = count($rows);
             // If Table only pulls  1 data row return  True
            if($num_rows == 1){
            	$result = true;
            	return $result;
            }
            // If Table does not pull out Any rows return False
            else{
            	$result = false;
            	return $result;
            }
    }

    function grabCredentialTable($email){
     // Grab the credentials table row for email update
      $db = connectToGetTutor();  // Variable to connect to DB so that we can start a MYSQL query. 
      foreach($db->query("SELECT * FROM credentials WHERE email = '" .$email."'") as $row){
           $login_id = $row['login_id'];
              return $login_id;
        }

    }


    function insertNewUser($first, $last, $phone, $email, $permission){
                   $db = connectToGetTutor(); // Variable to connect to DB so that we can start a MYSQL query.       
                   $sql = $db->query("INSERT INTO users(`user_id`
                                                     , `first`
                                                     , `last`
                                                     , `email`
                                                     , `phone`
                                                     , `permission`)
                                                VALUES(NULL
                                                   , '$first'
                                                   , '$last'
                                                   , '$email'
                                                   , '$phone'
                                                   , 'user'
                                                  )");
                  }

	function insertNewCred($username, $password, $email){
                      $db = connectToGetTutor(); // Variable to connect to DB so that we can start a MYSQL query.
                      $sql = $db->query("INSERT INTO credentials(`login_id`
                                                            , `username`
                                                            , `password`
                                                            , `email`)
                                                     VALUES(NULL
                                                          , '$username'
                                                          , '$password'
                                                          , '$email')");
                  }

function updateUserInfo($first, $last, $email, $phone, $user_id){
              $db = connectToGetTutor(); // Variable to connect to DB so that we can start a MYSQL query.
              $sql = $db->query("UPDATE users SET `first` = '$_POST[first]'
                                    , `last`  = '$_POST[last]'
                                    , `email` = '$_POST[email]'
                                    , `phone` = '$_POST[phone]' 
                                  WHERE user_id = $_POST[user_id]");
          }
  
function updateCredInfo($cred_id){
             $db = connectToGetTutor();  // Variable to connect to DB so that we can start a MYSQL query.
             $sql = $db->query("UPDATE credentials SET `email` = '$_POST[email]'
                                         WHERE login_id = $_POST[login_id]");  
          }

function getPage($action){
              $db = connectToGetTutor();
                foreach($db->query("SELECT * FROM ".$action) as $row);
                $row;
                return $row;
            }
    function comparePermission($email){
                $db = connectToGetTutor();
                foreach($db->query("SELECT * FROM users WHERE email = '".$email."'") as $row);
                  $row;
                  return $row;
             }
?>