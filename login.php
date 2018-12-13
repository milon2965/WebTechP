
<?php
session_start();

	$error=0;
	$logerr=array();
	    //$db=mysqli_connect('localhost','root','','project_db');
	include 'server_connection.php';
	

	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		
		
		if(empty($email)){
				array_push($logerr, '*User Id is required');
				$error++;
			}

		if(empty($pass)){
				array_push($logerr, '*Password is required');
				$error++;
			}
		if($error==0){
			
			$query="SELECT * FROM `user_table` WHERE `email`= '$email' AND `password`='$pass' AND `position`='sadmin'";
			$result1=mysqli_query($db,$query);
			 if (mysqli_num_rows($result1) == 1) {
				 $_SESSION['email'] = $email;
				 $_SESSION['type']='sadmin';
				 
				 header ('Location:admin_cms_super.php');
				 // set SEssion id email
          }
			$query="SELECT * FROM `user_table` WHERE `user_name`= '$email' AND `password`='$pass' AND `position`='sadmin'";
			$result1=mysqli_query($db,$query);
			 if (mysqli_num_rows($result1) == 1) {
				 $_SESSION['email'] = $email;
				 $_SESSION['type']='sadmin';
				 
				 header ('Location:admin_cms_super.php');
				 // set SEssion id email
          }
			
			$query="SELECT * FROM `user_table` WHERE `email`= '$email' AND `password`='$pass' AND `position`='hadmin'";
			$result1=mysqli_query($db,$query);
			 if (mysqli_num_rows($result1) == 1) {
				  $_SESSION['email'] = $email;
				  $_SESSION['type']='hadmin';
				 
				 header ('Location:admin_cms.php');
				 // set SEssion id email
          }
			$query="SELECT * FROM `user_table` WHERE `user_name`= '$email' AND `password`='$pass' AND `position`='hadmin'";
			$result1=mysqli_query($db,$query);
			 if (mysqli_num_rows($result1) == 1) {
				  $_SESSION['email'] = $email;
				  $_SESSION['type']='hadmin';
				 
				 header ('Location:admin_cms.php');
				 // set SEssion id email
          }
			$query="SELECT * FROM `user_table` WHERE `email`= '$email' AND `password`='$pass' AND `position`='patient'";
			$result1=mysqli_query($db,$query);
			 if (mysqli_num_rows($result1) == 1) {
				  $_SESSION['email'] = $email;
				  $_SESSION['type']='patient';
				 
				 header ('Location:admin_cms_patient.php');
				 // set SEssion id email
          }
			
			$query="SELECT * FROM `user_table` WHERE `user_name`= '$email' AND `password`='$pass' AND `position`='patient'";
			$result1=mysqli_query($db,$query);
			 if (mysqli_num_rows($result1) == 1) {
				  $_SESSION['email'] = $email;
				  $_SESSION['type']='patient';
				 
				 header ('Location:admin_cms_patient.php');
				 // set SEssion id email
          }
			else{
				array_push($logerr, '*Email Or Password is Not Valid');
				$error++;
			}

		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="style/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index</title>
</head>

<body>
	
	<div id="main-parent" height="100%">
		<div id="header"><img style="border: 2px black dotted" src="resource/5.png" alt="header_image;" ></div>
		<div id="menubar" style="width: auto;height: 50px;border: 2px black dotted">
		
			<table border="2px" width="100%">
			<tr style="height: 50px">
				<td style="text-align: center"> <a href="index.php"> Home</a></td>
				<td style="text-align: center"> <a href="index.php"> About Us</a></td>
				<td style="text-align: center"> <a href="index.php"> Contact</a></td>
				<td style="text-align: center"> <a href="login.php"> Log in</a></td>
				<td style="text-align: center"><a href="signup.php"> Sign Up</a></td>
			</tr>
		</table>
		</div>
		<div id="content"  style="background: url(body.jpg); background-size: 100%;  background-repeat: no-repeat; height:800px " > 
			
			<div class="container" style="padding-top: 20px">
				<div class="row">
					 <div class="col-md-4"></div>
					  <div class="col-md-4 ">
						<form method="post" action="login.php">
						  <div class="panel panel-success">

							<div class="panel-body">
							  <div class="form-group">
								<label>User Name Or Email</label>
								<input type="text" name="email" class="form-control" placeholder="User Name Or Email">
							  </div>
							  <div class="form-group">
								<label>Password</label>
								<input type="password" name="pass" class="form-control">
							  </div>
							  <div class="form-group">
								<input type="submit" name="submit" class="form-control btn btn-success" value="Login">
							  </div>
							  <p>Forgot Password? <a href="#">Recover Password</a></p>

							</div>
						  </div>
						</form>
					  </div>					
					<div class="col-md-4"><?php if(count($logerr)>0)print_r($logerr)?></div>
				</div>
			</div>
		
		</div>
		
		<div id="footer"  style="border: 2px black dotted; height:50px; text-align: center">
			<footer>&copy; Copyright 2018 <a href="#">Faisal,Milon,Shatu &amp; Kaiyum</a></footer>

		</div>
	</div>
</body>
</html>
