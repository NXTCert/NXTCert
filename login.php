<?php 

session_start(); /* Starts the session */
require '/var/vendor/autoload.php';

try {
    $mongoDbClient = new MongoDB\Client('mongodb://localhost:27017');
} catch (Exception $error) {
    echo $error->getMessage();
    die(1);
}
// $client = new MongoDB\Client("mongodb://localhost:27017");
// $collection = $client->nxtcert->users;

echo "database selected";
//$m= new MongoDB\Client("mongodb://127.0.0.1/");
   // select a database

/* Check Login form submitted */
if(isset($_POST['submit'])){
/* Define username and associated password array */
    $logins = array('test@test' => '1234','user@user' => 'password');

    /* Check and assign submitted Username and Password to new variable */
    $Username = isset($_POST['email']) ? $_POST['email'] : '';
    $Password = isset($_POST['password']) ? $_POST['password'] : '';


    if (isset($logins[$Username]) && $logins[$Username] == $Password){
        echo "logging in";
        header("location:profile.php");

        $_SESSION['UserData']['Username']=$Username;
        
        exit;
    } else {
        echo "invalid login";
        header('Refresh: 2; URL = login.html');
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
