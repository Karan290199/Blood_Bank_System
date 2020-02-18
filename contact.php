<?php
include ("includes/header.php");
include ("includes/config.php");
include ("includes/functions.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<style>
      #bgimg
      {
        width: auto;
        height: auto;
        background-image: linear-gradient(#0040ff ,#00c0ff);
      }
		  .card{
        width: 25rem;
			  height: 13rem;
        background-image:  linear-gradient(to right, #00004e ,#00c0ff);
        padding:10px;
        margin: auto;
        float:none;
        margin-bottom: 1px;
      }
  	</style>
</head>
<body id="bgimg">
	<?php include 'menu.php';?>
	<h2 class="text-white text-center">Contact Us</h2>
	<br><br><br>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-12">
			<div class=" card">
				<div class="card-body">
					<p class="card-text text-center text-white font-weight-bold">Name: KARAN.K.SHAH</p>
  					<p class="card-text text-center text-white font-weight-bold">Register Number: 17BLC1126</p>
  					<p class="card-text text-center text-white font-weight-bold">Mobile Number: 7299075011</p>
 					<p class="card-text text-center text-white font-weight-bold">Email: karank.shah2017@vitstudent.ac.in</p>
  				</div>
  			</div>
		</div>
  		<div class="col-lg-4 col-md-4 col-12">
  			<div class="card">
  				<div class="card-body">
  					<p class="card-text text-center text-white font-weight-bold">Name: S.SUNAND</p>
  					<p class="card-text text-center text-white font-weight-bold">Register Number: 17BLC1076</p>
  					<p class="card-text text-center text-white font-weight-bold">Mobile Number: 7904996099</p>
 					<p class="card-text text-center text-white font-weight-bold">Email: s.sunand2017@vitstudent.ac.in</p>
  				</div>
  			</div>
  		</div>
  		<div class="col-lg-4 col-md-4 col-12">
  			<div class="card">
  				<div class="card-body">
  					<p class="card-text text-center text-white font-weight-bold">Name: ASHWIN MADHAV</p>
  					<p class="card-text text-center text-white font-weight-bold">Register Number: 17BLC1064</p>
  					<p class="card-text text-center text-white font-weight-bold">Mobile Number: 9444640691</p>
 					<p class="card-text text-center text-white font-weight-bold">Email: ashwin.madhav2017@vitstudent.ac.in</p>
  				</div>
  			</div>
  		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="content/js/jquery.min.js"></script>
<script src="content/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
</body>
</html>