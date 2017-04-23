<?php 
require_once('connection.php');
$query = "SELECT notandi_ID,atburdur_ID FROM skraningm2m ";

$sql = mysqli_query($conn, $query);
 while ($row = mysqli_fetch_array($sql)) {
        echo $row[0] . " . " . $row[1] . "<br>";
    }


 ?>