<?php

//////////////////////////////////////////////////////////////////////////////////

//																				//

//	Modèle :																	//

//		supprimer_annonce.php													//

//																				//

//	Accessible à :																//

//		Utilisateur,															//

//		Operateur,																//

//		Administrateur															//

//																				//

//////////////////////////////////////////////////////////////////////////////////



// On vérifie que l'utilisateur est bien connecté, sinon on restreint l'accès

if(!isset($login_session)) {		// doit etre connecté pour accéder à la page
	
	header("location: index.php");
	
} else {
	
	
	
	$contenu = $annonce->SupprimerAnnonce();	// utilise la methode de la classe annonce
	
	
	
	
	
}

?>		