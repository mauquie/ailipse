<?php
// Connexion � la base de donn�es
include 'connect.php';
$connect = new mysqli($hostname, $username, $password, $databaseName);	// connexion 

$result = $connect->query($sql);	// S�lectionne toutes les annonces actives
while($row = mysqli_fetch_array($result))
{
	echo $row[0].","; // renvoi tous les id des annonces actives
}
$connect->close(); // fermeture 
?>