<?php 
session_start();
require_once 'db_config.php'; 

 /* Starts the session */
if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}
$userEmail = $_SESSION['UserData']['UserId'];

$sql = "SELECT * FROM users WHERE UserID = '".$userEmail."'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $user = $row["username"];             
    }
 } else {
    printf('No record found.<br />');
 }

?>





 <!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Profile</title>

<!--    <link rel="stylesheet" href="main.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="profile.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 </head>
 <body>
     <!-- keep at top -->
    <div id="nav-placeholder">

    </div>
     <br>
     <?php echo "Hi, ".$user; ?>
    
    <a href = "logout.php">Log Out</a>
     <div class="container pic+name+email">
        <div class="avatar avatar-xl">
            <img src="images/blank-profile-picture-973460.svg" alt="Profile Picture" class="profile_pic avatar-img rounded-circle" />
            <h4 class="username"><?php echo $user; ?></h4>

            
            <p class="email"><?php echo $userEmail; ?></p>
        </div>
         
        <details class="favorite">
            <summary>Favorites</summary>
            <p>These will be the favorites the user selects</p>
        </details>

        <details>
            <summary>Certifications In Progress</summary>
                <div class="stepper-wrapper">
                    <div class="stepper-item completed">
                        <div class="step-counter">1</div>
                        <div class="step-name">Sign Up</div>
                    </div>
                    <div class="stepper-item completed">
                        <div class="step-counter">2</div>
                        <div class="step-name">Study</div>
                    </div>
                    <div class="stepper-item active">
                        <div class="step-counter">3</div>
                        <div class="step-name">Take Exam</div>
                    </div>
                    <div class="stepper-item">
                        <div class="step-counter">4</div>
                        <div class="step-name">Pass Exam</div>
                    </div>
                </div>
        </details>

        <details>
            <summary>Community</summary>
            <p>User has yet to join a community</p>
        </details>

        <details>
            <summary>Edit Profile</summary>
            <p>Make changes to the profile as you see fit</p>
        </details>
     </div>

    <!-- keep at bottom -->
    <script>
        $(function(){
        $("#nav-placeholder").load("navbar.html");
        });
    </script>

 </body>
</html>
