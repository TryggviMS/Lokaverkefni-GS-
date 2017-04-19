<?php 
if (isset($_POST['nyskraning'])) {
	require_once('connection.php');
	$notandanafn = $_POST['nafn'];
	$passi =  $_POST['passi'];
	$passi2 = $_POST['passi2'];
	if ($passi == $passi2) {//ef passwordin eru hin sömu
		$sql = "INSERT INTO login (username, password) VALUES ('$notandanafn', '$passi')";

		if ($conn->query($sql) === TRUE) {
		    echo "Skráning tókst";
		} else {
		    echo "Villa: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
}
 ?>