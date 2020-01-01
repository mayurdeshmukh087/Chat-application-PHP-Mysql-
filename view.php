<?php
session_start();
$id = session_id();
if($_SESSION['sess_id'] != $id){
	session_destroy();
	header("location: login.php");
}

$con = new mysqli("localhost", "root", "", "webakruti_practise");

$query = "SELECT * FROM message INNER JOIN users WHERE message.user_id=users.id ORDER BY message.created DESC";

$result = $con->query($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style type="text/css">
		.bg-orange{
			background-color: orange;
			border: 1px solid orange;
			font-family: sans-serif;
			color: white;
			padding: 10px;
		}
	</style>
</head>
<body>
	<h3>Chatting App</h3>
	<p> <a href="logout.php"> Logout</a></p>
	<form action="submit_message.php" method="post">
		<p> Enter Message
			<textarea  name="msg" placeholder="Enter Message">
			</textarea>
		</p>
		<p><input type="submit"></p>
	</form>
	<div>

	<?php
		while ($data = $result->fetch_object()) {
			echo "<div class='bg-orange'>";
			echo "<big><img src='$data->image' height='100'>$data->username:  $data->message</big>";
			echo "<small> $data->created</small>";
			echo "</div>";
		}	
	?>	
	</div>
</body>
</html>