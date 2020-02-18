<?php 
include ("includes/header.php");
include ("includes/config.php");
include ("includes/functions.php");
session_start();
$msg1 = '';
$msg2 = '';
$Username = '';
if (isset($_POST['submit'])) {
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$checkbox = isset($_POST['check']);
	if (empty($Username)) {
		$msg1 = "<div class='error'>Please enter your Username</div>";
	}
	elseif (empty($Password)) {
		$msg2 = "<div class='error'> Please enter a password</div>";
	}
	else if (strlen($Password)<5) {
		$msg2 = "<div class='error'>Please enter the registerd password only</div>";
	}
	else if (Username_exists($Username,$conn)) {
		$Pass = mysqli_query($conn,"select Password from registration where Username='$Username'");
		$Pass_w = mysqli_fetch_array($Pass);
		$dPass = $Pass_w['Password'];
		$Password = md5($Password);
		if(strcmp($Password, $dPass)!=0){
			$msg2 = "<div class='error'> Password is incorrect </div>";
		}
		else{
			$_SESSION['Username'] = $Username;
			if($checkbox == 'on'){
				setcookie('User',$Username,time()+90);
			}
			header("location:n.php");
		}
	}
 } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Montserrat', sans-serif;
		}
		#bgimg{
			width: 100%;
			height: 100vh;
			background-image: repeating-radial-gradient(
				#00c0ff 15%,#5050f0 20%);
		}
		.container{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		.jumbotron{
			margin-top: 20px;
			padding-top: 20px; 
			background-image: linear-gradient(to top,#0000a0,#0040ff,#00c0ff);
			color:white;
			padding-bottom: 20px;

		}
		.login-form{
			background-image: linear-gradient(#a10000,#f15050);
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
<body id="bgimg">
	<div class="container">
		<div class="login-form col-md-4 offset-md-4">
			<div class="jumbotron">
				<h2 class="text-center">Login Form</h2><br>
				<form method="post">
					<div class="form-group">
						<label>Username: </label>
						<input type="text" name="Username" placeholder="Enter your Username" class="form-control" value='<?php echo $Username ?>'><?php echo $msg1 ?><br>
						<label>Password:</label>
						<input type="password" name="Password" placeholder = "Enter your password" class="form-control"><?php echo $msg2 ?><br>
						<input type="checkbox" name="check">&nbsp Keep me logged in<br><br>
						<center><input type="submit" name="submit" value="Login" class="btn btn-success text-white font-weight-bold"></center><br>
						<center><a href="forgot.php"class = "text-white">Forgot password?</a></center>
						<a href="Sign up.php" class="text-white">New User</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>