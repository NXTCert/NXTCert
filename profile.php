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
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/e1ac01e7ff.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
     <link rel="stylesheet" href="profile.css">
	 <link rel="stylesheet" href="certificates.css">
   

    <style>
         #profileTab{
             color: white;
         }
     </style>
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
         
       

        <details>
            <summary>Recommended Certifications</summary>
        <?php 
        $userId = $_SESSION['UserData']['UserId'];
	    function isFav(&$certId, $db) {
		
		$userId = $_SESSION['UserData']['UserId'];
		// echo $cert;
		$query = "SELECT * FROM favorites WHERE userID = '".$userId."' AND  certId = ".$certId."";
		
		$favcerts= $db->query($query);

		if ($favcerts->num_rows > 0){  
			echo '<i class="fas fa-heart heartIcon"></i>'; 
		
		}else{
			echo '<i class="far fa-heart heartIcon"></i>'; 
		}
	}

	function isMyCert(&$certId, $db) {
		$userId = $_SESSION['UserData']['UserId'];
		// echo $userId;
		// echo $cert;
		$query = "SELECT * FROM certsInProgress WHERE userID = '".$userId."' AND  certId = ".$certId."";
		$mycerts= $db->query($query);

		if ($mycerts->num_rows > 0){   
		echo '<i class="fas fa-check"></i>';
		}else{
		echo '<i class="fas fa-plus"></i>';

		}
	}


		
	?>

	<?php
	
	$sql = "SELECT * FROM userIndustries WHERE UserID = '".$userId."'";
	$result = $db->query($sql);

	if ($result->num_rows > 0) {


				$budgetQuery = "SELECT budgetId from userBudgets where userid = '".$userId."'";
				$budget = $db->query($budgetQuery);
				while($row = $budget->fetch_assoc()) {
					$userBudget = $row["budgetId"];             
				 }



				$sql = "SELECT experienceId from userExperience where userid = '".$userId."'";
				$experience = $db->query($sql);
				while($row = $experience->fetch_assoc()) {
					$userExperience = $row["experienceId"]; 
					           
				 }


				$userIndustryArray = array();
				$sql = "SELECT industryid FROM userIndustries WHERE UserID = '".$userId."'";
				$industries = $db->query($sql);
				while($row = $industries->fetch_assoc()) {
					$userind = $row["industryid"]; 
					array_push($userIndustryArray,$userind);           
				 }
				// print_r($userIndustryArray);
				$implodedArrary = implode($userIndustryArray, ',');


				$sql = "SELECT * FROM certs WHERE experienceid = '".$userExperience."' AND budgetid <= '".$userBudget."' AND industryid in (".$implodedArrary.")";
				$certs = $db->query($sql);
				$rowcount = mysqli_num_rows($certs);
				// printf("Result set has %d rows.\n",$rowcount);
				
				if ($rowcount > 0){
					while($row = $certs->fetch_assoc()) {
						$title = $row["title"];
						$description = $row["description"];
						$cost = $row["cost"];
						$url = $row["url"];
						$id = $row["certId"];
			 
						?>
	
						<div class="certs" id="rec<?php echo $id; ?>">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><?php isFav($id, $db); ?></a>
							<a href="add.php?id=<?php echo $id; ?>" class="plusIcon"><?php isMyCert($id, $db); ?></a>
	
						</div>
	
						<?php
					 }
				} else{
					echo "No certifications matching your criteria at this time.";
				}

				


			} else {
             
	?>
		<button id="quizButton"> <a href='newQuiz11-15.php'>Take the Quiz</a></button>
	<?php 
		}
	?>
        </details>
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
							<a href="add.php?id=<?php echo $id; ?>" class="plusIcon"><?php isMyCert($id, $db); ?></a>
	
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
            <summary>Edit Profile</summary>
            <form action="editProfile.php" method="post">
                    <label for="username"><b>Name</b></label>
                    <input type="text" placeholder="Enter New Name" name="username" maxlength="30">

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter New Email" name="email" >
                    <p class="errorMsg">
                    <?PHP
                        if( isset($_SESSION['Error']) )
                        {
                                echo $_SESSION['Error'];
                        
                                unset($_SESSION['Error']);
                        
                        }
                    ?>
                </p>
                    <button type="submit" class="btn btn-primary">Save</button>
       
            </form>
            <br>
            <form action="changepasswords.php" method="post">
                <input type="submit" id="changePW" name="changePW" class="btn btn-primary" value="Change Password">
            </form>
        </details>
     </div>

    <!-- keep at bottom -->
    <script>
        $(function(){
        $("#nav-placeholder").load("navbar.php");
        $("#profileTab").css("color", "white");
        });
    </script>

 </body>
</html>
