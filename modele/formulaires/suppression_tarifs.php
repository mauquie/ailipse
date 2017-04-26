<?php
	include 'connect.php';
	$connect = mysqli_connect($hostname, $username, $password, $databaseName);
	
	$i = $_GET['num'];
	
	$result = $connect->query('SELECT * FROM tarifs_revision');
	while($donnees = $result->fetch_array())
	{
		$nbTarifRevision++;
	}

	$result = $connect->query('SELECT * FROM tarifs_reparation');
	while($donnees = $result->fetch_array())
	{
		$nbTarifReparation++;
	}

	$result = $connect->query('SELECT * FROM tarifs_articles');
	while($donnees = $result->fetch_array())
	{
		$nbTarifArticle++;
	}
	
	// Requete sql pour supprimer la ligne de la BDD qui est cochée dans le tableau
	for($j = 0; $j < $i; $j++)
	{		
		if($j<$nbTarifRevision)
		{
			$connect->query('DELETE FROM tarifs_revision WHERE id='.$_GET['id']);
		}
		elseif($j<$nbTarifReparation+$nbTarifRevision)
		{
			$connect->query('DELETE FROM tarifs_reparation WHERE id='.$_GET['id']);
		}
		elseif($j<$nbTarifArticle+$nbTarifReparation+$nbTarifRevision)
		{
			$connect->query('DELETE FROM tarifs_articles WHERE id='.$_GET['id']);
		}
	}
	
	$connect->close();
	header("location: ../index.php?a=tarifs");       
?>