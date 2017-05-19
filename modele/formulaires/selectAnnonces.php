<?php
// Connexion à la base de données
include 'connect.php';$target=$_GET["target"];
$connect = new mysqli($hostname, $username, $password, $databaseName);	// connexion if(($target=="activateAnnonce")||($target=="delete"))	{$sql="SELECT id FROM annonces WHERE active = 0";}else if($target=="notPanel")							{$sql="SELECT id FROM annonces";}else													{$sql="SELECT id FROM annonces WHERE active = 1";}

$result = $connect->query($sql);	// Sélectionne toutes les annonces actives
while($row = mysqli_fetch_array($result))
{
	echo $row[0].","; // renvoi tous les id des annonces actives
}
$connect->close(); // fermeture 
?>