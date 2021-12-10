<?php
    session_start();
    require_once 'db_config.php';

    if(isset($_POST['update'])){
        //get POST data
        $old = md5($_POST['old']);
        $new = md5($_POST['new']);
        $retype = md5($_POST['retype']);
        
        $user = $_SESSION['UserData']['UserId'];
        $error = $_SESSION['error'];

        //get user details
        $sql = "SELECT * FROM users WHERE userId = '".$user."'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();

        //check if old password is correct
        if(password_verify($old, $row['UserPassword'])){
            //check if new password match retype
            if($new == $retype){
                //hash our password
                $password = md5($new);

                //update the new password
                $sql = "UPDATE users SET UserPassword = '".$password."' WHERE userId = '".$user."'";
                if($db->query($sql)){
                    $_SESSION['success'] = "Password updated successfully";
                }
                else{
                    $error = $db->error;
                }
            }
            else{
                $error = "New and retype password did not match";
            }
        }
        else{
            $error = "Incorrect Old Password";
        }
    }
    else{
        $error = "Input needed data to update first";
    }
    
    header('location: profile.php');

?>