
<?php 
session_start();



?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8" name="viewport" content="width=device-width">
    <title>Login</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
     <link rel="stylesheet" href="main.css">

     <style>
         #loginTab{
             color: white;
         }
     </style>

 </head>
 <body>
     <!-- keep at top -->
    <div id="nav-placeholder">

    </div>
        

        
        <div class= "formsContainer ">
            <div>
                <div class="tabsContainer">
                    <button id="loginBtn" class="activeTab">Login</button>
                    <a href='/registerForm.php'><button id="registerBtn" class="myButton">Register</button></a>
                
                </div>
            </div>
            <hr>
            <div id="loginFormContainer">
                <form action="login.php" method="post">
                <p id="errorMsg">
                    <?PHP
                        if( isset($_SESSION['Error']) )
                        {
                                echo $_SESSION['Error'];
                        
                                unset($_SESSION['Error']);
                        
                        }
                    ?>
                </p>
                    <div class="form-group">
                    <label for="email" >Email address:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" required>
                    </div>
                    <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd"required>
                    </div>

                    <button type="submit" name= "submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- <div id="registerFormContainer">
                <form action="">
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="" class="form-control" placeholder="Username" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" placeholder="Email" id="regEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" id="regpwd" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmpwd">Confirm Password:</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" id="confirmpwd" required>
                    </div>
                        <button type="submit" name="register" class="btn btn-primary">Register</button>

                        
                </form>
            </div> -->
        </div>
        
        <script>
            // function displayLogin() {
            //   var login = document.getElementById("loginFormContainer");
            //   var register = document.getElementById("registerFormContainer");
            //   var loginBtn = document.getElementById("loginBtn");
            //   var registerBtn = document.getElementById("registerBtn");



            //   login.style.display = "block";
            //   register.style.display = "none";

            //   loginBtn.classList.add('activeTab');
            //   registerBtn.classList.remove('activeTab');


              
            // }

            // function displayRegister() {
            //     var login = document.getElementById("loginFormContainer");
            //     var register = document.getElementById("registerFormContainer");
            //     var loginBtn = document.getElementById("loginBtn")
            //     var registerBtn = document.getElementById("registerBtn")

            //     login.style.display = "none";
            //     register.style.display = "block";

            //     loginBtn.classList.remove('activeTab');
            //     registerBtn.classList.add('activeTab');
    
            // }

            $(document).ready(function(){
                $("#confirmpwd").keyup(function(){
                    if ($('#regpwd').val() == $('#confirmpwd').val() & $('#confirmpwd').val() != '') {
		                $('#confirmpwd').css('border-color', 'green');
		            } else 
		                $('#confirmpwd').css('border-color', 'red');
                    });
                $("#confirmpwd").keydown(function(){

                    $("#confirmpwd").css("background-color", "white");
                });
            });
        </script>



    <!-- keep at bottom -->
    <script>
        $(function(){
        $("#nav-placeholder").load("navbar.php");
        });
    </script>

 </body>
</html>