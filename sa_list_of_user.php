<?php 
	session_start();
  	if (!isset($_SESSION['email'])) {
  
  	header('location: login.php');
	} 
	elseif (isset($_SESSION['email']) && trim($_SESSION['type'])!="sadmin") 
	{
  
  	header('location: logout.php');
	} 
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin CMS</title>
</head>

<body>
	
	
	<div class="container-fluid">
		
		<div class="row">
			<div id="header"><img style=" width="100%" alt="body img" border: 2px black dotted" src="resource/5.png" alt="header_image;" ></div>
		
		</div>
	
		<div class="row">
			<div id="menu-bar "class="col-md-2" style="background-color:blanchedalmond">
				<a href="admin_cms_super.php"> Dash Board</a></br>
				<a href="sa_list_of_hospital.php"> List Of Hospital</a></br>
				<a href="sa_list_of_user.php"> List of User</a></br>
				<a href="sa_add_hospital.php"> Add New Hospital</a></br>
				<a href="sa_add_user_hospital.php"> Assagin User To Hospital</a></br>
				<a href="sa_remove hospital.php">Remove A hospital </a></br>
				<a href="sa_edit_hospital.php"> Edit A Hospital</a></br>
				<a href="logout.php"> Logout</a></br>
	
				
			</div>
			<div class="col-md-10" style="background-color: darkcyan">list user
			</div>		
		</div>
	</div>
	<div class="container">
		<div class="col-md-8 offset-4">
			
			<footer>&copy; Copyright 2018 <a href="#">Faisal,Milon,Shatu &amp; Kaiyum</a></footer>

		</div>
		
	</div>
	
	
	
	
</body>
</html>
