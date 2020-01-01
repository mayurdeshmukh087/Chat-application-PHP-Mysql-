<?php 
session_start();
$id = session_id();
if($_SESSION['sess_id'] != $id){
	session_destroy();
	header("location: login.php");
}
$user_id = $_SESSION['user_id'];

$con = new mysqli("localhost", "root", "", "webakruti_practise");

$msg = $_POST['msg'];

$query = "INSERT INTO message VALUES(null,'$msg', NOW(), '$user_id')";

if($con->query($query)){
	header("location:view.php");
}
else{
	echo "Try again";
}


 ?>