<?php

if(!isset($login_session)) 	// condition de connexion
{
	header("location: index.php");	
} 
else
{
	
	$contenu=$posibility->ajout_voile();	// affichage par objet operateur 
}

?>