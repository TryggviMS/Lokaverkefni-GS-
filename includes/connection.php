<?php 
$server = "tsuts.tskoli.is";
$user = "1309932819";
$pass = "mypassword";
$dbname = "1309932819_lokaverkefnigso";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
 ?>