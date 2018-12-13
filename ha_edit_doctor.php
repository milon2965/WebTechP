<?php 
	session_start();
  	if (!isset($_SESSION['email'])) {
  
  	header('location: login.php');
  }  
	elseif (isset($_SESSION['email']) && trim($_SESSION['type'])!='hadmin') {
  
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
			<div class="col-md-12" style="background-color: aqua;height: 40px">logo plus Header + Patient CMS  </div>
		
		</div>
	
		<div class="row">
			<div id="menu-bar "class="col-md-2" style="background-color:blanchedalmond">
				<a href="admin_cms.php">Dashboard</a></br>
				<a href="ha_add_doctor.php"> Add Doctor</a></br>
				<a href="ha_remove_doctor.php"> Remove Doctor</a></br>
				<a href="ha_edit_doctor.php"> Edit Doctor Time</a></br>
				<a href="ha_send_email.php"> Send email to patient</a></br>
				<a href="ha_list_patient.php">List Patient by Doctor</a></br>
				<a href="logout.php"> Logout</a></br>
	
				
			</div>
			<div class="col-md-10" style="background-color: darkcyan">edit doctor
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
