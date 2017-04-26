<?php
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];

require_once('./includes/connection.php');
$query = mysqli_query($conn, "SELECT notandi_id,username FROM login WHERE username='$user_check'");
$row = mysqli_fetch_assoc($query);

$notandi_session =$row['username'];
$notandiID_session = $row['notandi_id'];
if(!isset($notandi_session)){
	mysqli_close($conn); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}
?>