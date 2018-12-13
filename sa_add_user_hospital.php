<?php 
	session_start();
  	if (!isset($_SESSION['email'])) {
  
  	header('location: login.php');
	} 
	elseif (isset($_SESSION['email']) && trim($_SESSION['type'])!="sadmin") 
	{
  
  	header('location: logout.php');
	} 

    $fname='';
    $lname='';
	$mobile='';
    $email='';
    $password='';
	$hospital_id='';
    $error=0;
	$errmsg=array();


    include 'server_connection.php';


    if(isset($_POST['adduser'])){
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$phone=$_POST['mobile'];
				$email=$_POST['email'];
				$username=$_POST['username'];
				$password1=$_POST['pass1'];
				$password2=$_POST['pass2'];
				$hospital_id=$_POST['hospital_id'];
	

        if(empty($fname)){
           array_push($errmsg,"* First name is required");
            $error++;
				}
				if(empty($lname)){
					array_push($errmsg,"* Last name is required");
					$error++;
			}
        if(empty($username)){
            array_push($errmsg,"* UserName is required");
            $error++;
        }
		if(empty($hospital_id)){
            array_push($errmsg,"* Hospital id is required");
            $error++;
        }
		//email syntax check
		if($email){
			$v = "/[a-zA-z0-9.-]+\@[a-zA-z0-9.-]+.[a-zA-Z]+/";
			if(!(preg_match($v, $email))){
				array_push($errmsg, "* not a valid e mail address");
            	$error++;
			}
		
			
		}
		 if(empty($email)){
            array_push($errmsg,"* email is required");
            $error++;
        }
		if($phone){
			$v = "/[0-9]+/";
			if(!(preg_match($v, $phone))){
				array_push($errmsg, "* not a valid phone number");
            	$error++;
			}
			
		}
		// duplicate email check
		$query="SELECT * FROM `user_table` WHERE `email`='$email'";
        $result1=mysqli_query($db,$query);
         
        if (mysqli_num_rows($result1) == 1) {
           array_push($errmsg,"Email ID already Used");
			$error++;
          }
		
		// duplicate use name check
		$query="SELECT * FROM `user_table` WHERE `user_name`='$username'";
        $result1=mysqli_query($db,$query);
         
        if (mysqli_num_rows($result1) == 1) {
           array_push($errmsg,"User Name already Used");
			$error++;
          }

        if(empty($password1)){
            array_push($errmsg,"* password is required");
            $error++;
        }

        if($password1 != $password2){
            array_push($errmsg,"* password didn\'t match");
            $error++;
        }

        if($error==0){
            $sql="INSERT INTO `user_table`(`firstname`, `lastname`, `email`, `phone`,`user_name`, `password`, `hospital_id`) 
                    VALUES ('$fname','$lname','$email','$phone','$username','$password1','$hospital_id')";
        mysqli_query($db,$sql);
        array_push($errmsg,"User Added Successfully!!!!");

            }
    }

	function hospitalid(){
		
			echo $_GET['id'];
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
			<div class="col-md-10" style="background-color: darkcyan">
				
				
			<div id="content" > 
			
			<div class="container" style="padding-top: 20px">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
						<form method="POST" action="sa_add_user_hospital.php">
						  <div class="panel panel-success">

							<div class="panel-body">
								
							  <div class="form-group">
								<label> Hospital ID</label>
								<input type="select" name="hospital_id" value="<?php echo hospitalid() ;?>" class="form-control" readonly>
							  </div>
							  <div class="form-group">
								<label>First Name</label>
								<input type="text" name="fname" class="form-control">
							  </div>
							  <div class="form-group">
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control">
							  </div>
							  <div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control"  placeholder="example@example.com">
							  </div>
							   <div class="form-group">
								<label>Mobile</label>
								<input type="text" name="mobile" class="form-control"  placeholder="01234567891">
							  </div>
								
								<div class="form-group">
								<label>User Name</label>
								<input type="text" name="username" class="form-control">
							  </div>

							   <div class="form-group">
								<label>Password</label>
								<input type="password" name="pass1" class="form-control">
							  </div>
							  <div class="form-group">
								<label>Retype Password</label>
								<input type="password" name="pass2" class="form-control">
							  </div>
								
							  
							  <div class="form-group">
								<input type="submit" name="adduser" class="form-control btn btn-success" value="Assagin User">
							  </div>

							</div>
						  </div>
						</form>
					  </div>
					  <div class="col-md-4"> <?php if(count($errmsg)>0)print_r($errmsg)?></div>
					</div>
				</div>
		
				
				
				
				
				
				
				
				
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
