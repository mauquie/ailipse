<?php
include'connect.php';
$id=$_POST["id"];
$connect = new mysqli($hostname, $username, $password, $databaseName);
$sql="SELECT * FROM modele where id='$id'";
$result=$connect->query($sql);
$atsend="";
while($row = mysqli_fetch_array($result))
{
	$atsend="$row[1],$row[2],$row[3],$row[4],$row[5]";
}
echo $atsend;
$sql="SELECT * FROM taille_voile where idvoile='$id'";
$resulta=$connect->query($sql);
$row = $resulta->fetch_array();
$atsend="$row[1],$row[2],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10]";


$connect->close();
?>
