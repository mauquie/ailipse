<?php
include 'modele/classe_bdd.php';
include 'modele/classe_visiteur.php';
include 'modele/classe_utilisateur.php';
include 'modele/classe_operateur.php';
include 'modele/classe_admin.php';
include 'modele/classe_annonce.php';
// on établit la connexion avec le serveur par le biais de la base de données
$basse=new BDD();
$connection = $basse->OpenBDD();
// on sélectionne la base de données
session_start();// Starting Session
// on garde en mémoire la session
if (isset($_SESSION['login_user'])) {
	$user_check=$_SESSION['login_user'];
	// requête SQL qui complète les informations de l'utilisateur
	$ses_sql=$connection->query("select email from clients where email='$user_check'");
	$row = $ses_sql->fetch_assoc();
	$login_session =$row['email'];
	$ses_sql=$connection->query("select * from clients where email='$user_check'");
	$row = $ses_sql->fetch_assoc();
	$prenom =$row['prenom'];
	$permissions =$row['permissions'];
	switch($permissions)
	{
		case 1:
		$posibility= new user();
		break;
		
		case 2:
		$posibility=new operateur();
		break;
		
		case 3:
		$posibility=new admin();
		
		break;
		
		case 0:
		
		break;
		
		default:
		
		break;
	}
	$posibility->SetMail($login_session);  
	$annonce=new annonce(); //Crée un objet annonce

	$basse->CloseBDD($connection);	// on ferme la connexion à la base de données
	unset($basse);
}