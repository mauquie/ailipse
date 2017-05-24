<?php


function menuNavigationVitrine() {
	

	$menu = '	<li><a onclick="scrollToAnchor("#prestations")">Prestations</a></li>

				<li><a onclick="scrollToAnchor("#tarifs")">Tarifs</a></li>

				<li><a href="index.php?d=vitrine&a=application">Application</a></li>

				<li><a href="index.php?d=vitrine&a=inscription">Inscription</a></li>

				<li><a onclick="scrollToAnchor("#contact")">Contact</a></li>';
		
	
	return ($menu);
		
}



function menuConnexionVitrine() { 			//Si déconnecté : On affiche connexion
	
	global $login_session;
	
	if(!isset($login_session)) {
		
		$menu = '<li class="cta"><a href="index.php?d=vitrine&a=connexion" target="blank">Se connecter</a></li>';
		
	} else {						//Si connecté : Bouton de déconnection
		
		$menu = '<li class="cta"><a href="index.php">Se déconnecter</a></li>';
		
	}
	
	return ($menu);
	
	
	
	
	
}