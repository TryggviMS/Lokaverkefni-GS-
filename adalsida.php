<?php require_once('connection.php');

$query = "SELECT atburdur,timi FROM atburdur";
$sql = mysqli_query($conn, $query);
if($sql){
echo '<table align="left" cellspacing="5" cellpadding="8">

<tr>
<td align="left">Arburður:</td>
<td align="left">Tími: </td>
</tr>';
while($row = mysqli_fetch_array($sql)){

    echo '<tr>
<td align="left">' . $row[0] . '</td>
<td align="left">' .$row[1] . '</td>';
echo '</tr>';
}
echo '</table>';

 }
 else {

echo "Villa 1 <br />";

echo mysqli_error($conn);
}
mysqli_close($conn);









 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Aðalsíða</title>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>