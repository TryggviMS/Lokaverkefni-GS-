<?php
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];

$server = "tsuts.tskoli.is";
$user = "1309932819";
$pass = "mypassword";
$dbname = "1309932819_lokaverkefnigso";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "SELECT username FROM login WHERE username='$user_check'");
$row = mysqli_fetch_assoc($result);



$login_session =$row['username'];
if(!isset($login_session)){
	mysqli_close($conn); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}
?>