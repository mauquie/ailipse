<?php

	switch($action)
	{
		
		case "menu":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';			
			$typeUtilisateur->setMail($login_session);
			$typeUtilisateur->recuData();
			$contenu=$typeUtilisateur->MenuOperateur();	// utilisation de la classe operateur 
		break;
		
		case "ajout_constructeur":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu= $typeUtilisateur->AjoutConstructeur(); 	// affichage par methode de la classe operateur 			
		break;
		
		case "ajouter_voile":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu=$typeUtilisateur->ajoutVoile();	// affichage par objet operateur 			
		break;
		
		case "modifier_voile":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu=$typeUtilisateur->ModifierVoile();	// affichage par objet operateur 			
		break;
		
		case "ajout_materiaux":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu= $typeUtilisateur->AjoutMateriaux(); 
		break;
		
		case "controle_voile":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu= $typeUtilisateur->ControleVoile(); 
		break;
		
		
		
		// a partir d'un form 
		case "valider_materiel":
			require_once("modele/formulaires/valider_materiel.php");
		break;
		
		case "valider_voile":
			require_once("modele/formulaires/valider_voile.php");
		break;
		
		case "valider_constructeur":
			require_once("modele/formulaires/valider_constructeur.php");
		break;
		
		
		// pout les ajax (js)
		case "recupvoile":
			$contenu="";
			$sortie="";
			require_once("modele/formulaires/recupVoile.php");
		break;
		
		case"recupmateriaux":
			$contenu="";
			$sortie = "";
				require_once("modele/formulaires/recupMaterial.php");		
		break;
		
		default:
			//redirection page 404
			$contenu = "";
			$sortie = "";
	}

?>