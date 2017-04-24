<?php

include 'connect.php';

$connect = new mysqli($hostname, $username, $password, $databaseName);	// conexion 

$id=$_GET["ids"];	// recuperation du form avec des GET
$array=explode(";",$id);	// enleve les ; en transformant le string en tableau 
for($i=0;$i<(count($array)-1);$i++)
{
	
	$sql="UPDATE clients SET actif=1 WHERE id='$array[$i]'";	
	$connect->query($sql);// met actif tout les clien avec leur id recuper 
	$sql="UPDATE notifications SET comptes = comptes-1 WHERE id = 1";
	$connect->query($sql);	// met a jour la basse de donner du site 
	
}


$connect->close(); // fermeture 

?>