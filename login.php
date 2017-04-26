<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
{
	if (empty($_POST['username']) || empty($_POST['password'])) 
	{
		$error = "Username or Password is invalid";
	}
	else {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT password,username FROM login WHERE password='$password' AND username='$username'";
		require_once('./includes/connection.php');
		$sql = mysqli_query($conn, $query);
		$rows = mysqli_num_rows($sql);
		if ($rows == 1) 
		{
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: profile.php"); // Redirecting To Other Page
		} 
		else 
		{
			$error = "Villa in innskráningu";
		}
		mysqli_close($conn); // Closing Connection
	}
}
?>