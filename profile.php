<?php
include('session.php');
include ('skraAatburd.php');
include('./includes/connection.php');
$fylki = [];
$sql = "SELECT atburdurID,atburdur,timi FROM atburdur";
$result = mysqli_query($conn, $sql);
$fjoldiAtburda = mysqli_num_rows($result);
$sql2 = "SELECT atburdur_ID FROM skraningm2m WHERE notandi_ID = '$notandiID_session' ORDER BY atburdur_ID";
$result2 = mysqli_query($conn, $sql2);
if (!(mysqli_num_rows($result2) > $fjoldiAtburda)) {
	$i = 0;
	while ($row2 = mysqli_fetch_array($result2)) {
		$fylki[$i] = $row2[0];
		$i++;
		if ($i == mysqli_num_rows($result2)) {
			$i = 0;
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Skráningarsíða</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
</head>
<body>
<h1>Lokaverkefni GSÖ</h1>
<b id="welcome">Velkominn : <i><?php echo $notandi_session; ?></i></b>
<h3>&nbsp;<span><?php echo $skilabod;  ?></span><?php echo $skilabod2 ?></h3>

<?php 

//resultHÉRNA er form með table búið til útfrá gögnum sem eru sótt í gagnagrunn. Það er listi yfir alla atburði sem eru í boði. Það er hnappur við hvern lista sem er hægt að ýta á og skrá þann notanda sem er loggaður inn á atburð.
$erSkradur = '';
if($result){
	echo '<form  method="post" action=""> <table cellspacing="5" cellpadding="8">
	<tr>
	<th>Staða:</th>
	<th>Atburður:</th>
	<th>Tími:</th>
	<th>Skrá</th>
	<th>Afskrá</th>
	</tr>';
	while($row = mysqli_fetch_array($result)){
		//row[0] er id númer á atburði, row[1] er heitið á atburðinum, row[2] er tímasetning
		if (in_array($row[0], $fylki)) {
			$erSkradur = '<div style="background: green;display: inline-block;height: 40px;width: 40px;border-radius: 50%;""></div>';
		}
		else {
			$erSkradur = '<div style="background: red;display: inline-block;height: 40px;width: 40px;border-radius: 50%;""></div>';
		}
	    echo '<tr>

	    <td>' . $erSkradur . '</td>
		<td>' . $row[1] . '</td>
		<td>' .$row[2] . '</td>
		<td>' . '<button name="atbudurNAFN" value="'.$row[0].";".$row[1].'" type="submit">Skrá</button>' .'</td> 
		<td>' . '<button id="del" name="eydaUrAtburd" value="'.$row[0].";".$row[1].'" type="submit">X</button>' .'</td>
		</tr>';//þegar ýtt er á hnappinn með name="atbudurNAFN" þá eru upplýsingar um notanda sendar og notandi er skráður á viðeigandi atburð, þegar ýtt er á hnapp með name="eydaUrAtburd" ef notandi afskráður af viðeigandi atburðu
		
	}
	echo '</table> 
	</form>';
 }
else {
	echo "Villa 1 <br/>";
	echo mysqli_error($conn);
}
mysqli_close($conn);

 ?>
  
 <div class="clear"></div>
<div id="logout"><b><a href="logout.php">Útskrá</a></b></div>

</body>
</html>



