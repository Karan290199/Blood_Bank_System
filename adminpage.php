<?php
include ("includes/config.php");

$BloodGroup='';$msg1 = '';$msg2='';
$id = '';$diff='';
$Firstname='';$Lastname = '';
$Email = '';$Mobile='';$dd = '';
echo "<a href='admin-logout.php'><button class='btn btn-outline-primary' style='float:right;margin-left:150px; '>Logout</button></a>";
if (isset($_POST['submit'])) {
	$BloodGroup = $_POST['BloodGroup'];
	if(empty($BloodGroup)){
		$msg1 = "<div class = 'error'>Mandatory to be filled</div>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Crete Round', serif;
		}
		.jumbotron{
			margin-top: 20px;
			padding-top: 20px;
			padding-bottom: 20px; 
			background-image: linear-gradient(#00c0ff,#0040ff);
			color:white;

		}
		.Admin-form{ 
			background-image: linear-gradient(#00c0ff,#0040ff);
		}
		.error{
			color:red;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3 class="text-uppercase">Admin Loggged at <?php echo "".date("Y-m-d");?></h3><br>
			<form method="post">
				<div class="form-group">
					<input type="text" name="BloodGroup" placeholder="Enter your BloodGroup" class="form-control"><?php echo $msg1;?><br>
					<center><input type="submit" value="submit" name="submit" id="submit" class="btn btn-success"></center>
				</div>
			</form>
		<div>
			<h2 class="text-center bg-primary text-white">Display data</h2>
			<br><br>
		</div>
	</div>

</body>
</html>

<?php

$BloodGroup='';$msg1 = '';$msg2='';
$id = '';$diff='';
$Firstname='';$Lastname = '';
$Email = '';$Mobile='';$dd = '';
if (isset($_POST['submit'])) {
	$BloodGroup = $_POST['BloodGroup'];
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'dbms_project');
	$q = "select id,Firstname,Lastname,Email,Mobile,dd from registration where BloodGroup='$BloodGroup'";
	$query = mysqli_query($con,$q);
	$row = mysqli_num_rows($query);
	if($row > 0){
		echo "<table class='table table-striped table-borered text-center'>
				<tr>
				<th>Serial Number</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Donation date</th>
				<th>Eligible to donate</th></tr>";
				while($result = mysqli_fetch_array($query)){
					$id = $result['id'];
					$Firstname = $result['Firstname'];
					$Lastname = $result['Lastname'];
					$Email = $result['Email'];
					$Mobile = $result['Mobile'];
					$dd = $result['dd'];
					$dat1 = date_create($dd);
					$dat1 ->format("%a");
					$dat2 = date_create(date("Y-m-d"));
					$diff = date_diff($dat1,$dat2);
					if($diff->format("%a")<42){
						$msg2 = "Blood can be used!!";
					}
					else if($diff->format("%a")>42){
						$msg2 = "Blood is decayed!!";
					}
					echo "<tr>
						  <td>$id</td>
					  	  <td>$Firstname</td>
					      <td>$Lastname</td>
					      <td>$Email</td>
					      <td>$Mobile</td>
					      <td>$dd</td>
					      <td>$msg2</td></tr>";
				}
		echo "</table>";
	}
}
?>