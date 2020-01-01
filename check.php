<?php 

$email = $_POST['email'];
$pass = $_POST['pass'];
 
 $con = new mysqli("localhost", "root", "", "webakruti");
 $query = "SELECT * FROM users WHERE email='$email' AND password= '$pass'";


 if($result=$con->query($query)){
 	 $data = $result->fetch_object();
 	session_start();
 	$_SESSION['sess_id'] = session_id();
 	$_SESSION['username'] = $data->username;
 	$_SESSION['user_id'] = $data->id;
 	header("location: view.php");
 }
 else{
 	echo mysqli_error($con);
 }

 ?>