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
			$contenu = $annonce->SupprimerAnnonce($login_session);	// utilise la methode de la classe annonce

					
		break;
		
		case "visualiser_annonce":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->VisualiserAnnonces();	// utilise la methode de la classe annonce

			
		break;
		
		
		case "rechercher_annonce":
			$sortie =file("vue/application.html");
			$nav_en_cours = 'annonces';
			if(isset($_POST["selRegion"])&&isset($_POST["marque"])&&isset($_POST["modele"])&&isset($_POST["prixMin"])&&isset($_POST["prixMax"])&&isset($_POST["anneeMin"])&&isset($_POST["anneeMax"])){
				$contenu = $annonce->rechercherAnnonces();
			}
			else{$contenu = $annonce->MenuAnnonce();}
		break;
		 
		case "confirm_annonce":
			$sortie="";
			$contenu="";
			$annonce->confirmAnnonce();
		break;
		
		// Ajax
		case"select_annonce":
			$sortie="";
			$contenu="";
			$annonce->selectAnnonces();
		break;
		
		case"select_marque":
			$sortie="";
			$contenu="";
			$annonce->selectMarque();
			break;
			
		case"select_modele":
			$sortie="";
			$contenu="";
			$annonce->selectModele();
			break;
		case"validation_suppression_annonce":
			$sortie="";
			$contenu="";
			$annonce->validationSuppressionAnnonce();
			break;
		
		default:
			//redirection page 404
			$contenu = "";
			$sortie = "";
		
	}


?>