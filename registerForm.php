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
 
    <link rel="stylesheet" type="text/css" href="main.css">

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
                <a href='/loginForm.php'><button id="loginBtn" class="myButton">Login</button></a>
                    <button id="registerBtn" class="activeTab">Register</button>
                
                </div>
            </div>
            <hr>
            <!-- <div id="loginFormContainer">
                <form action="login.php" method="post">
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
            </div> -->
            <div id="registerFormContainer">
                <form action="login.php" method="post">

                <p class="errorMsg" id="error1">
                    <?PHP
                        if( isset($_SESSION['Error']) )
                        {
                                echo $_SESSION['Error'];
                        
                                unset($_SESSION['Error']);
                        
                        }
                    ?>
                </p>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="" name="username" class="form-control" maxlength="30" placeholder="Username" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" id="regEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" onchange='PassCheck();' class="form-control" placeholder="Password" id="regpwd" minlength="8" required>
                        <p class = "errorMsg" id="error2"></p>
                    </div>
                    <div class="form-group">
                        <label for="confirmpwd">Confirm Password:</label>
                        <input type="password" onchange='PassCheck();' name= password class="form-control" placeholder="Confirm Password" id="confirmpwd" required>
                        
                    </div>
                        <p class="errorMsg" id="error3"> </p>
                        <button type="submit"  id= "register" name="register" class="btn btn-primary">Register</button>


                </form>
            </div>
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

                $("#regpwd").keyup(function(){
                    if ($('#regpwd').val() == $('#confirmpwd').val() & $('#confirmpwd').val() != '') {
                       
		                $('#confirmpwd').css('border-color', 'green');
                       
           
		            } else 
		                $('#confirmpwd').css('border-color', 'red');
                      
                        
                    });

            });


            function PassCheck() {
            var password = document.getElementById('regpwd');
            var vpassword = document.getElementById('confirmpwd');
            var error = document.getElementById('error3');

            if (password.value != vpassword.value) {
                document.getElementById("register").disabled = true;
                error.innerHTML = "Passwords do not match.";
            }
            else {
                document.getElementById("register").disabled = false;
                error.innerHTML = "";
            }
            }


        </script>



    <!-- keep at bottom -->
    <script>
        $(function(){
        $("#nav-placeholder").load("navbar.php");
        });
    </script>

 </body>
</html>