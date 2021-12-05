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
 function progress(&$certId, &$user, $progress, $db) {
    $userId = $_SESSION['UserData']['UserId'];
    // echo $userId;
    // echo $cert;
    $query = "SELECT progress FROM certsInProgress WHERE userID = '".$userId."' AND  certId = ".$certId." AND progress=".$progress."";

    $mycerts= $db->query($query);

    if ($mycerts->num_rows > 0){   
    echo "selected";
    } 
}




?>





 <!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Profile</title>

<!--    <link rel="stylesheet" href="main.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
     <link rel="stylesheet" href="profile.css">
     <link rel="stylesheet" href="certificates.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 </head>
 <body>
     <!-- keep at top -->
    <div id="nav-placeholder">

    </div>
     
     <div id="logout">
     <?php echo "Hi, ".$user; ?>
    <a href = "logout.php">Log Out</a>
     </div>
   
     <div class="container pic+name+email">
        <div class="avatar avatar-xl">
            <!-- <img src="images/blank-profile-picture-973460.svg" alt="Profile Picture" class="profile_pic avatar-img rounded-circle" /> -->
            <h4 class="username"><?php echo $user; ?></h4>

            
            <p class="email"><?php echo $userEmail; ?></p>
        </div>
         
        <details class="favorite">
            <summary>Favorites</summary>
        
            <?php 
            $sql = "SELECT certs.certId, favorites.userId, certs.title, certs.url, certs.description, certs.cost FROM certs INNER JOIN favorites ON favorites.certId=certs.certID WHERE favorites.userId = '".$userEmail."';";
				$certs = $db->query($sql);
				$rowcount = mysqli_num_rows($certs);
				// printf("Result set has %d rows.\n",$rowcount);
				
				if ($rowcount > 0){
					while($row = $certs->fetch_assoc()) {
						$title = $row["title"];
						$url = $row["url"];
						$id = $row["certId"];
                        $description = $row["description"];
						$cost = $row["cost"];
			 
						?>
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
                        <p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="delete.php?id=<?php echo $id; ?>"><i class="far fas fa-times heartIcon"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank" id="plusIcon"><i class="fas fa-plus"></i></a>
	
						</div>
	
						<?php
					 }
				} else{
					echo "No favorites yet.";
				}
                ?>
        </details>

        <details>
            <summary>Certifications In Progress</summary>
            <?php 
            $sql = "SELECT certs.certId, certsInProgress.userId, certs.title, certs.url, certs.description, certs.cost FROM certs INNER JOIN certsInProgress ON certsInProgress.certId=certs.certID WHERE certsInProgress.userId = '".$userEmail."';";
				$certs = $db->query($sql);
				$rowcount = mysqli_num_rows($certs);
				// printf("Result set has %d rows.\n",$rowcount);
				
				if ($rowcount > 0){
					while($row = $certs->fetch_assoc()) {
						$title = $row["title"];
						$url = $row["url"];
						$id = $row["certId"];
    
			 
						?>
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
                        <form action="progressUpdate.php?id=<?php echo $id; ?>" method="post">
                            <select name="progress" onchange="this.form.submit()">
                                <option value=0 <?php progress($id, $userEmail, 0, $db); ?> >Signed up</option>
                                <option value=1 <?php progress($id, $userEmail, 1, $db); ?> >Studying</option>
                                <option value=2 <?php progress($id, $userEmail, 2, $db); ?> >Take Exam</option>
                                <option value=3 <?php progress($id, $userEmail, 3, $db); ?> >Passed Exam</option>
                           </select>
                            </form>					
						    <a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="deleteAdd.php?id=<?php echo $id; ?>"><i class="far fas fa-times heartIcon"></i></a>
						</div>
	
						<?php
					 }
				} else{
					echo "No favorites yet.";
				}
                ?>
  
        </details>

        <details>
            <summary>Community</summary>
            <p>Coming soon...</p>
        </details>

        <details>
            <summary>Edit Profile</summary>
            <form action="editProfile.php" method="post">
                    <label for="uname"><b>Name</b></label>
                    <input type="text" placeholder="Enter New Name" name="username" >

                    <label for="psw"><b>Email</b></label>
                    <input type="password" placeholder="Enter New Email" name="email" >

                    <button type="submit">Save</button>
       
                </form>
        </details>
     </div>

    <!-- keep at bottom -->
    <script>
        $(function(){
        $("#nav-placeholder").load("navbar.php");
        });
    </script>

 </body>
</html>
