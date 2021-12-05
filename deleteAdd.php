<?php
session_start();
require_once 'db_config.php'; 

if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}else{
    $userId = $_SESSION['UserData']['UserId'];
    $certId = $_GET['id'];

      
    $removeCert = "DELETE FROM certsInProgress WHERE UserID = '".$userId."' AND  certId = ".$certId."";
    $delete = $db->query($removeCert);
    echo "deleted favorite";


    header('location:profile.php');
}

?>