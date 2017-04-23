<?php
include('session.php');
include ('skraAatburd.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $notandi_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<p>&nbsp;<span><?php echo $skilabod; ?></span></p>

<a href="tviskraning.php">ABCTVEE</a>

<?php 
include('connection.php');
$query = "SELECT atburdurID,atburdur,timi FROM atburdur";
$sql = mysqli_query($conn, $query);
if($sql){
	echo '<form  method="post" action="">';
	echo '<table align="left" cellspacing="5" cellpadding="8">
	<tr>
	<td align="left">Arburður:</td>
	<td align="left">Tími: </td>
	<td align="left">Hnappur: </td>
	</tr>';
	while($row = mysqli_fetch_array($sql)){
	    echo '<tr>
		<td align="left">' . $row[1] . '</td>
		<td align="left">' .$row[2] . '</td>
		<td align="left">' . '<button name="atbudurNAFN" value="'.$row[0].";".$row[1].'" type="submit">Skrá</button>' .'</td>';
		
	echo '</tr>';
	}
	echo '</table>';
	echo '</form';
		    
                // />
 }
else {
	echo "Villa 1 <br />";
	echo mysqli_error($conn);
}
mysqli_close($conn);
//'<a href="skraAatburd.php?atburdurID='.$row[0].'&atbudurNAFN='.$row[1].'">' . $row[0] . '</a>'
/*<td align="left">' . $row[1] . '</td> virkar
		<td align="left">' .$row[2] . '</td>
		<td align="left">' .  '<input type="submit" name="atbudurNAFN" value="'.$row[0].";".$row[1].'"/>'.'</td>';
		'<input type="submit" name="atbudurNAFN" value="'.$row[0].";".$row[1].'"/>'*/
 ?>



</div>
</body>
</html>



