<?php
include 'connect.php';
$connect = new mysqli($hostname, $username, $password, $databaseName); // Ouverture 
$id_modele=$_POST["id_modele"];
$sql="SELECT nb_tail FROM `voile` WHERE id = $id_modele AND valider = 1";$result = $connect->query($sql); // On envoie la requêtewhile($row = mysqli_fetch_array($result)){	$nb_tailles = $row[0];}$sql="SELECT T1,T2,T3,T4,T5,T6,T7,T8,T9,T10 FROM `voile_taille` WHERE idvoile = $id_modele";$result = $connect->query($sql); // On envoie la requête$deroulant_taille="";$row = mysqli_fetch_array($result);for($i=0;$i<$nb_tailles;$i++){	if ($row[$i] != NULL)	{		$deroulant_taille = $deroulant_taille."<option value=$row[$i]>$row[$i]</option>";	}}
echo $deroulant_taille;$connect->close(); // Fermeture de la connexion 
?>