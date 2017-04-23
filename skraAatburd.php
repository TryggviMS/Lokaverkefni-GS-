<?php 
include_once('session.php');
$skilabod = '';
/*$atburdurID = $_POST['atburdurID'];
	$atburdurNafn = $_POST['atbudurNAFN'];*/
if (isset($_POST['atbudurNAFN'])) {
	/*$atburdurID = $_GET['atburdurID'];
	$atburdurNafn = $_GET['atbudurNAFN'];*/
	//$atburdurID = $_POST['atburdurID'];
	$atburdurNafn = $_POST['atbudurNAFN'];
	$atburdurIDogNafn = explode(';', $atburdurNafn);
	$notandiNafn = $notandi_session;
	//echo $notandiID_session . " . " . $atburdurID;
	echo $atburdurIDogNafn[0] . " . " . $atburdurIDogNafn[1];
	require_once('connection.php');
		$sql = "INSERT INTO skraningm2m (notandi_ID, atburdur_ID) VALUES ('$notandiID_session', '$atburdurIDogNafn[0]')";
	
		if ($conn->query($sql) === TRUE) {
			if ($atburdurIDogNafn[0] == 2) {
				$skilabod = "Notandi: " . $notandi_session ." hefur verið skráður á atburð: " . $atburdurIDogNafn[1];
			}
			else {
				$skilabod = '';
			}
		    
		}
		 else {
		    echo "Villa: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
}



 ?>