<?php
include('login.php');
include('nyskraning.php');
if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Aðalsíða</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
</head>
<body>
<h1>GSÖ lokaverkefni</h1>
<div class="login fvinstri">
	<h2>Innskráning</h2>
	<form action="" method="post">
		<label>Notandanafn:</label>
			<input id="name" name="username" placeholder="Notandanafn" type="text">
		<label>Lykilorð:</label>
			<input id="password" name="password" placeholder="******" type="Password">
			<button name="submit">Skrá inn</button>
		<span><?php echo $error; ?></span>
	</form>
</div>
<div class="login fhaegri">
	<h2>Nýskráning</h2>
	<form action="" method="post">
		<label>Notandanafn:</label>
		<input type="text" name="nafn" placeholder="Notandanafn">
			<label>Lykilorð:</label>
			<input type="text" name="passi" placeholder="Lykilorð">
		<label>Lykilorð Aftur:</label>
			<input type="text" name="passi2" placeholder="Lykilorð aftur">
		<button name="nyskraning">Nýskraning</button>
		<span><?php echo $error2; ?></span>
	<div><?php echo $error3; ?></div>
	</form>
</div>
<div class="clear"></div>	
</body>
</html>