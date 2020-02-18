<?php

include ("includes/header.php");
include ("includes/config.php");
include ("includes/functions.php");
include ("includes/half.php");
$msg = '';$msg1='';$msg2='';
$oPassword = '';$Password = '';$cPassword = '';
$Pass_w='';$Pass_ = '';$id='';

if(isset($_POST['submit'])){
	
	$oPassword = $_POST['oPassword'];
	$Password = $_POST['Password'];
	$cPassword = $_POST['cPassword'];

	if(empty($oPassword)){
		$msg1 = "<div class='error'> Please enter a password</div>";
	}
	elseif(empty($Password)) {
		$msg1 = "<div class='error'> Please enter a password</div>";
	}
	elseif (strlen($Password)<5) {
		$msg1 = "<div class='error'> Password must contain atleast 5 characters</div>";
	}
	elseif (strcmp($Password, $cPassword)!=0) {
		$msg2 = "<div class='error'> Retype your password correctly</div>";
	}
	else{
		$oPassword = md5($oPassword);
		$Pass = mysqli_query($conn,"select * from registration where Password = '$oPassword'");
		$retrive = mysqli_fetch_array($Pass);
		$Pass_ = $retrive['Password'];
		$id = $retrive['id'];
		$Password = md5($Password);
		if(strcmp($oPassword, $Pass_) == 0){
			mysqli_query($conn,"update registration set Password = '$Password' where id = '$id'");
			$msg = "<div class ='success'>Password is updated successfully</div>";
		}
		else{
			$msg = "<div class ='error'>Password could  not be updated</div>";
		}
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Montserrat', sans-serif;
		}
		#bg{
			background-color: #efefef;
		}
		.container{
			width: 1200px;
			height: 640px;
			padding-top: 50px;
			background-color: #fff;
			margin-top:20px;
			margin-bottom: 20px;
		}
		h2{
			text-align:center;
		}
		.position-relative {
			position: relative!important;
		}
		.menu {
			margin-bottom: 15px;
    		list-style: none;
    		background-color: #fff;
    		border: 1px solid #d1d5da;
    		border-radius: 3px;
		}
		article, aside, details, figcaption, figure, footer, header, main, menu, nav, section {
			display: block;
		}
		.menu-item.selected {
			font-weight: 600;
    		color: #24292e;
    		cursor: default;
    		background-color: #fff;
		}
		.menu-item {
			position: relative;
    		display: block;
    		padding: 8px 10px;
    		border-bottom: 1px solid #e1e4e8;
    	}
		a{
			color: #0366d6;
    		text-decoration: none;
		}
		a{
			background-color: initial;
		}
		a:active, a:hover {
			outline-width: 0;
		}
		.error{
			color:red;
			font-weight: bold;
		}
		.success{
			color:green;
			font-weight: bold;
		}
	</style>
</head>
<body id="bg">
	<div class="container">
		<div class="row">
			<div class="col-3 float-left pr-4">
				<nav class="menu position-relative" aria-label="Personal settings" data-pjax>
					<h3 class="menu-heading">Personal Settings</h3>
					<a class="js-selected-navigation-item selected menu-item" aria-current="page" href="profile.php">Profile</a>
					<a class="js-selected-navigation-item selected menu-item" aria-current="page" href="account.php">Account</a>
					<a class="js-selected-navigation-item selected menu-item" aria-current="page" href="Settings.php">Security</a>
				</nav>
			</div>
			<div class="col-9 float-left">
				<h2>Change Password</h2>
				<?php echo $msg ?><br>
				<form method="post">
					<div class="form-group">
						<label>Old Password: </label>
						<input type="password" name="oPassword" class="form-control" value="<?php echo $oPassword ?>"><?php echo $msg1; ?><br>
						<label>New Password: </label>
						<input type="password" name="Password" class="form-control"><?php echo $msg1 ?><br>
						<label>Confirm Password: </label>
						<input type="password" name="cPassword" class="form-control"><?php echo $msg2 ?><br>
						<center><button name="submit" class="btn btn-success">Update Password</button></center>
						<a href="forgot.php">I forgot my Password.</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>