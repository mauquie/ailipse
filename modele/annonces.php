<?php
//////////////////////////////////////////////////////////////////////////////////
//																				//
//	Modèle :																	//
//		profil.php																//
//																				//
//	Accessible à :																//
//		Utilisateur,															//
//		Operateur,																//
//		Administrateur															//
//																				//
//////////////////////////////////////////////////////////////////////////////////

// On vérifie que l'utilisateur est bien connecté, sinon on restreint l'accès
if(!isset($login_session)) //condition de connexion 
{
	header("location: index.php");
} else {
	$contenu = $annonce->MenuAnnonce();	// affichage de menu des annonces par la classe annonces

	}
?>		