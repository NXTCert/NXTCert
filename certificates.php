<?php 
session_start();
require_once 'db_config.php'; 
$userId = $_SESSION['UserData']['UserId'];


?>


<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Certificates</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="certificates.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


	<script>
		// $(document).ready(function() {
		// 	$()
		// });



	</script>



 </head>
 <body>
     <!-- keep at top -->
    <div id="nav-placeholder">

    </div>
<!-- start of certs showing dynamiocally if the person is logged in - Chelsey --> 
    <p id="certTitle"> Your Recommended Certifications &nbsp;&nbsp;<i id="bars" class="fas fa-bars barsIcon"></i></p>

	<?php 
	function isFav(&$certId, $db) {
		$userId = $_SESSION['UserData']['UserId'];
		// echo $userId;
		// echo $cert;
		$query = "SELECT * FROM favorites WHERE userID = '".$userId."' AND  certId = ".$certId."";
	
		$favcerts= $db->query($query);

		if ($favcerts->num_rows > 0){   
		echo "fas fa-heart heartIcon";
		}else{
		echo "far fa-heart heartIcon";
		}
	}

	function isMyCert(&$certId, $db) {
		$userId = $_SESSION['UserData']['UserId'];
		// echo $userId;
		// echo $cert;
		$query = "SELECT * FROM certsInProgress WHERE userID = '".$userId."' AND  certId = ".$certId."";
	
		$mycerts= $db->query($query);

		if ($mycerts->num_rows > 0){   
		echo "fas fa-check plusIcon";
		}else{
		echo "fas fa-plus plusIcon";
		}
	}


		if(!isset($_SESSION['UserData']['UserId'])){
	?>
		<button id="quizButton"> <a href='loginForm.php'>Login to Take the Quiz</a></button>
	<?php
		}
		else{
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>
	
						<?php
					 }
				} else{
					echo "No certification matching your criteria, please browse certs by industry below.";
				}

				


			} else {
	?>
		<button id="quizButton"> <a href='newQuiz11-15.php'>Take the Quiz</a></button>
	<?php 
		}}
	?>



    
   
     <!-- <div class="certs">
         <p class="title">Certification Title</p>
         <p class="source">Certification Source | $0</p>
         <p class="description">Description: </p>
         <i class="fas fa-external-link-alt shareIcon"></i>
         <i class="far fa-heart heartIcon"></i>
     </div>
     <div class="category">
		 <br>
		  -->
<!-- START of listing the certs - Chelsey -->
 
		 <div class="fixBrowseBoarder">
<table class="browseCertsBox">
		<!--<th style="color: white; text-align: center;">Browse by Certification</th> -->
		<th colspan="3" class="moveTitleCenter">Browse Certifications by Category </th>
		  <tr>
			<td ><a id="top1" href ="#bottom1">AI Engineering</a></td>
			<td ><a id="top6" href ="#bottom6">Data Engineering</a></td>
			<td ><a id="top11" href ="#bottom11">DevOps</a></td>
		  </tr>
		  <tr>
			<td ><a id="top2"href ="#bottom2">Business</a></td>
			<td ><a id="top7" href ="#bottom7">Data Science</a></td>
			<td ><a id="top12" href ="#bottom12">Networking</a></td>
		  </tr>
		  <tr>
			<td ><a id="top3" href ="#bottom3">Cloud</a></td>
			<td ><a id="top8" href ="#bottom8">Data Solutions</a></td>
			<td ><a id="top13" href ="#bottom13">Programming</a></td>
		  </tr>
		  <tr>
			<td ><a id="top4" href ="#bottom4">Cyber Security</a></td>
			<td ><a id="top9" href ="#bottom9">Database</a></td>
			<td ><a id="top14" href ="#bottom14">Project Management</a></td>
		  </tr>
		  <tr>
			<td ><a id="top5" href ="#bottom5">Data Administration</a></td>
			<td ><a id="top10" href ="#bottom10">Development</a></td>
			<td ><a id="top15" href ="#bottom15">Tech Support</a></td>
		  </tr>

		</table> 
	 </div>
		<!-- fa fa-heart -->
		<!-- <i class="fas fa-plus"></i> -->
	 

		<!-- ------------ AI Engineering Certifications --------------- -->
	<p id="categoryTitle" ><a id="bottom1"><u>AI Engineering Certifications</u></a></p>
			 
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =1";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>









	<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>






	<!-- ------------ Business Certifications --------------- -->
	 <p id="categoryTitle"><a id="bottom2"><u>Business Certifications</u></a></p>
	 <?php
	$sql = "SELECT * FROM certs WHERE industryId =2";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>





	<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>




	<!-- ------------ Cloud --------------- -->
	<p id="categoryTitle" ><a id="bottom3"><u>Cloud Certifications</u></a></p>
		
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =3";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>


	<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<!-- ------------ Cyber --------------- -->	
	<p id="categoryTitle" ><a id="bottom4"><u>Cyber Security Certifications</u></a></p>
			
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =4";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>




	<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>



	<!-- ------------ Data Administration --------------- -->
	<p id="categoryTitle" ><a id="bottom5"><u>Data Administation Certifications</u></a></p>
		
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =6";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>


	 <p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<!-- ------------ Data Engineering --------------- -->
	<p id="categoryTitle" ><a id="bottom6"><u>Data Engineering Certifications</u></a></p>
			
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =7";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>



	<p class="goBackToMenu"><a href ="#browseancor">Back to the top</a></p>



	<!-- ------------ Data Science --------------- -->
	<p id="categoryTitle" ><a id="bottom7"><u>Data Science Certifications</u></a></p>
	
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =8";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>

	 <p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<!-- ------------ Data Solutions --------------- -->
	<p id="categoryTitle" ><a id="bottom8"><u>Data Solutions Certifications</u></a></p>
	
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =9";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>
		<!-- ------------ Database --------------- -->
	<p id="categoryTitle" ><a id="bottom9"><u>Database Certifications</u></a></p>
	
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =10";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>
		<!-- ------------ Development --------------- -->
	<p id="categoryTitle" ><a id="bottom10"><u>Development Certifications</u></a></p>
	
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =11";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>

<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>
		<!-- ------------ DevOps --------------- -->
	<p id="categoryTitle" ><a id="bottom11"><u>DevOps Certifications</u></a></p>
		
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =12";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom12"><u>Networking Certifications</u></a></p>
		
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =13";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom13"><u>Programming Certifications</u></a></p>

	<?php
	$sql = "SELECT * FROM certs WHERE industryId =14";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>
		
	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom14"><u>Project Management Certifications</u></a></p> 
	 
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =15";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>
		

	 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

	<p id="categoryTitle" ><a id="bottom15"><u>Tech Support Certifications</u></a></p>
	<?php
	$sql = "SELECT * FROM certs WHERE industryId =16";
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
	
						<div class="certs">
						<p class="title"><?php echo $title; ?></p>
						<p class="source">Cost: $<?php echo $cost; ?>  <br>
						<p class="description">Description: <?php echo $description; ?> </p>
						
						<a href="<?php echo $url; ?>" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
							<a href="favorite.php?id=<?php echo $id; ?>"><i class="<?php isFav($id,$db); ?>"></i></a>
							<a href="add.php?id=<?php echo $id; ?>" target="_blank"><i class="<?php isMyCert($id, $db); ?>"></i></a>
	
						</div>

						<?php
					 }
				} else{
					echo "No certifications";
				}
				?>

 				<p class="goBackToMenu"><a  href ="#browseancor">Back to the top</a></p>

    <!-- keep at bottom -->
    <script>
        $(function(){
        $("#nav-placeholder").load("navbar.php");
        });
    </script>

 </body>
</html>
<!-- Resources 
https://www.w3schools.com/html/tryit.asp?filename=tryhtml_table_intro

FORMAT FOR CERTS
	  <div class="certs">
				 <p class="title"></p>
				 <p class="source">Timeline: | Cost: $ <br>
				 <p class="description">Description: </p>
				 <a href="" target="_blank"><i class="fas fa-external-link-alt shareIcon"></i></a>
					 <i class="far fa-heart heartIcon"></i>
				 <a class="padLinks" href="" target="_blank">Study Material | </a>
				 <a href="" target="_blank">Exam</a>

			 </div>


i
CREATE TABLE certs (
    certId INT NOT NULL AUTO_INCREMENT,
	industry VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
	cost DECIMAL(10 , 2 ) NULL,
    costBreakdown VARCHAR(255) NULL,
	time INT NULL,
	url VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	notes VARCHAR(255) NULL,
	experience TINYINT,
    PRIMARY KEY (certId)
);

