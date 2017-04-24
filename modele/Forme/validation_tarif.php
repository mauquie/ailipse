<?php
	include 'connect.php';
	$connect = mysqli_connect($hostname, $username, $password, $databaseName);
	$result = $connect->query('SELECT * FROM tarifsrevision UNION SELECT * FROM tarifsreparation UNION SELECT * FROM tarifsarticles');
	$i = 0;
	while($donnees = $result->fetch_array())
	{
		$nom[$i]=$donnees['nom'];
		$i++;
		
	}
	for($j = 0; $j < $i; $j++)
	{
		$valeurHT[$j] = $_POST['tarifHT'.$j];		
		$valeurHT[$j] = str_replace("€","",$valeurHT[$j]);
		$valeurTTC[$j] = $_POST['tarifTTC'.$j];
		$valeurTTC[$j] = str_replace("€","",$valeurTTC[$j]);
		$valeurPCT[$j] = $_POST['tarifPCT'.$j];
		$valeurPCT[$j] = str_replace("%","",$valeurPCT[$j]);
	}
	
	$nbTarifRevision=0;
	$nbTarifReparation=0;
	$nbTarifArticle=0;
	
	$result = $connect->query('SELECT * FROM tarifsrevision');
	while($donnees = $result->fetch_array())
	{
		$nbTarifRevision++;
	}
	
	$result = $connect->query('SELECT * FROM tarifsreparation');
	while($donnees = $result->fetch_array())
	{
		$nbTarifReparation++;
	}
	
	$result = $connect->query('SELECT * FROM tarifsarticles');
	while($donnees = $result->fetch_array())
	{
		$nbTarifArticle++;
	}
	for($j = 0; $j < $i; $j++)
	{		
		if($j<$nbTarifRevision)
		{
			$sql = "UPDATE tarifsrevision SET tarifht = '$valeurHT[$j]', tarifttc = '$valeurTTC[$j]', pourcent = '$valeurPCT[$j]' WHERE nom = '$nom[$j]'";
		}
		elseif($j<$nbTarifReparation+$nbTarifRevision)
		{
			$sql = "UPDATE tarifsreparation SET tarifht = '$valeurHT[$j]', tarifttc = '$valeurTTC[$j]', pourcent = '$valeurPCT[$j]' WHERE nom = '$nom[$j]'";
		}
		elseif($j<$nbTarifArticle+$nbTarifReparation+$nbTarifRevision)
		{
			$sql = "UPDATE tarifsarticles SET tarifht = '$valeurHT[$j]', tarifttc = '$valeurTTC[$j]', pourcent = '$valeurPCT[$j]' WHERE nom = '$nom[$j]'";
		}
		$connect->query($sql);
	}
	$connect->close();
	header("location: ../../index.php?a=tarifs");
?>