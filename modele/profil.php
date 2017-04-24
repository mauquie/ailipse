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
if(!isset($login_session)) {
	header("location: index.php");
} else {
	global $success;
	 $posibility->recuData();
	$contenu = $posibility->ModifierProfil();

if ($success == 1) {
	echo '
	<div class="alert alert-success fade in">
	  Compte créé avec <strong>succès</strong>
	</div>';
}
	}


?>		