<?php

function Email_exists($Email,$conn)
{
	$row = mysqli_query($conn,"select id from registration where Email = '$Email'");
	if(mysqli_num_rows($row) == 1){
		return true;
	}
	else{
		return false;
	}
}
function Username_exists($Username,$conn)
{
	$row = mysqli_query($conn,"select Password from registration where Username = '$Username'");
	if(mysqli_num_rows($row) == 1){
		return true;
	}
	else{
		return false;
	}
} 

function logged_in(){
	if($_SESSION['Username']==''){
		return true;
	}
	else{
		return false;
	}
} 
?>