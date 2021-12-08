<?php
session_start();
require_once 'db_config.php'; 

 /* Starts the session */
if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}
$userId = $_SESSION['UserData']['UserId'];

$name = $_POST['username'];
$email = $_POST['email'];


if (!empty($name)) {

    $sql = "UPDATE users SET username = '".$name."' WHERE userId= '".$userId."'";
    $result = $db->query($sql);
}

if (!empty($email)) {


    $sql = "SELECT UserId FROM users WHERE UserID = '".$email."'";
    $result = $db->query($sql);


    if ($result->num_rows > 0){
        $_SESSION['Error'] = "This email is already in use";
        header("location:profile.php");
      
        exit;

    } else {

        $sql = "SET foreign_key_checks = 0;";
        $sql .= "UPDATE users SET userId='".$email."' WHERE userId='".$userId."';";
        $sql .= "UPDATE favorites SET userId='".$email."' WHERE userId='".$userId."';";
        $sql .= "UPDATE certsInProgress SET userId='".$email."' WHERE userId='".$userId."';";
        $sql .= "UPDATE userBudgets SET userId='".$email."' WHERE userId='".$userId."';";
        $sql .= "UPDATE userExperience SET userId='".$email."' WHERE userId='".$userId."';";
        $sql .= "UPDATE userIndustries  SET userId='".$email."' WHERE userId='".$userId."';";
        $sql .= "SET foreign_key_checks = 1;";
 
        $db -> multi_query($sql);
        $_SESSION['UserData']['UserId']=$email;

    }
}

// if (isset($email)) {
//     $sql = "UPDATE users SET userId = '".$email."' WHERE userId= '".$userId."'";
//     $result = $db->query($sql);
// }

header('location: profile.php');

?>