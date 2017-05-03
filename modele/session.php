<?php
include 'modele/classe_bdd.php';
include 'modele/classe_visiteur.php';
include 'modele/classe_utilisateur.php';
include 'modele/classe_operateur.php';
include 'modele/classe_admin.php';
include 'modele/classe_annonce.php';
// on �tablit la connexion avec le serveur par le biais de la base de donn�es
$baseDeDonnees=new bdd();
$connexionBdd = $baseDeDonnees->openBDD();
// on s�lectionne la base de donn�es
session_start();// Starting Session
// on garde en m�moire la session
if (isset($_SESSION['login_user'])) {
	$user_check=$_SESSION['login_user'];
	// requ�te SQL qui compl�te les informations de l'utilisateur
	$ses_sql=$connexionBdd->query("select email from clients where email='$user_check'");
	$row = $ses_sql->fetch_assoc();
	$login_session =$row['email'];
	$ses_sql=$connexionBdd->query("select * from clients where email='$user_check'");
	$row = $ses_sql->fetch_assoc();
	$prenom =$row['prenom'];
	$permissions =$row['permissions'];
	switch($permissions)
	{
		case 1:
		$typeUtilisateur= new utilisateur();		$logfile = "log_User.txt";
		break;
		
		case 2:
		$typeUtilisateur=new operateur();		$logfile = "log_Operator.txt";
		break;
		
		case 3:
		$typeUtilisateur=new administrateur();		$logfile = "log_Admin.txt";
		
		break;
		
		case 0:
		
		break;
		
		default:
		
		break;
	}
	$typeUtilisateur->SetMail($login_session);  
	$annonce=new annonce(); //Cr�e un objet annonce
	$baseDeDonnees->closeBDD();	// on ferme la connexion � la base de donn�es
}