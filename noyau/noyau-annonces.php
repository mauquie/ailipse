<?php

	switch($action)
	{
		
		case "menu":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->MenuAnnonce();	// affichage de menu des annonces par la classe annonces 
			

		break;
		
		case "creer_annonce":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->AjouterAnnonce();	// utilise la methode de la classe annonce 

			
		break;
		
		
		case "supprimer_annonce":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->SupprimerAnnonce();	// utilise la methode de la classe annonce

					
		break;
		
		case "visualiser_annonces":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->VisualiserAnnonces();	// utilise la methode de la classe annonce

			
		break;
		
		case "visualiser_annonces2":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->VisualiserAnnonces2();	// utilise la methode de la classe annonce	
		break;
		
		// a partir d'un form 
		case "confirm_annonce":
			require_once('modele/formulaires/confirm_annonce.php');
		break;
		
	}


?>