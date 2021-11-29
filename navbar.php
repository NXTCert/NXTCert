<?php 
session_start();

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/images/logo.png" class="logoImg" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/index.html">Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/certificates.php">Certificates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/careers.html">Careers</a>
                </li>
                <li class="nav-item">
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
