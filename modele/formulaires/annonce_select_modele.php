<?php
include 'connect.php';
$connect = new mysqli($hostname, $username, $password, $databaseName); // Ouverture 
$id_modele=$_POST["id_modele"];
$sql="SELECT nb_tail FROM `voile` WHERE id = $id_modele AND valider = 1";

?>