<?php

	switch($action)
	{
		case "valider_addmin":
			$sortie=file("vue/application.html");
			$contenu=$typeUtilisateur->ValidationVoileConstructeur();	// utilisation de la classe operateur 
		break;
		
		case "notifications":
			$sortie=file("vue/application.html");			
			$nav_en_cours = 'profil';
			$contenu=$notif->gestionNotifications();	// appel de la fonction de notificatio			
		break;
		
		case "menu":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'administration';
			$contenu=$typeUtilisateur->menuAdministration();	// affichage par objet operateur 
		break;
		
		case "voile":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'voile';
			$contenu = file_get_contents("modele/modelisation/application.php");
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
			$typeUtilisateur->supprimer();
		break;
		
		case "nouveau_client":
			$contenu = $typeUtilisateur->validationNouveauClient();
		break;
		
		case "modification_tarif":
			$typeUtilisateur->modificationTarif();
		break;
	 
		case "ajout_tarif":
			$typeUtilisateur->ajoutTarif();
		break;
		
		
		// pour les ajax 
		
		case "affiche":
			$contenu = "";
			$sortie="";
			$typeUtilisateur->gestionUtilisateursRecup();
		break;
		
		case "update_compte":
			$contenu="";
			$sortie="";
			$typeUtilisateur->gestionUtilisateursMAJ();
		break;
		
		case "select_compte":
			$contenu="";
			$sortie="";
			$typeUtilisateur->selectComptesNonActifs();
		break;
		
		case "activer":
			$contenu="";
			$sortie="";
			$typeUtilisateur->activer();
		break;
		
		default:
			//redirection page 404
			$contenu = "";
			$sortie = "";
		
		

		
		
	}
	
		/*//Ecriture du tarif ajouté dans le fichier logfile.txt
		date_default_timezone_set('Europe/Brussels');
		$logs = date('Y-m-d H:i:s').' --- Redirection vers la page "'.$action.'" par "'.$login_session."\r\n";
		//Ouverture du répertoire de destination
		$fichier = fopen ("modele/modelisation/logs/log_Admin.txt", "a+");
		//Copie du fichier
		fwrite($fichier, $logs);
		//Fermeture du fichier
		fclose ($fichier);
		//Fin écriture*/


?>