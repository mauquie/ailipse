<?php
include 'connect.php';
$connect = new mysqli($hostname, $username, $password, $databaseName); // Ouverture 
$id_marque=$_POST["id_marque"];
$sql="SELECT id, nom, nb_tail FROM `voile` WHERE id_const = $id_marque AND valider = 1";
$result = $connect->query($sql); // On envoie la requête

?>