<?php
//Initialisation de la page html
$html="";

// Include du menu
include 'modele/menu.php';
include 'modele/session.php';
include 'modele/classe_bdd.php';
include 'modele/classe_visiteur.php';
include 'modele/classe_utilisateur.php';
include 'modele/classe_operateur.php';
include 'modele/classe_admin.php';
include 'modele/classe_annonce.php';
include 'modele/classe_notification.php';include 'modele/classe_vitrine.php';
// Appel du template de sortie
$sortie=file("vue/vitrine.html");
global $login_session;

// Recuperation de l'action a effectuer
if (isset($_GET['a'])) $action=$_GET['a']; else $action="";

$visiteur=new Visiteur();	
$notif=new Notification();$vitrine=new Vitrine();

if(isset($login_session) || ($action =="") || ($action =="vitrine_tarifs") || ($action =="vitrine_prestations")	|| ($action =="vitrine_contact")|| ($action =="connexion")){
	switch ($action) {
		// Si aucune action n'est envoyee dans l'URL on affiche l'accueil
		case "application":			$sortie=file("vue/application.html");			if(!isset($login_session)){				header('Location: index.php?a=connexion');				$contenu='';			}			else{			$sortie=file("vue/application.html");			$nav_en_cours = "index";
			$contenu='<div class="content-index animated fadeInUp">Application web de modelisation de voiles pour parapentes <br/> <br/> <small>Version 0.1.0</small></div>';			}
			break;
		
		// Si l'action demandee est profil, on appelle le fichier profil.php
		case "profil":			$sortie=file("vue/application.html");
			$nav_en_cours = 'profil';			$typeUtilisateur->recuData();			$contenu = $typeUtilisateur->ModifierProfil();			
		break;
		
		case "inscription":
			require_once ('modele/inscription.php');
		break;
		
		// Si l'action demandee est administration, on appelle le fichier administration.php
		case "administration":			$sortie=file("vue/application.html");
			$nav_en_cours = 'administration';			$contenu=$typeUtilisateur->menuAdministration();	// affichage par objet operateur 			
		break;
		case "gerer_utilisateurs":			$sortie=file("vue/application.html");			$nav_en_cours = 'administration';			$contenu =$typeUtilisateur->gererUtilisateurs();		// affichage avec toutes les valeurs					break;				case "tarifs":			$sortie=file("vue/application.html");			$nav_en_cours = 'administration';			require_once('modele/gerer_tarifs.php');		break;				case "gerer_tarifs":		$nav_en_cours = 'administration';		$sortie=file("vue/application.html");		require_once('modele/gerer_tarifs.php');		break;
		// Si l'action demandee est connexion, on appelle le fichier connexion.php
		case "connexion":
			require_once ('modele/connexion.php');
		break;
		
		// Si l'action demandee est deconnexion, on appelle le fichier logout.php
		case "deconnexion":			$sortie=file("vue/application.html");
			require_once('modele/logout.php');
		break;
		
		// Si l'action demandee est saisie, on appelle le fichier operateur.php
		case "operateur":			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';				$contenu=$typeUtilisateur->MenuOperateur();	// utilisation de la classe operateur 			
		break;

		case "ajout_constructeur":			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';			$contenu= $typeUtilisateur->AjoutConstructeur(); 	// affichage par methode de la classe operateur 			
		break;
		
		case "ajouter_voile":			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
				$contenu=$typeUtilisateur->ajoutVoile();	// affichage par objet operateur 			
		break;
		
		case "modifier_voile":			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';
				$contenu=$typeUtilisateur->ModifierVoile();	// affichage par objet operateur 			
		break;
		
		case "ajout_materiaux":			$sortie=file("vue/application.html");
			$nav_en_cours = 'operateur';			$contenu= $typeUtilisateur->AjoutMateriaux(); 			
		break;
		
		
		// Si l'action demandee est notifications, on appelle le fichier gestion_notifications.php
		case "notifications":			$sortie=file("vue/application.html");
						$nav_en_cours = 'index';			$contenu=$notif->gestion_notif();	// appel de la fonction de notification			
		break;
		
		// Si l'action demandee est annonces, on appelle le fichier annonces.php
		case "annonces":			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->MenuAnnonce();	// affichage de menu des annonces par la classe annonces 			
		break;
		// Si l'action demandee est annonces, on appelle le fichier annonces.php
		case "creer_annonce":			$sortie=file("vue/application.html");
			$nav_en_cours = 'annonces';
			$contenu = $annonce->AjouterAnnonce();	// utilise la methode de la classe annonce 			
		break;				// Si l'action demandee est annonces, on appelle le fichier annonces.php		case "supprimer_annonce":			$sortie=file("vue/application.html");			$nav_en_cours = 'annonces';						$contenu = $annonce->SupprimerAnnonce();	// utilise la methode de la classe annonce								break;		// Si l'action demandee est annonces, on appelle le fichier annonces.php		case "visualiser_annonces":			$sortie=file("vue/application.html");			$nav_en_cours = 'annonces';				$contenu = $annonce->VisualiserAnnonces();	// utilise la methode de la classe annonce									break;					case "visualiser_annonces2":			$sortie=file("vue/application.html");			$nav_en_cours = 'annonces';							$contenu = $annonce->VisualiserAnnonces2();	// utilise la methode de la classe annonce								break;

		case "voile":			$sortie=file("vue/application.html");
			$nav_en_cours = 'voile';
			$contenu = file_get_contents("modele/modelisation/application.php");
		break;				case "":			$contenu = $vitrine->accueil();		break;				case "vitrine_tarifs":			$contenu = $vitrine->tarifs();		break;				case "vitrine_prestations":			$contenu = $vitrine->prestations();		break;				case "vitrine_contact":			$contenu = $vitrine->contact();		break;
	}	//Ecriture du tarif ajouté dans le fichier logfile.txt	$logs = date('Y-m-d H:i:s').' --- Redirection vers la page "'.$action.'"'."\r\n";	//Ouverture du répertoire de destination	$fichier = fopen ("modele/modelisation/logs/logfile.txt", "a+");	//Copie du fichier	fwrite($fichier, $logs);	//Fermeture du fichier	fclose ($fichier);	//Fin écriture
}else{		header('Location: index.php?a=connexion');}
$notif->updateNotif();
//Transformation de la page index, les balises sont remplacees
foreach ($sortie as $valeur) {
	$valeur=preg_replace('/{#CONTENU}/',$contenu,$valeur);
	$valeur=preg_replace('/{#NOTIFICATIONS}/',$notif->notifications(),$valeur);
	$valeur=preg_replace('/{#MENU_PROFIL}/',menuProfil(),$valeur);
	$valeur=preg_replace('/{#MENU_NAVIGATION}/',menuNavigation(),$valeur);
	$valeur=preg_replace('/{#MENU_CONNEXION}/',menuConnexion(),$valeur);
	$html.=$valeur;
}
//Affichage final de la page index modifiee
print $html;

?>

