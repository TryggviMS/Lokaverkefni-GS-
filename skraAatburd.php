<?php 
include_once('session.php');
$skilabod = '';
$skilabod2 = '';
$notandiNafn = $notandi_session;//nafn notanda fengið frá sessions sem byrjar þegar notandi loggar sig inn
if (isset($_POST['atbudurNAFN'])) {
	
	$atburdurNafn = $_POST['atbudurNAFN'];//hérna eru þær upplýsingar sem eru sendar með post þegar ýtt er á hnapp á síðunni með atburði
	$atburdurIDogNafn = explode(';', $atburdurNafn);//strengurinn sprengdur og $atburdurID er id númer atburðar og $atburdurNafn er nafn atburðar
	$atburdurID = $atburdurIDogNafn[0];
	$atburdurNafn = $atburdurIDogNafn[1];
	
	require('./includes/connection.php');
	$sql = "SELECT notandi_ID FROM skraningm2m WHERE notandi_ID = '$notandiID_session' AND atburdur_ID = '$atburdurID'";
	$result = mysqli_query($conn, $sql);

	if (!(mysqli_num_rows($result) > 0)) {//hérna er byrjað að finna hvort notandi sé nú þegar skráður á atburð, annars er notandi skráður á atburðinn
		$sql2 = "INSERT INTO skraningm2m (notandi_ID, atburdur_ID) VALUES ('$notandiID_session', '$atburdurID')";
		if (mysqli_query($conn, $sql2)) {
			$skilabod2 = "Notandi: " . $notandi_session ." hefur verið skráður á atburð: " . $atburdurNafn;
		}
		else {
		    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
		}
    }
		else {
   			$skilabod = "Þú ert nú þegar skráð/ur á atburð: " . $atburdurNafn;
		}
	mysqli_close($conn);
}
if (isset($_POST['eydaUrAtburd'])) {
	$atburdurNafn = $_POST['eydaUrAtburd'];//hérna eru þær upplýsingar sem eru sendar með post þegar ýtt er á hnapp á síðunni með atburði
	$atburdurIDogNafn = explode(';', $atburdurNafn);//strengurinn sprengdur og $atburdurID er id númer atburðar og $atburdurNafn er nafn atburðar
	$atburdurID = $atburdurIDogNafn[0];
	$atburdurNafn = $atburdurIDogNafn[1];
	$sql = "DELETE FROM skraningm2m WHERE  notandi_ID = '$notandiID_session' AND atburdur_ID = '$atburdurID'";

	if (mysqli_query($conn, $sql)) {
	    $skilabod = "Notandi: ". $notandiNafn . " hefur skráð sig úr " . $atburdurNafn;
	} 
	else {
	   $skilabod = "villa í að afskrá";
	}
}
?>