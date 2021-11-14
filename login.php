<?php
 if(isset($_POST['submit'])
  {
   $email= ($_POST['email']);
   $password = ($_POST['password']);
    if(empty($username))
    {
     echo "Empty or invalid email address";
    }
     if(empty($password)){
     echo "Enter your password"; 
      }
      $con = new MongoClient();
     // Select Database
     if($con)
      {
      $db = $con->nxtcert;
      // Select Collection
    $collection = $db->users;
     $qry = array("username" => $username,"password" => md5($password));
      $result = $collection->findOne($qry);
    if($result){
     echo "You are successully loggedIn";
       }
    else
     { echo "unsuccessful";
     }

      } else { 
      die("Mongo DB not connected");
      } 
        }
      ?>