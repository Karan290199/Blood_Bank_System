<?php
$msg1 = '';
$msg2 = '';
$msg3 = '';
$msg4 = '';
$msg5 = '';$msg6 = '';$msg7='';$msg8='';$msg9='';$msg10='';

include ("includes/header.php");
include ("includes/config.php");
include ("includes/functions.php");

$Firstname = '';
$Lastname = '';
$BloodGroup='';
$Email='';
$dob='';
$Mobile='';
$Username='';
$Password='';
$cPassword='';
$dd='';
if(isset($_POST['submit']))
{
	$Firstname = $_POST['Firstname'];
	$Lastname = $_POST['Lastname'];
	$BloodGroup = $_POST['BloodGroup'];
	$Email = $_POST['Email'];
	$dob = $_POST['dob'];
	$Mobile = $_POST['Mobile'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$cPassword = $_POST['cPassword'];
	$dd = $_POST['dd'];
	$checkbox = isset($_POST['check']);
	if (strlen($Firstname)<3) {
		$msg1 = "<div class='error'>Name cannot be less than 3 characters</div>";
	}
	else if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
		$msg3 = "<div class='error'> Enter a valid Email</div>";
	}
	else if (Email_exists($Email,$conn)) {
		$msg3 = "<div class='error'> Email is already registered</div>";
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
		$msg6 = "<div class='error'> Retype your password correctly</div>";
	}
	elseif ($checkbox != 'on') {
		$msg7= "<div class='error'>Please Agree on terms and conditions</div>";
	}
	else if (Username_exists($Username,$conn)) {
		$msg8 = "<div class = 'error'>Username already exists </div>";
	}
	elseif (empty($dd)) {
		$msg10 = "<div class = 'error'>field is mandatory</div>";
	}
	else{
		$Password = md5($Password);
		mysqli_query($conn,"insert into registration(Firstname,Lastname,BloodGroup,Email,dob,Mobile,Username,Password,dd)
			values('$Firstname','$Lastname','$BloodGroup','$Email','$dob','$Mobile','$Username','$Password','$dd')");
		$msg9 = "<center><div class = 'success'>You have registered successfully</div></center>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Sign Up</title>
	<?php echo $msg8 ?>
	<?php echo $msg9?>
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
			height: 100%;
			background-image: linear-gradient(#0040ff ,#00c0ff);
		}
		.jumbotron{
			margin-top: 20px;
			padding-top: 20px;
			padding-bottom: 20px; 
			background-image: linear-gradient(#00c0ff,#0040ff);
			color:white;

		}
		.login-form{
			background-image: linear-gradient(#00c0ff,#0040ff);
		}
		.error{
			color:red;
			font-weight: bold;
		}
		.success{
			color:white;
		}
	</style>
</head>
<body id = "bgimg">
	<div class="container">
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron">
				<h3 align="center" class="text-uppercase">Sign Up</h3><br>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="Firstname" placeholder="Enter your Firstname" class="form-control" value='<?php echo $Firstname; ?>'>
						<?php echo $msg1; ?><br>
						
						<input type="text" name="Lastname" placeholder="Enter your Lastname" class="form-control" value='<?php echo $Lastname; ?>'><br>
						
						<input type="text" name="BloodGroup" placeholder="Enter your BloodGroup" class="form-control" value='<?php echo $BloodGroup; ?>'><br>

						<input type="text" name="Email" placeholder="Enter your Email" class="form-control" value='<?php echo $Email; ?>'>
						<?php echo $msg3; ?><br>

						<input type="date" name="dob" placeholder="Enter your date of birth" class="form-control" value='<?php echo $dob; ?>'><?php echo $msg4; ?><br>

						<input type="text" name="Mobile" placeholder="Enter your Mobile number" class="form-control" value='<?php echo $Mobile; ?>'><br>

						<input type="text" name="Username" placeholder="Enter your Username" class="form-control" value='<?php echo $Username; ?>'><br>

						<input type="password" name="Password" placeholder="Enter your Password" class="form-control" value='<?php echo $Password; ?>'><?php echo $msg5 ?><br>

						<input type="password" name="cPassword" placeholder="Retype your Password" class="form-control" value='<?php echo $cPassword ?>'><?php echo $msg6 ?><br>

						<input type="date" name="dd" placeholder="Enter the last time you had donated the blood" class="form-control" value='<?php echo $dd?>'><?php echo $msg10?><br>
						
						<input type="checkbox" name="check">I Agree to the terms and conditions
						<?php echo $msg7?>
						
						<center><input type="submit" value="submit" name="submit" class="btn btn-success"></center>
					</div>
					<a href="userlogin.php" class="text-white"><button class="btn btn-outline-success text-white">Already Registered</a></button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>