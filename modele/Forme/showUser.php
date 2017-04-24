<?php 
$id=$_POST["id"];

// Connexion à la base de données
include 'connect.php';

$connect = mysqli_connect($hostname, $username, $password, $databaseName);


$query = "SELECT * FROM clients WHERE id='".$id."'";
$result = $connect->query($query);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
		$client_email= $row["email"];
		$client_nom = $row["nom"];
		$client_prenom = $row["prenom"];
		$client_telephone = $row["telephone"];
		$client_rue_expedition = $row["rue_expedition"];
		$client_ville_expedition = $row["ville_expedition"];
		$client_code_postal_expedition = $row["code_postal_expedition"];
		$client_rue_facturation = $row["rue_facturation"];
		$client_ville_facturation = $row["ville_facturation"];
		$client_code_postal_facturation = $row["code_postal_facturation"];
		$client_permissions= $row["permissions"];
		$client_actif=$row["actif"];
	}
}

echo $client_email.",".
	 $client_rue_expedition.",".
	 $client_ville_expedition.",".
	 $client_code_postal_expedition.",".
	 $client_rue_facturation.",".
	 $client_ville_facturation.",".
	 $client_code_postal_facturation.",".
	 $client_actif.",".
	 $client_nom.",".
	 $client_prenom.",".
	 $client_telephone;


	

?>