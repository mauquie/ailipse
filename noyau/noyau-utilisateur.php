<?php

	switch($action)
	{
		case "deconnexion":
			$sortie=file("vue/application.html");
			require_once('modele/logout.php');
		break;
		
		case "voile":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'voile';
			$contenu = file_get_contents("modele/modelisation/application.php");
		break;
		
		case "profil":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'profil';
			$typeUtilisateur->recuData();
			$contenu = $typeUtilisateur->ModifierProfil();
		break;
		// a partir d'un form
		
		
		case "update":
			require_once("modele/formulaires/update.php");
		break;
		
		default:
			//redirection page 404
			$contenu = "";
			$sortie = "";
	}

?>