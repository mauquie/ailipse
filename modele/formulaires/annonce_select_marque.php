<?php
include 'connect.php';
$connect = new mysqli($hostname, $username, $password, $databaseName); // Ouverture 
$id_marque=$_POST["id_marque"];
$sql="SELECT id, nom, nb_tail FROM `voile` WHERE id_const = $id_marque AND valider = 1";
$result = $connect->query($sql); // On envoie la requête$deroulant_modele="";while($row = mysqli_fetch_array($result)){	$deroulant_modele = $deroulant_modele."<option value=$row[0]>$row[1]</option>";}
echo $deroulant_modele;$connect->close(); // Fermeture de la connexion 
?>