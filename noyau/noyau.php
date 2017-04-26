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
include 'modele/classe_notification.php';
// Appel du template de sortie
$sortie=file("vue/vitrine.html");
global $login_session;

// Recuperation de l'action a effectuer
if (isset($_GET['a'])) $action=$_GET['a']; else $action="";

$visiteur=new Visiteur();	
$notif=new Notification();


	switch ($action) {
		// Si aucune action n'est envoyee dans l'URL on affiche l'accueil
		case "application":
			$nav_en_cours = "index";
			$contenu='<div class="content-index animated fadeInUp">Application web de modelisation de voiles pour parapentes <br/> <br/> <small>Version 0.1.0</small></div>';
			break;
			
		// Si l'action demandee est profil, on appelle le fichier profil.php
		case "profil":
			$nav_en_cours = 'profil';
		break;
		
		case "inscription":
			require_once ('modele/inscription.php');
		break;
		
		// Si l'action demandee est administration, on appelle le fichier administration.php
		case "administration":
			$nav_en_cours = 'administration';
		break;
		case "gerer_utilisateurs":
		// Si l'action demandee est connexion, on appelle le fichier connexion.php
		case "connexion":
			require_once ('modele/connexion.php');
		break;
		
		// Si l'action demandee est deconnexion, on appelle le fichier logout.php
		case "deconnexion":
			require_once('modele/logout.php');
		break;
		
		// Si l'action demandee est saisie, on appelle le fichier operateur.php
		case "operateur":
			$nav_en_cours = 'operateur';
		break;

		case "ajout_constructeur":
			$nav_en_cours = 'operateur';
		break;
		
		case "ajouter_voile":
			$nav_en_cours = 'operateur';

		break;
		
		case "modifier_voile":
			$nav_en_cours = 'operateur';

		break;
		
		case "ajout_materiaux":
			$nav_en_cours = 'operateur';
		break;
		
		
		// Si l'action demandee est notifications, on appelle le fichier gestion_notifications.php
		case "notifications":
			
		break;
		
		// Si l'action demandee est annonces, on appelle le fichier annonces.php
		case "annonces":
			$nav_en_cours = 'annonces';

		break;
		// Si l'action demandee est annonces, on appelle le fichier annonces.php
		case "creer_annonce":
			$nav_en_cours = 'annonces';

		break;

		case "voile":
			$nav_en_cours = 'voile';
			$contenu = file_get_contents("modele/modelisation/application.php");
		break;
	}
}
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
