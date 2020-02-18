<?php
session_start();
session_destroy();

header('location:home.php');
setcookie('User','',time()-90);

?>