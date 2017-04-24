<?php
// Connexion à la base de données
include 'connect.php';

$connect = new mysqli($hostname, $username, $password, $databaseName);	// connexion 

$sql="SELECT id FROM clients WHERE actif = 0";
	
$result = $connect->query($sql);	// selectionne tous les utilisateurs non actifs 

$send="";
while($row = mysqli_fetch_array($result))
{
	echo $row[0].","; // renvoi tous les id des clients non actifs
}
 
$connect->close(); // fermeture 
?>