<<<<<<< HEAD
<?php//Initialisation de la page html$html="";// Include du menuinclude 'modele/menu.php';include 'modele/session.php';include 'modele/classe_bdd.php';include 'modele/classe_visiteur.php';include 'modele/classe_utilisateur.php';include 'modele/classe_operateur.php';include 'modele/classe_admin.php';include 'modele/classe_annonce.php';include 'modele/classe_notification.php';include 'modele/classe_vitrine.php';// Appel du template de sortie$sortie=file("vue/vitrine.html");global $login_session;// Recuperation de l'action a effectuerif (isset($_GET['d'])) $domaine=$_GET['d']; else $domaine="vitrine";if (isset($_GET['a'])) $action=$_GET['a']; else $action="";$visiteur=new Visiteur();$notif=new Notification();$vitrine=new Vitrine();if((isset($login_session)) ||(($domaine=="vitrine")&&($action!="application"))){	switch($domaine) 	{				case "administrateur":			require_once("noyau-administrateur.php");			break;					case "operateur":			require_once("noyau-operateur.php");			break;					case "vitrine":			require_once("noyau-vitrine.php");			break;					case "annonces":			require_once("noyau-annonces.php");			break;					case "utilisateur":			require_once("noyau-utilisateur.php");			break;					default:						break;									//Ecriture du tarif ajouté dans le fichier logfile.txt			$logs = date('Y-m-d H:i:s').' --- Redirection vers la page "'.$domaine.'"'."\r\n";			//Ouverture du répertoire de destination			$fichier = fopen ("modele/modelisation/logs/log_Visitor.txt", "a+");			//Copie du fichier			fwrite($fichier, $logs);			//Fermeture du fichier			fclose ($fichier);			//Fin écriture	}	}else{	header("location: index.php?d=vitrine&a=connexion");}$notif->updateNotif();//Transformation de la page index, les balises sont remplaceesif(gettype($sortie)=="array"){
	//On récupère le contenu avant le foreach pour ne pas répéter les fonctions
	$notifications = $notif->notifications();
	$menuProfil = menuProfil();
	$menuNavigation = menuNavigation();
	$menuConnexion = menuConnexion();
	foreach ($sortie as $valeur) {
		
		$valeur=preg_replace('/{#CONTENU}/',$contenu,$valeur);
		
		$valeur=preg_replace('/{#NOTIFICATIONS}/',$notifications,$valeur);
		
		$valeur=preg_replace('/{#MENU_PROFIL}/',$menuProfil,$valeur);
		
		$valeur=preg_replace('/{#MENU_NAVIGATION}/',$menuNavigation,$valeur);
		
		$valeur=preg_replace('/{#MENU_CONNEXION}/',$menuConnexion,$valeur);
		
		$html.=$valeur;
	}
}
//Affichage final de la page index modifieeprint $html;?>

