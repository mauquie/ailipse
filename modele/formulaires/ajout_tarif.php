<?php
	include 'connect.php';
	$connect = mysqli_connect($hostname, $username, $password, $databaseName);	
	
	$typetarif = $_POST['typeTarif'];
	
	$nom = $_POST['tarifName'];
	
	$valeurHT = $_POST['tarifHT'];		
	$valeurHT = str_replace("€","",$valeurHT);

	$valeurTTC = $_POST['tarifTTC'];
	$valeurTTC = str_replace("€","",$valeurTTC);

	$valeurPCT = $_POST['tarifPCT'];
	$valeurPCT = str_replace("%","",$valeurPCT);
	
	$TVA = $valeurHT+20*$valeurHT/100;
	$valeurTTC = number_format($TVA, 2, '.', '');
	
	if($typetarif == 0)
	{
		$sql = "INSERT INTO `tarifs_revision`(`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES ('','$nom','$valeurHT','$valeurTTC','$valeurPCT')";
	}
	elseif($typetarif == 1)
	{
		$sql = "INSERT INTO `tarifs_reparation`(`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES ('','$nom','$valeurHT','$valeurTTC','$valeurPCT')";
	}	
	elseif($typetarif == 2)
	{
		$sql = "INSERT INTO `tarifs_articles`(`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES ('','$nom','$valeurHT','$valeurTTC','$valeurPCT')";
	}
	
	$connect->query($sql);
	$connect->close();
	
	header("location: ../../index.php?a=tarifs");	
?>