<?php
   session_start();
   unset($_SESSION['UserData']['UserId']);
   unset($_SESSION['UserData']['Username']);
 
   echo 'logging out';
   header('Refresh: 1; URL = loginForm.php');
?>