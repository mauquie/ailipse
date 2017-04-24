<?php
if(!isset($login_session)) 	// condition de connexion
{
	header("location: index.php");	
} 
else
{
	
	$contenu=$posibility->ModifierVoile();	// affichage par objet operateur 
}

?>