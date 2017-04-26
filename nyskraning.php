<?php 
$error2 = '';
$error3 = '';
if (isset($_POST['nyskraning'])) {
	require_once('./includes/connection.php');
	$notandanafn = $_POST['nafn'];
	$passi =  $_POST['passi'];
	$passi2 = $_POST['passi2'];
	if (empty($notandanafn) || empty($passi) || empty($passi2)) {
		$error2 = "Villa í skráningu";
	}
	else {
		if ($passi == $passi2) {//ef passwordin eru hin sömu
		$sql = "INSERT INTO login (username, password) VALUES ('$notandanafn', '$passi')";

		if (mysqli_query($conn, $sql)) 
		{
		    $error3 = "Skráning tókst!";
		} else 
		{
		    echo "Villa: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
	else 
		{
			$error2 = "Lykilorð eru ekki eins";
		}
	}
	
}
 ?>