<?php

include ('connect.php');

$id_fab=$_POST['id_fab'];
$ref=$_POST['ref'];
$eq1=$_POST['eq1'];
$eq2=$_POST['eq2'];
$eq3=$_POST['eq3'];
$materiaux=$_POST['materiaux'];
$rupture=$_POST['rupture'];
$diam=$_POST['diam'];
$couleur=$_POST['couleur'];
$connect = new mysqli($hostname, $username, $password, $databaseName);


if($eq1==-1)
{
	$eq1="null";
}
if($eq2==-1)
{
	$eq2="null";
}
if($eq3==-1)
{
	$eq3="null";
}

if(($ref != "")&&($id_fab!=-1))
{
	$sql="INSERT INTO `material`( `id_fab`, `ref`, `eq1`, `eq2`, `eq3`, `mat`, `rupture`, `diam`, `couleur`) VALUES ('$id_fab','$ref','$eq1','$eq2','$eq3','$materiaux','$rupture','$diam','$couleur')";
	$connect->query($sql);
}

header("location: ../../index.php?a=ajouter_voile");


?>