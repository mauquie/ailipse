<?php
//////////////////////////////////////////////////////////////////////////////////
//																				//
//	Modèle :																	//
//		operateur.php																//
//																				//
//	Accessible à :																//
//		Operateur,																//
//		Administrateur															//
//																				//
//////////////////////////////////////////////////////////////////////////////////

// On vérifie que l'utilisateur est bien connecté, sinon on restreint l'accès
if(!isset($login_session)) {
	header("location: index.php");
} 
else
{
	$contenu=$posibility->MenuOperateur();	// utilisation de la classe operateur 
	
	

}
?>		