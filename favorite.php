<?php
session_start();
require_once 'db_config.php'; 

if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}else{
    $userId = $_SESSION['UserData']['UserId'];
    $certId = $_GET['id'];

    $sql = "SELECT * FROM favorites WHERE userID = '".$userId."' AND  certId = ".$certId."";
    $result = $db->query($sql);

    if ($result->num_rows > 0){        
        $removeFavorite = "DELETE FROM favorites WHERE UserID = '".$userId."' AND  certId = ".$certId."";
        $delete = $db->query($removeFavorite);
        echo "deleted favorite";
    }else{
        echo "not found in database so adding favorite";
        $addFavorite = "INSERT INTO favorites (userID, certId) VALUES ('".$userId."','".$certId."');";
        $insert = $db->query($addFavorite);
        echo "inserted favorite";
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
    // header('location:certificates.php');
}

?>

<!-- $result = mysql_query("SELECT count(w_p_id) cnt FROM wishlist WHERE w_m_id = '$addmemberid' AND w_p_id = '$addproductid'") or die(mysql_error());
    $countid = mysql_fetch_assoc($result);
    if($countid['cnt'] == 1){
        mysql_query("DELETE FROM wishlist WHERE w_p_id = '$addproductid' AND w_m_id = '$addmemberid'") or die(mysql_error()); // If product has already added to wishlist then remove from Database
    } else {
        mysql_query("INSERT INTO wishlist SET w_p_id = '$addproductid', w_m_id = '$addmemberid'") or die(mysql_error()); // If product has not in wishlist then add to Database
    } -->
    <!-- SELECT * FROM favorites WHERE userID = 'test@test.com' AND  certId = 8; -->