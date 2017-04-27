<?php 
require_once('./includes/connection.php');
$sql3 = "SELECT DISTINCT dagsetning FROM atburdur";
$result3 = mysqli_query($conn, $sql3);
$prufa = [];
$teljari = 0;
if ((mysqli_num_rows($result3) > 0)) {
	while ($row3 = mysqli_fetch_array($result3)) {
		//echo '<option>'.$row3[0].'</option>';
		//echo $row3[0];
		$prufa[$teljari] = $row3[0];
		$teljari++;
	}
	$teljari = 0;
}

echo '<form method="GET" action="">
<select name="selectOptions">
<option>Sjá allt</option>';
foreach ($prufa as $key) {
	echo '<option>'.$key.'</option>';
}
echo '</select>
<button name="submit">Skrá inn</button>
</form>';
print_r($prufa); 
?>