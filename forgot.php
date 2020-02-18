<?php

include ("includes/header.php");
include ("includes/config.php");
include ("includes/functions.php");

$msg3 = '';
$msg4 = '';
$msg5 = '';
$msg6 = '';
$Email = '';
$dob = '';
$dob_ = '';
$Password1 = '';
$Password_ = '';
$Password = '';
if(isset($_POST['submit'])){
	$Email = $_POST['Email'];
	$dob = $_POST['dob'];
	$Password = $_POST['Password'];
	$cPassword = $_POST['cPassword'];

	if (empty($Email)) {
		$msg3 = "<div class='error'> Email field cannot be empty</div>";
	}
	elseif (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
		$msg3 = "<div class='error'>Enter the registered Email</div>";	
	}
	elseif (empty($dob)) {
		$msg4 = "<div class='error'> Enter your date of birth</div>";
	}
	elseif (empty($Password)) {
		$msg5 = "<div class='error'> Please enter a password</div>";
	}
	elseif (strlen($Password)<5) {
		$msg5 = "<div class='error'> Password must contain atleast 5 characters</div>";
	}
	elseif (strcmp($Password, $cPassword)!=0) {
		$msg5 = "<div class='error'> Retype your password correctly</div>";
	}

	else if (Email_exists($Email,$conn)){
		$result = mysqli_query($conn,"select dob from registration where Email = '$Email'");
		$retrieve = mysqli_fetch_array($result);
		$dob1 = $retrieve['dob'];
		if(strcmp($dob, $dob1)==0){
			$Password1 = md5($Password);
			$res = mysqli_query($conn,"update registration set Password = '$Password1'");
			$msg6 = "<div class='success'>Password updated successfully</div>";
		}
		else{
			$msg4 = "<div class='error'>Dob incorrect</div>";
		}
	}
	else
	{
		$msg3 = "<div class='error'>Email does not exist</div>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Forgot Password</title>
	<link href="https://fonts.googleapis.com/css?family=Crete+Round&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Crete Round', serif;
		}		
		#bgimg{
			width: 100%;
			height: 100vh;
			background-image: repeating-radial-gradient(#0000ff 5%,#0040ff 10%,#00c0ff 15%);
		}
		.jumbotron{
			margin-top: 20px;
			padding-top: 20px;
			padding-bottom: 20px; 
			background-image: linear-gradient(#00c0ff,#0040ff);
			color:white;

		}
		.login-form{
			background-image: linear-gradient(#00c0ff,#48cccd);
		}
		.error{
			color:red;
			font-weight: bold;
			text-shadow: 0.8px 0.8px #ffffff;
			text-indent: 0.5px;
		}
		.success{
			color:#006400;
			text-shadow: 0.8px 0.8px #000000;
			text-indent: 0.5px;
		}
		h3{
			text-align: center;
			color:blue;
			text-shadow: 0.9px 0.9px white;
			font-weight: bold;
		}
	</style>
</head>
<body id = "bgimg">
	<div class="container">
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron">
				<h3>Forgot Password</h3><br>
				<?php echo $msg6; ?>
				<form method="post">
					<div class="form-group">
						<label>Email: </label>
						<input type="email" name="Email" placeholder="Enter your Email" class="form-control" value="<?php echo $Email ?>"><?php echo $msg3 ?>
						<br>
						<label>Date of Birth: </label>
						<input type="date" name="dob" placeholder="Enter your date of birth"
						class="form-control" value="<?php echo $dob ?>"><?php echo $msg4 ?><br>
						<label>Password: </label>
						<input type="password" name="Password" placeholder="Enter your new password" class="form-control"><?php echo $msg5 ?><br>
						<label>Confirm Password: </label>
						<input type="password" name="cPassword" placeholder="Retype your new password" class="form-control"><?php echo $msg5 ?><br>
						<center><input type="submit" name="submit" class="btn btn-success" value="Submit"></center><br>
						<center><a href="userlogin.php" class="text-white"><- Back to login page</a></center><br>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>