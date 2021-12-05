<?php
session_start();
require_once 'db_config.php'; 

if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}else{
    $userId = $_SESSION['UserData']['UserId'];
    $certId = $_GET['id'];

      
    $removeFavorite = "DELETE FROM favorites WHERE UserID = '".$userId."' AND  certId = ".$certId."";
    $delete = $db->query($removeFavorite);
    echo "deleted favorite";


    header('location:profile.php');
}

?>