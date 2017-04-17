
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
{
if (empty($_POST['username']) || empty($_POST['password'])) 
{
	$error = "Username or Password is invalid";
}
else
{
$username = $_POST['username'];
$password = $_POST['password'];

$server = "tsuts.tskoli.is";
$user = "1309932819";
$pass = "mypassword";
$dbname = "1309932819_lokaverkefnigso";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "SELECT password,username FROM login WHERE password='$password' AND username='$username'" );
$rows = mysqli_num_rows($result);
if ($rows == 1) 
{
	$_SESSION['login_user']=$username; // Initializing Session
	header("location: profile.php"); // Redirecting To Other Page
} 
else 
{
	$error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}
?>