<<<<<<< HEAD
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
    $UserId = isset($_POST['email']) ? $_POST['email'] : '';
    $UserId= filter_var($UserId, FILTER_SANITIZE_STRING);
    $Password = isset($_POST['password']) ? $_POST['password'] : '';
    $sql = "SELECT UserId, UserPassword FROM users WHERE UserID = '".$UserId."' AND  UserPassword = '".md5($Password)."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0){
        echo "logging in";
        

        $_SESSION['UserData']['UserId']=$UserId;
        // echo "session set";
        
        // $query = "SELECT * FROM users WHERE UserId='$UserId'";
        // $row =$db->query($query);
        // $username = $row['username'];
        
        // echo $username;
        // $_SESSION['UserData']['Username']=$username;

        header("location:profile.php");
        
        exit;
    } else {
        $_SESSION['Error'] = "Invalid username or password.";
        header('location:loginForm.php');
    }
}



if(isset($_POST['register'])){
    $UserId = isset($_POST['email']) ? $_POST['email'] : '';
    $UserId = filter_var($UserId, FILTER_SANITIZE_EMAIL);
    $Username = isset($_POST['username']) ? $_POST['username'] : '';
    $Username = filter_var($Username, FILTER_SANITIZE_STRING);
    $Password = isset($_POST['password']) ? $_POST['password'] : '';
    

    $sql = "SELECT UserId FROM users WHERE UserID = '".$UserId."'";
    $result = $db->query($sql);


    if ($result->num_rows > 0){
        echo $UserId;
        $_SESSION['Error'] = "This email is already in use";
        header("location:registerForm.php");
      
        exit;

    } else {
        $addUser = "INSERT INTO users (UserID, username, UserPassword) VALUES ('".$UserId."','".$Username."','".md5($Password)."');";
        $result = $db->query($addUser);
        echo "logging in";
        header("location:profile.php");
        $_SESSION['UserData']['UserId']=$UserId;
        exit;
        }
}

?>
=======
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
    $UserId = isset($_POST['email']) ? $_POST['email'] : '';
    $Password = isset($_POST['password']) ? $_POST['password'] : '';
    $sql = "SELECT UserId, UserPassword FROM users WHERE UserID = '".$UserId."' AND  UserPassword = '".md5($Password)."'";
    $result = $db->query($sql);
    if ($result->num_rows > 0){
        echo "logging in";
        

        $_SESSION['UserData']['UserId']=$UserId;
        // echo "session set";
        
        // $query = "SELECT * FROM users WHERE UserId='$UserId'";
        // $row =$db->query($query);
        // $username = $row['username'];
        
        // echo $username;
        // $_SESSION['UserData']['Username']=$username;

        header("location:profile.php");
        
        exit;
    } else {
        $_SESSION['Error'] = "Invalid username or password.";
        header('location:loginForm.php');
    }
}
 
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    // Get verify response data
    $secretKey  = "6LfcIY0dAAAAAF5jqJYQ8Qc6MaEtNLUCCqlsScjp";
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if($responseData->success){
        if(isset($_POST['register'])){
        $UserId = isset($_POST['email']) ? $_POST['email'] : '';
        $Username = isset($_POST['username']) ? $_POST['username'] : '';
        $Password = isset($_POST['password']) ? $_POST['password'] : '';

        $sql = "SELECT UserId FROM users WHERE UserID = '".$UserId."'";
        $result = $db->query($sql);


        if ($result->num_rows > 0){
            echo $UserId;
            $_SESSION['Error'] = "This email is already in use";
            header("Location: registerForm.php");

            exit;

        } else {
            $addUser = "INSERT INTO users (UserID, username, UserPassword) VALUES ('".$UserId."','".$Username."','".md5($Password)."');";
            $result = $db->query($addUser);
            echo "logging in";
            header("location:profile.php");
            $_SESSION['UserData']['UserId']=$UserId;
            exit;
            }
        }
    }
    else {
        echo 'captcha failed';
    }

}
 

?>
>>>>>>> 1c428cfabbf656d617be28e126949e871b41f91f
