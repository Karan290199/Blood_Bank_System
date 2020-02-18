<?php

include ("includes/header.php");
include ("includes/config.php");
include ("includes/functions.php");
include ("includes/half.php");
$msg='';
$Name = '';
$Email = '';
if (isset($_POST['submit'])) {
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Location = $_POST['Location'];
	mysqli_query($conn,"insert into profile(Name,Email,Location)
		values('$Name','$Email','$Location')");
	$msg = "<div class=''success'>Profile has been successfully updated.</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
			height: 100%;
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
				<h10 class="font-weight-bold">Public Profile</h10>
				<div class="dropdown-divider"></div>
				<div>
					<form method="post" id="prof">
						<label><strong>Name</strong></label>
						<input type="text" name="Name" class="form-control" value='<?php echo $Name; ?>'>
						<br>
						<label><strong>Public email </strong></label>
						<input type="text" name="Email" class="form-control" value='<?php echo $Email; ?>'><br>
						<label><strong>Bio </strong></label>
					</form>
					<textarea rows="4" cols ="40" name="comment" form="prof">Tell us a bit about yourself</textarea>
					<div class="dropdown-divider"></div>
					<form method="post">
						<label><strong>Location</strong></label>
						<input type="text" name="Location" class="form-control"><br>
						<p>All of the fields on this page are optional and can be deleted at any time, and by filling them out, you're giving us consent to share this data wherever your user profile appears. Please see our <a href="privacy.php">privacy statement</a> to learn more about how we use this information.</p>
						<button name="submit" class="btn btn-success">Update profile</button><br>
						<?php echo $msg; ?>
					</form>
				</div>

			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

</body>
</html>