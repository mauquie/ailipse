<?php
include'connect.php';

$connect = new mysqli($hostname, $username, $password, $databaseName);

$sql="SELECT id ,ref  From susp_materiaux";

$result=$connect->query($sql);
$materiaux="<option value='-1'> </option>";
while($row = mysqli_fetch_array($result))
{
	$materiaux=$materiaux."<option value=$row[0]>$row[1]</option>";
}
echo $materiaux;
$connect->close();
?>