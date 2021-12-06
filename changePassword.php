<?php
    session_start();
    require_once 'db_config.php';

    if(isset($_POST['update'])){
        //get POST data
        $old = $_POST['old'];
        $new = $_POST['new'];
        $retype = $_POST['retype'];
        
        $user = $_SESSION['UserData']['UserId'];
        $error = $_SESSION['error'];
        
        //create a session for the data incase error occurs
        $_SESSION['old'] = $old;
        $_SESSION['new'] = $new;
        $_SESSION['retype'] = $retype;

        //get user details
        $sql = "SELECT * FROM users WHERE userId = '".$user."'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();

        //check if old password is correct
        if(password_verify($old, $row['UserPassword'])){
            //check if new password match retype
            if($new == $retype){
                //hash our password
                $password = password_hash($new, PASSWORD_DEFAULT);

                //update the new password
                $sql = "UPDATE users SET password = '$password' WHERE id = '".$user."'";
                if($db->result($sql)){
                    $_SESSION['success'] = "Password updated successfully";
                    //unset our session since no error occured
                    unset($_SESSION['old']);
                    unset($_SESSION['new']);
                    unset($_SESSION['retype']);
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