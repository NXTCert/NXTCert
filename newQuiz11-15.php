<?php
session_start();
if(!isset($_SESSION['UserData']['UserId'])){
    header("location:loginForm.php");
    exit;
}
$userId = $_SESSION['UserData']['UserId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!--Nxt Cert title-->
<title>Nxt Cert</title>
<!--boostrap style sheet link-->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--css file link-->
<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="newQuiz.css">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	

</head>
<body>
	
    <div id="nav-placeholder">

    </div>
	
 <h1 style="text-align: center; padding-top: 20px; padding-bottom: 0px;">Why take the quiz?</h1>
	
	<div class="whyQuizDiv"> 
	
	<p>The purpose of the quiz is to match you with certifications. You will be asked questions about your experience, desired careers, and desired roles. After you submit the quiz our algorithm will match you with certifications that fit your preferences. You can view your custom certifications list in your profile after you complete your quiz. <br>
You can also add and keep track of your certifications by browsing our full list of certifications on the certifications page. </p>
	</div>
	 <div class="button-box">
			
			
		<button onclick="myFunction()" type="button" >Start the Quiz</button>	
			 
		

			</div>
<div class="container" id="myDIV">
   
	<!-- 1 FORM --> 
<form action="quizResults.php" method="post" class="mb-3">
	<p class="titleQuestion"><strong>Question 1</strong>: Describe your education and experience level</p>

      <label>
        <input type="radio" name="education" value=1>Current College Student
        <span class="select"></span>
      </label>
      <label>
        <input type="radio" name="education" value=1>Self taught with no industry experience
        <span class="select"></span>
      </label>
      <label>
        <input type="radio" name="education" value=2>Self taught with industry experience
        <span class="select"></span>
      </label>
      <label>
        <input type="radio" name="education" value=2>Recent college graduate with no experience
        <span class="select"></span>
		  
      </label>
	<label>
        <input type="radio" name="education" value=3>Professional with 5 - 10+ years of experience
        <span class="select"></span>
		  
      </label> 
	
<br>
	<!--question 2 --> 
	
	<p class="titleQuestion"><strong>Question 2</strong>: What type of certifications are you interested in?(Select all that apply)</p>

      <label>
        <input type="checkbox" name="certificationType[]" value=1>AI Engineering
        <span class="selectCheck"></span>
      </label>
      <label>
        <input type="checkbox" name="certificationType[]" value=2>Business
        <span class="selectCheck"></span>
      </label>
      <label>
        <input type="checkbox" name="certificationType[]" value=3>Cloud
        <span class="selectCheck"></span>
      </label>
      <label>
        <input type="checkbox" name="certificationType[]" value=4>Cyber Security
        <span class="selectCheck"></span>
		  
      </label>
	 <label>
        <input type="checkbox" name="certificationType[]" value=6>Data Administation
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="certificationType[]" value=7>Date Engineering
        <span class="selectCheck"></span>
		  
      </label> 
	<label>
        <input type="checkbox" name="certificationType[]" value=8>Data Science
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="certificationType[]" value=9>Data Solutions
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="certificationType[]" value=10>Database
        <span class="selectCheck"></span>
		  
      </label> 
	<label>
        <input type="checkbox" name="certificationType[]" value=11>Development
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="certificationType[]" value=12>DevOps
        <span class="selectCheck"></span>
		  
      </label>
      <label>
        <input type="checkbox" name="certificationType[]" value=13>Networking
        <span class="selectCheck"></span>
		  
      </label>
      <label>
        <input type="checkbox" name="certificationType[]" value=14>Programming
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="certificationType[]" value=15>Project Management
        <span class="selectCheck"></span>
		  
      </label> 
	<label>
        <input type="checkbox" name="certificationType[]" value=16>Tech Support
        <span class="selectCheck"></span>
		  
      </label>
	
	<br>
	
	
	<!--question 3 --> 
	
<p class="titleQuestion"><strong>Question 3</strong>: Which of these specific careers are you most interested in? (Select all that apply)</p>

      <label>
        <input type="checkbox" name="careers[]" value="Computer Network Architecture">Computer Network Architecture
        <span class="selectCheck"></span>
      </label>
      <label>
        <input type="checkbox" name="careers[]" value="Computer Systems Analyst">Computer Systems Analyst
        <span class="selectCheck"></span>
      </label>
      <label>
        <input type="checkbox" name="careers[]" value="Data Scientist">Data Scientist
        <span class="selectCheck"></span>
      </label>
      <label>
        <input type="checkbox" name="careers[]" value="Database Andministator">Database Andministator
        <span class="selectCheck"></span>
		  
      </label>
	 <label>
        <input type="checkbox" name="careers[]" value="Information Security Analyst">Information Security Analyst  
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="careers[]" value="IT Manager">IT Manager
        <span class="selectCheck"></span>
		  
      </label> 
	<label>
        <input type="checkbox" name="careers[]" value="Project Management">Product Manager
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="careers[]" value="Development">Software Engineer
        <span class="selectCheck"></span>
		  
      </label>
	<label>
        <input type="checkbox" name="careers[]" value="Tech Support">Tech Support / Support Specalist
        <span class="selectCheck"></span>
		  
      </label> 
	<br>
	
	
	<!--question 4 --> 
	
<p class="titleQuestion"><strong>Question 4</strong>: What is your budget for the certification?</p>

      <label>
        <input type="radio" name="budget" value=1>$0 - 299
        <span class="select"></span>
      </label>
      <label>
        <input type="radio" name="budget" value=2>$300 - 499
        <span class="select"></span>
      </label>
      <label>
        <input type="radio" name="budget" value=3>$500+
        <span class="select"></span>
      </label>
    
	<br>
	
	<!-- start of code needed for php --> 
	<!--
<p style="text-align: center;" class="titleQuestion"><strong>Optional</strong>: Enter your username to save your results to your profile?</p>	
	
	<br>
	<p> Username: <input type="text" name="name"></p><br>
	
	<br>
-->
<div class="holdSubmitRight">
      <input type="submit" name="submit" vlaue="Get Values"  id="goToNext1" >

	</div>
    </form>

	
    <?php
      if(isset($_POST['submit'])){
        if(!empty($_POST['checkbox'])) {
          echo '  ' . $_POST['checkbox'];
        } else {
          echo 'Please select the value.';
        }
      }
    ?>
	
	
	
	</div>
    
    <script>
		
		
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
    
  } else {
    x.style.display = "none";
  }
}
        $(function(){
          $("#nav-placeholder").load("navbar.php");
        });
		

        </script>
	

	
</body>
	
	
</html>


<!--Resources 

https://www.w3schools.com/howto/howto_js_toggle_hide_show.asp
PHP: https://www.w3schools.com/php/php_forms.asp
PHP: https://www.positronx.io/php-radio-buttons-tutorial/
https://jsfiddle.net/hibbard_eu/YB2KB/
https://www.w3schools.com/css/tryit.asp?filename=trycss_form_focus
-->
