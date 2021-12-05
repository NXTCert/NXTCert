<?php 
session_start();

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="/images/logo.png" class="logoImg" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.html">Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/certificates.php">Certificates</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/careers.html">Careers</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="/about.html">About</a>
                </li>
            </ul>

        <ul class="nav navbar-nav navbar-right">
            <?php 
                if(!isset($_SESSION['UserData']['UserId'])){
            ?>
                <li class="nav-item navbar-right">
                    <a class="nav-link" href="/loginForm.php">Login</a>
                </li>
            <?php
                }
                else{
            ?>
                <li class="nav-item navbar-right">
                    <a class="nav-link" href="/profile.php">Profile</a>
                </li>
            <?php 
                }
            ?>
        </ul>
        </div>
    
    </div>
</nav>
<script>
    //working on words being dynamic
    // Get the container element
    var btnContainer = document.getElementById("navbarSupportedContent");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("btn");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");

        // If there's no active class
        if (current.length > 0) {
        current[0].className = current[0].className.replace(" active", "");
        }

        // Add the active class to the current/clicked button
        this.className += " active";
    });
    }
</script>