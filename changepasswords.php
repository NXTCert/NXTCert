<?php
session_start();
require_once 'db_config.php';
if(isset($_POST['Submit']))
{

    $oldpass=md5($_POST['oldPassword']);
    $UserId=$_SESSION['UserData']['UserId'];
    $newpassword=md5($_POST['newPassword']);
    $sql = "SELECT UserPassword FROM users WHERE UserId = '".$UserId."' AND  UserPassword = '".$oldpass."'";
    $results = $db->query($sql);
    $num=mysqli_fetch_array($results);
    if($num>0)
    {
        $sql = "UPDATE users SET UserPassword = '".$newpassword."' WHERE UserId='".$UserId."' ";
        $password = $db->query($sql);
        $_SESSION['Error']="Password Changed Successfully";
        
    }
    else
    {
        $_SESSION['Error']="Old Password is Incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Change Password</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="changepasswords.css">
        <link rel="stylesheet" href="main.css">
    </head>

    <body>
        <div class="formsContainer">

            <div class="changePasswordContainer">
                <h1>Change your Password</h1>
                <form name="changePassword" action="" method="post" onSubmit="return valid();">
                <p id="message">
                    <?PHP
                        if( isset($_SESSION['Error']) )
                        {
                                echo $_SESSION['Error'];

                                unset($_SESSION['Error']);

                        }
                    ?>

                </p>
                    <div class="form-group">
                        <label for="oldPassword">Old Password:</label>
                        <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Enter your current Password" required>
                        <label for="newPassword">New Password:</label>
                        <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Enter your new Password" required>
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" name="confirmPassword"class="form-control" id="confirmPassword" placeholder="Retype your new Password" required>
                        <br>
                        <input type="submit" name="Submit" class="btn btn-primary" value="Change Password" />
                        <br>
                        <br>
                        <a href="profile.php">Back to Profile Page</a>
                    </div>
                </form>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <script type="text/javascript">
            function valid(){
                if(document.changePassword.oldPassword.value==""){
                    window.confirm("Please enter you current password.");
                    document.changePassword.oldPassword.focus();
                    return false;
                }
                else if(document.changePassword.newPassword.value=="")
                {
                    window.confirm("Please enter a new password.");
                    document.changePassword.newPassword.focus();
                    return false;
                }
                else if(document.changePassword.confirmPassword.value=="")
                {
                    window.confirm("Please confirm your new password");
                    document.changePassword.confirmPassword.focus();
                    return false;
                }
                else if(document.changePassword.newPassword.value!= document.changePassword.confirmPassword.value)
                {
                    window.confirm("New passwords do not match");
                    document.changePassword.confirmPassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>
