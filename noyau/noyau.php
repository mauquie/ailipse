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
$sortie=file("vue/mainvue.php");
global $login_session;

// Recuperation de l'action a effectuer
if (isset($_GET['a'])) $action=$_GET['a']; else $action="";

$visiteur=new visiteur();	
$notif=new notification();


switch ($action) {
	// Si aucune action n'est envoyee dans l'URL on affiche l'accueil
	case "":		if(!isset($login_session)){			header('Location: index.php?a=connexion');			$contenu='';		}		else{
		$nav_en_cours = "index";
		$contenu='<div class="content-index animated fadeInUp">Application web de modelisation de voiles pour parapentes <br/> <br/> <small>Version 0.1.0</small></div>';		}
		break;
		
	// Si l'action demandee est profil, on appelle le fichier profil.php
	case "profil":
		$nav_en_cours = 'profil';
		require_once('modele/profil.php');
	break;
	
	// Fait en classe !!!!!!!!! avec la class 
	case "inscription":
		require_once ('modele/inscription.php');
	break;
	
	// Si l'action demandee est administration, on appelle le fichier administration.php
	case "administration":
		$nav_en_cours = 'administration';
		require_once('modele/administration.php');
	break;
	
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
		require_once('modele/operateur.php');
	break;

	case "ajout_constructeur":
		$nav_en_cours = 'operateur';
		require_once('modele/ajout_constructeur.php');
	break;
	
	case "ajouter_voile":
		$nav_en_cours = 'operateur';
		require_once('modele/ajoutvoile.php');
	break;
	
	case "modifier_voile":
		$nav_en_cours = 'operateur';
		require_once('modele/modifiervoile.php');
	break;
	
		case "ajout_materiaux":
		$nav_en_cours = 'operateur';
		require_once('modele/ajoutmateriaux.php');
	break;
	
	
	// Si l'action demandee est notifications, on appelle le fichier gestion_notifications.php
	case "notifications":
		require_once('modele/gestion_notifications.php');		$nav_en_cours = 'index';
	break;
	
	// Si l'action demandee est annonces, on appelle le fichier annonces.php
	case "annonces":
		$nav_en_cours = 'annonces';
		require_once('modele/annonces.php');
	break;
	// Si l'action demandee est annonces, on appelle le fichier annonces.php
	case "creer_annonce":
		$nav_en_cours = 'annonces';
		require_once('modele/creer_annonce.php');
	break;		// Si l'action demandee est annonces, on appelle le fichier annonces.php	case "supprimer_annonce":				$nav_en_cours = 'annonces';				require_once('modele/supprimer_annonce.php');				break;	// Si l'action demandee est annonces, on appelle le fichier annonces.php	case "visualiser_annonces":				$nav_en_cours = 'annonces';				require_once('modele/visualiser_annonces.php');				break;			case "visualiser_annonces2":				$nav_en_cours = 'annonces';				require_once('modele/visualiser_annonces2.php');				break;
	
	
	case "voile":
		$nav_en_cours = 'voile';
		$contenu = file_get_contents("modele/modelisation/application.php");
	break;
	
	
	case "tarifs":
		$nav_en_cours = 'gestion_tarifs';
		require_once('modele/gestion_tarifs.php');
	break;;

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

