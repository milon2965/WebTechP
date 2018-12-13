<?php
		session_start();
		unset($_SESSION['email']);
  		unset($_SESSION['position']);
       
		session_destroy();
        
		//$_SESSION['fullname'];
        header("location: login.php");
?>

