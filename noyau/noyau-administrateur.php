<?php

	switch($action)
	{
		case "valider_addmin":
			$sortie=file("vue/application.html");
			$contenu=$typeUtilisateur->ValidationVoileConstructeur();	// utilisation de la classe operateur 
		break;
		
		case "notifications":
			$sortie=file("vue/application.html");
			
			$nav_en_cours = 'index';

			$contenu=$notif->gestion_notif();	// appel de la fonction de notification
			
		break;
		
		case "menu":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'administration';
			$contenu=$typeUtilisateur->menuAdministration();	// affichage par objet operateur 
			

		break;
		
		case "gerer_tarifs":

		$nav_en_cours = 'administration';
		$sortie=file("vue/application.html");
		require_once('modele/gerer_tarifs.php');

		break;
		
		case "gerer_utilisateurs":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'administration';
			$contenu =$typeUtilisateur->gererUtilisateurs();		// affichage avec toutes les valeurs
		break;
		
		case "tarifs":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'administration';

			require_once('modele/gerer_tarifs.php');

		break;
		// a partir de form 
		
		case "delete":
			require_once('modele/formulaires/delete.php');
		break;
		
		case "valider_tarif":
			require_once(" modele/formulaires/validation_tarif.php");
		break;
	 
		case "ajout_tarif":
			require_once("modele/formulaires/ajout_tarif.php");
		break;
		
		
	}


?>