<?php 
// Connexion à la base de données
include 'connect.php'; 

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$id=$_POST["client"];	// form 

$sql="DELETE FROM clients WHERE id='".$id."'"; // supprime le client avec l'id voulu
$connect->query($sql);
header("location: ../../index.php?a=administration");	// redirige 
?>