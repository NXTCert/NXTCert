<?php
session_start();
require_once 'db_config.php'; 

if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}else{
    $userId = $_SESSION['UserData']['UserId'];
    $certId = $_GET['id'];
    $progress = isset($_POST['progress']) ? $_POST['progress'] : '';

    echo $userId;
    echo $certId;
    echo $progress;


    $sql = "UPDATE certsInProgress SET progress=".$progress." WHERE  certId = ".$certId." AND userId = '".$userId."'";
    echo $sql;
    $result = $db->query($sql);

    header('location:profile.php');
}

?>