<?php

include 'connect.php';

$connect = new mysqli($hostname, $username, $password, $databaseName); // ouverture 

$id=$_GET["ids"];
$array=explode(";",$id); // transforme un string en array quand le string est avec des ; ; 
for($i=0;$i<(count($array)-1);$i++)
{
	
	$sql="DELETE FROM clients WHERE id='$array[$i]'";
	$connect->query($sql);// delete tous les clients d'ou on recoit l'id 
	$sql="UPDATE notifications SET comptes = comptes-1 WHERE id = 1";
	$connect->query($sql); // update les notifications
	
}


$connect->close(); // fermeture de la connexion 

?>