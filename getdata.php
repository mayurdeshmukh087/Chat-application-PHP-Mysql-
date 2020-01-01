<?php 
$a = $_POST['email'];
$b = $_POST['pass'];
if($a == "scott@gmail.com" && $b == 123){

	session_start();
	$_SESSION['id'] = 1;

	header("location: welcome.php");
}
else{
	header("location: index.php");
}

 ?>