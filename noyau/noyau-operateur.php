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
		
		case "suivi":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu= $typeUtilisateur->suiviVoile(); 
		break;
		
		case "creer_suivi":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu= $typeUtilisateur->creerSuiviVoile(); 
		break;
		
		
		case "activer_voile":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
			$contenu= $typeUtilisateur->affichage_validation();
			break;
		
		
		
		// a partir d'un form 
		case "valider_materiel":
			$contenu="";
			$sortie="";
			$typeUtilisateur->valider_materiel();
		break;
		
		case "valider_voile":
			$contenu="";
			$sortie="";
			$typeUtilisateur->valider_voile();
		break;
		
		case "valider_constructeur":
			$contenu="";
			$sortie="";
			$typeUtilisateur->valider_constructeur();
		break;
			
		case "valider_controle":
			$contenu="";
			$sortie="";
			$typeUtilisateur->ValideControleVoile();
		break;
		
		case "valider_creer_suivi":
			$contenu="";
			$sortie="";
			$contenu= $typeUtilisateur->validerCreerSuivi($login_session);
		break;
		
		case "valider_modifier_voile":
			$contenu="";
			$sortie="";
			$typeUtilisateur->validerModificationVoile();
			break;
		
		
		// pout les ajax (js)
		case "recuperer_voile":
			$contenu="";
			$sortie="";
			$typeUtilisateur->recuperer_voile();
		break;
		
		case"recuperer_materiaux":
			$contenu="";
			$sortie = "";
			$typeUtilisateur->recuperer_materiaux();
		break;
		
		case "recuperer_suivi":
			$contenu="";
			$sortie = "";
			$typeUtilisateur->recupererSuivi();
		break;
		
		case "recuperer_evenements_suivi":
			$contenu="";
			$sortie = "";
			$typeUtilisateur->recupererEvenementsSuivis();
			break;
			
		case "ajouter_evenement_suivi":
			$contenu="";
			$sortie = "";
			$typeUtilisateur->ajouterEvenementSuivi($login_session);
		break;
		
		default:
			//redirection page 404
			$contenu = "";
			$sortie = "";
	}

?>
