<?php
session_start();
require_once 'db_config.php'; 

if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}else{
    $userId = $_SESSION['UserData']['UserId'];
    $certId = $_GET['id'];
    $Username = isset($_POST['username']) ? $_POST['username'] : '';

    $sql = "SELECT * FROM certsInProgress WHERE userID = '".$userId."' AND  certId = ".$certId."";
    $result = $db->query($sql);

    if ($result->num_rows > 0){        
        $removeFavorite = "DELETE FROM certsInProgress WHERE UserID = '".$userId."' AND  certId = ".$certId."";
        $delete = $db->query($removeFavorite);
       
    }else{
       
        $addFavorite = "INSERT INTO certsInProgress (userID, certId) VALUES ('".$userId."','".$certId."');";
        $insert = $db->query($addFavorite);
       
    }

    header('location:profile.php');
}

?>