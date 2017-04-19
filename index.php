<?php
 // Includes Login Script

include('login.php');
include('nyskraning.php');

/*if(isset($_SESSION['login_user'])){
header("location: profile.php");
}*/


?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
	<h1>PHP Login Session Example</h1>
<div id="login">
	<h2>Login Form</h2>
	<form action="login.php" method="post">
		<label>UserName :</label>
			<input id="name" name="username" placeholder="username" type="text">
		<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="text">
			<input name="submit" type="submit" value="Login ">
		<span><?php echo $error; ?></span>
	</form>
</div>


<div id="login">
	<form action="" method="post">
		<label>Notandanafn</label>
		<input type="text" name="nafn">
		<label>Lykilorð</label>
			<input type="text" name="passi">
		<label>Lykilorð Aftur</label>
			<input type="text" name="passi2">
		<input name="nyskraning" type="submit" value="nyskraning">
	</form>
</div>
<a href="adalsida.php">auka</a>
</div>
</body>
</html>