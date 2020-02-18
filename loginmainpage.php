<?php

include ("includes/config.php");
include ("includes/functions.php");
include ("includes/header.php");
include ("includes/half.php");
session_start();
if (logged_in()) {
	header('location:Sign up.php');
}
if(isset($_COOKIE['User'])){
	$Username = $_COOKIE['User']; 
	$result = mysqli_query($conn,"select id,Firstname,Lastname,BloodGroup,Email,dob,Mobile,Username,dd from registration where Username = '$Username'");
	$retrieve = mysqli_fetch_array($result);
	$id = $retrieve['id'];
	$Firstname=$retrieve['Firstname'];
	$Lastname=$retrieve['Lastname'];
	$BloodGroup=$retrieve['BloodGroup'];
	$Email=$retrieve['Email'];
	$dob=$retrieve['dob'];
	$Mobile=$retrieve['Mobile'];
	$Username=$retrieve['Username'];
	$dd = $retrieve['dd'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> Profile Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Montserrat', sans-serif;
		}
		#bgimg{
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
		.card{
			width: 30rem;
			height: 25rem;
			background-image:  linear-gradient(to right, #00004e ,#00c0ff);
			padding:10px; 
		}
	</style>
</head>
<body id="bgimg">
	<div class="container">
		<h2 align="center" class="font-weight-bold text-white">Welcome User <?php echo ucfirst($Username);?></h2>	
		<br><br><br>
		<div class="card">
			<div class="card-body">
				<p class="card-text text-center text-white font-weight-bold">Id: <?php echo $id; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Firstname: <?php echo ucfirst($Firstname); ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Lastname: <?php echo ucfirst($Lastname); ?></p>
  				<p class="card-text text-center text-white font-weight-bold">BloodGroup: <?php echo $BloodGroup; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Email: <?php echo $Email; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">dob: <?php echo $dob; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Mobile: <?php echo $Mobile; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Username: <?php echo $Username; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Donation date: <?php echo $dd; ?></p>
  			</div>
		</div>
  	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php  
}

else
{
	$Username = $_SESSION['Username'];
	$result = mysqli_query($conn,"select id,Firstname,Lastname,BloodGroup,Email,dob,Mobile,Username,dd from registration where Username = '$Username'");
	$retrieve = mysqli_fetch_array($result);
//print_r($retrieve);
	$id = $retrieve['id'];
	$Firstname=$retrieve['Firstname'];
	$Lastname=$retrieve['Lastname'];
	$BloodGroup=$retrieve['BloodGroup'];
	$Email=$retrieve['Email'];
	$dob=$retrieve['dob'];
	$Mobile=$retrieve['Mobile'];
	$Username=$retrieve['Username'];
	$dd = $retrieve['dd'];
?>
<!DOCTYPE html>
<html>
<head>
	<title> Profile Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Montserrat', sans-serif;
		}
		#bgimg{
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
		.card{
			width: 30rem;
			height: 25rem;
			background-image:  linear-gradient(to right, #00004e ,#00c0ff);
			padding:10px;
			margin: 0 auto;
			float:none;
			margin-bottom: 1px; 
		}
	</style>
</head>
<body id="bgimg">
	<div class="container">
		<h2 align="center" class="font-weight-bold text-white">Welcome User <?php echo ucfirst($Username);?></h2>
		<div class=" card">
			<div class="card-body">
				<p class="card-text text-center text-white font-weight-bold">Id: <?php echo $id; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Firstname: <?php echo ucfirst($Firstname); ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Lastname: <?php echo ucfirst($Lastname); ?></p>
 				<p class="card-text text-center text-white font-weight-bold">BloodGroup: <?php echo $BloodGroup; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Email: <?php echo $Email; ?></p>
 				<p class="card-text text-center text-white font-weight-bold">dob: <?php echo $dob; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Mobile: <?php echo $Mobile; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Username: <?php echo $Username; ?></p>
  				<p class="card-text text-center text-white font-weight-bold">Donated date: <?php echo $dd; ?></p>
  			</div>
		</div>
  	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>