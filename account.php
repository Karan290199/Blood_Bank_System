<?php  

$msg = '';$msg1='';$msg2 = '';$msg3='';$msg4='';
$id='';$Username = '';$del='';
$cPassword = '';
include ("includes/header.php");
include ("includes/config.php");
include ("includes/functions.php");
include ("includes/half.php");

if(isset($_POST['submit'])){
	$Username = $_POST['Username'];
	if(empty($Username)){
		$msg = "<div class = 'error'>Username field cannot be empty</div>";
	}
	elseif (Username_exists($Username,$conn)) {
		$msg = "<div class = 'error'>Choose a different Username</div>";
	}
	else{
		$user = mysqli_query($conn,"select * from registration");
		$retrieve = mysqli_fetch_array($user);
		$id = $retrieve['id'];
		mysqli_query($conn, "update registration set Username = '$Username' where id = '$id'");
		$msg1 = "<div class='success'>Username has been updated successfully</div>";
	}
}
elseif(isset($_POST['submit_'])){
	$Username = $_POST['Username'];
	$del = $_POST['del'];
	$cPassword = $_POST['cPassword'];
	$cPassword = md5($cPassword);
	$usered = mysqli_query($conn,"select * from registration");
	$ret = mysqli_fetch_array($usered);
	$id = $ret['id'];
	$Firstname=$ret['Firstname'];
	$Lastname=$ret['Lastname'];
	$BloodGroup=$ret['BloodGroup'];
	$Email=$ret['Email'];
	$dob=$ret['dob'];
	$Mobile=$ret['Mobile'];
	$Password = $ret['Password'];
	$user_existed = $ret['Username'];

	if (empty($cPassword)) {
		header('location:forgot.php');
	}
	elseif (strlen($cPassword)<5) {
		$msg2 = "<div class='error'> Please enter the registered password only</div>";
	}
	elseif (strcmp($Password, $cPassword)!=0) {
		$msg2 = "<div class='error'> Retype your password correctly</div>";
	}
	elseif (empty($del)) {
		$msg3 = "<div class='error'> Cannot be empty </div>";
	}
	elseif(strcmp($del, 'delete my account')!=0){
		$msg3 = "<div class='error'> Enter the statement correctly </div>";
	}
	elseif(strcmp($Username, $user_existed)!=0){
		$msg4 = "<div class='error'> Enter the registered username only or the username does not exist</div>";
	}
	else{
		mysqli_query($conn,"delete from registration where Username = '$Username'");
		$msg = "<div class='success'> Username is successfully deleted</div>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
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
		}
		.success{
			color:green;
		}
	</style>
</head>
<body>
<body id="bg">
	<div class="container">
		<div class="row">
			<div class="col-3 float-left pr-4">
				<nav class="menu position-relative" aria-label="Personal settings" data-pjax>
					<h5 class="menu-heading">Personal Settings</h5>
					<a class="js-selected-navigation-item selected menu-item" aria-current="page" href="profile.php">Profile</a>
					<a class="js-selected-navigation-item selected menu-item" aria-current="page" href="account.php">Account</a>
					<a class="js-selected-navigation-item selected menu-item" aria-current="page" href="Settings.php">Security</a>
				</nav>
			</div>
			<div class="col-9 float-left">
				<p class="font-weight-bold"
				style="font-size:25px">Change Username</p>
				<div class="dropdown-divider"></div>
				<div>
					<p>Changing the username can have unintended side effects</p>
					<?php echo $msg1 ?>
				</div>
				<button type="button" class="btn btn-info btn-lg border-radius:20px;" data-toggle="modal" data-target="#test1">Change Username</button>
				<div id="test1" class="modal fade" role="dialog" style="z-index: 1800;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2>Change your Username Really?</h2>
							</div>
							<div class="modal-body">
								<center><p>We will<strong> not</strong> set up redirects for your old profile page.</p></ceter>
                    			<center><p>We will<strong> not</strong> set up redirects for Pages sites.</p></center>
                    			<center><p>Renaming may take a few minutes to complete.</p></center>
      							<button type="button" class="btn btn-outline-danger border-radius:20px;" data-toggle="modal" data-target="#test2">I understand,let's change my username</button>
      							<br>
      						</div>      
    					</div>
  					</div>
				</div>
				<div id="test2" class="modal fade" role="dialog" style="z-index: 2000;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<span class="close">&times;</span>
							</div>
							<div class="modal-body">
								<form method="post">
									<input type="text" name="Username" class="form-control">
									<?php echo $msg; ?>
									<br><center><button name="submit" class="btn btn-outline-success">Change Username</button></center>
								</form>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
				<div>
					<p class="font-weight-bold text-danger"style="font-size:25px">Delete Account</p>
					<div class="dropdown-divider"></div>
					<div>
						<p>Once you delete your account, there is no going back. Please be certain.</p>
						<?php echo $msg; ?>
						<?php echo $msg4; ?>
					</div>
					<button type="button" class="btn btn-outline-danger btn-lg border-radius:20px;" data-toggle="modal" data-target="#test3">Delete Account</button>
					<div id="test3" class="modal fade" role="dialog" style="z-index: 1800;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<span class="close">&times;</span>
									<h5>Are you sure you want to do this?</h5>
								</div>
								<div class="modal-body">
									<center>We will be deleting your records once and for all so please consider<strong> twice </strong>before doing so. Your username would be available to anyone.</center>
									<div class="dropdown-divider"></div>
									<div>
										<form method="post">
											<label>Your username: </label>
											<input type="text" name="Username" class="form-control" value="<?php echo $Username; ?>"><br>
											<label><strong>To verify, type</strong> delete my account<strong> below: </strong></label>
											<input type="text" name="del" class="form-control" value="<?php echo $del;?>"><?php echo $msg3; ?><br>
											<label>Confirm your Password: </label>
											<input type="password" name="cPassword" class="form-control"><?php echo $msg2; ?><br>
											<center><button name="submit_" class="btn btn-outline-danger">Delete this account</button></center>
											<br>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>