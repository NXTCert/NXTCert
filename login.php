<?php 

// create table users
// (
// U_Id int(10) unsigned NOT NULL AUTO_INCREMENT,
// UserId varchar(255) DEFAULT NULL,
// UserPassword varchar(255) DEFAULT NULL,
// primary key(U_Id),
// UNIQUE KEY `UserId` (`UserId`)
// );
// INSERT INTO users(UserId, UserPassword) VALUES ('test@test', MD5('1234'));

session_start(); /* Starts the session */
require_once 'db_config.php'; 

/* Check Login form submitted */
if(isset($_POST['submit'])){
/* Define username and associated password array */
    // $logins = array('test@test' => '1234','user@user' => 'password');

    /* Check and assign submitted Username and Password to new variable */
    $Username = isset($_POST['email']) ? $_POST['email'] : '';
    $Password = isset($_POST['password']) ? $_POST['password'] : '';
    $sql = "SELECT UserId, UserPassword FROM users WHERE UserID = '".$Username."' AND  UserPassword = '".md5($Password)."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0){
        echo "logging in";
        header("location:profile.php");

        $_SESSION['UserData']['Username']=$Username;
        
        exit;
    } else {
        echo "invalid login";
        header('Refresh: 1; URL = login.html');
    }
}

$logins = array('test@test' => '1234','user@user' => 'password');

/* Check Login form submitted */
if(isset($_POST['submit'])){
    /* Define username and associated password array */
   
    
    /* Check and assign submitted Username and Password to new variable */
    $Username = isset($_POST['email']) ? $_POST['regemail'] : '';
    $Password = isset($_POST['password']) ? $_POST['regpassword'] : '';
    
    if (isset($logins[$Username]) && $logins[$Username] == $Password){
        $_SESSION['UserData']['Username']=$Username;
        header("location:profile.php");
        exit;
    } else {
        echo "invalid login";
        header('Refresh: 2; URL = login.html');
    }
    }


    if(isset($_POST['register'])){


        // $document = array( 
        //    "title" => "MongoDB", 
        //    "description" => "database", 
        //    "likes" => 100,
        //    "url" => "http://www.tutorialspoint.com/mongodb/",
        //    "by" => "tutorials point"
        // );
         
        // $collection->insert($document);
        // echo "Document inserted successfully";
        /* Define username and associated password array */
        
        
        /* Check and assign submitted Username and Password to new variable */
        $Username = isset($_POST['email']) ? $_POST['email'] : '';
        $Password = isset($_POST['password']) ? $_POST['password'] : '';
        
        
        if (array_push($logins, $Username, $Password)){
            $_SESSION['UserData']['Username']=$Username;
            header("location:profile.php");
            exit;
        } else {
            echo "error";
            header('Refresh: 2; URL = login.html');
        }
        }
?>
