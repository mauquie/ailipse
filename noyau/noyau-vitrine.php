<?php

	switch($action)
	{
		case "application":
			$sortie=file("vue/application.html");
			if(!isset($login_session)){
				header('Location: index.php?d=vitrine&a=connexion');
				$contenu='';
			}
			else{
			$sortie=file("vue/application.html");
			$nav_en_cours = "index";
			$contenu='<div class="content-index animated fadeInUp">Application web de modelisation de voiles pour parapentes <br/> <br/> <small>Version 0.1.0</small></div>';
			}
		break;
		
		
		
		case "connexion":
			require_once ('modele/connexion.php');
		break;

		case "inscription":

			require_once ('modele/inscription.php');

		break;
		
		case "":
			$contenu = $vitrine->accueil();
			$contenu.= $vitrine->prestations();
			$contenu.= $vitrine->tarifs();
		break;
	}

?>