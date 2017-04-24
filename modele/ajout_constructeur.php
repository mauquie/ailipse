<?php
if(!isset($login_session)) {	// condition de connexion 
	header("location: index.php");
} else {
$contenu= $posibility->AjoutConstructeur(); 	// affichage par methode de la classe operateur 
}
?>