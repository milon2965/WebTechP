<?php 
	session_start();
  	if (!isset($_SESSION['email'])) {
  
  	header('location: login.php');
	} 
	elseif (isset($_SESSION['email']) && trim($_SESSION['type'])!="sadmin") 
	{
  
  	header('location: logout.php');
	}

	$hospital_id_auto="";
	$book_id="";
	$error=0;
	$logerr=array();

	include 'server_connection.php';
   // auto generate hospital id

		$query="SELECT * FROM `hospital_table` WHERE `id`=(SELECT MAX(id) FROM `hospital_table`)";
        $result=mysqli_query($db,$query);
		$book_id=mysqli_fetch_array($result);
		$hospital_id_auto=$book_id['hospital_id']+1;



	if(isset($_POST['hospital_submit'])){
				$hid=$_POST['hid'];
				$hname=$_POST['hname'];
				$hphone=$_POST['hphone'];
				$haddress=$_POST['haddress'];

			if(empty($hname)){
			array_push($logerr, '*Hospital Name is required');
			$error++;
			}
			if(empty($hphone)){
				array_push($logerr, '*Hospital Phone is required');
				$error++;
			}
			if(empty($haddress)){
				array_push($logerr, '*Hospital address is required');
				$error++;
			}

			if($error==0){

				$sql="INSERT INTO `hospital_table`(`hospital_id`, `hospital_name`, `hospital_phone`, `hospital_address`) 
                    VALUES ('$hid','$hname','$hphone','$haddress')";
		        mysqli_query($db,$sql);
		        array_push($logerr, '*Hospital Added!!!!');
		        $hospital_id_auto++;
		        //header ('Location:sa_add_hospital.php');
        	}
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
			<div class="col-md-10" style="background-color: darkcyan">add hospital






			<div id="content" > 
			
			<div class="container" style="padding-top: 20px">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
						<form method="POST" action="sa_add_hospital.php">
						  <div class="panel panel-success">

							<div class="panel-body">
							  <div class="form-group">
								<label>Hospital ID</label>
								<input type="text" name="hid" value="<?php echo $hospital_id_auto ?>" class="form-control" readonly>
							  </div>
							  <div class="form-group">
								<label>Hospital Name</label>
								<input type="text" name="hname" class="form-control">
							  </div>
							  <div class="form-group">
								<label>Hospital Phone</label>
								<input type="text" name="hphone" class="form-control"  placeholder="01234567">
							  </div>
							  <div class="form-group">
								<label>Hospital Address</label>
								<input type="text" name="haddress" class="form-control">
							  </div>
							   <div class="form-group">
								<label>Hospital Image</label>
								<input type="text" name="himg" class="form-control">
							  </div>
								

							  <div class="form-group">
								<input type="submit" name="hospital_submit" class="form-control btn btn-success" value="Add Hospital">
							  </div>

							</div>
						  </div>
						</form>
					  </div>
					  <div class="col-md-4"> <?php if(count($logerr)>0)print_r($logerr)?></div>
					</div>
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
