<?php

	switch($action)
	{
		case "application":
			$sortie=file("vue/application.html");
			if(!isset($login_session)){
				header('location: index.php?d=vitrine&a=connexion');
				$contenu='';
			}
			else{
			$sortie=file("vue/application.html");
			$nav_en_cours = "index";
			$contenu='<div class="content-index animated fadeInUp">Application web de modelisation de voiles pour parapentes <br/> <br/> <small>Version 0.1.0</small></div>';
			}
		break;
		
		case "recuperer_mdp":
			$vitrine->recupererMotDePasse();
			break;
		
		case "connexion":
			$sortie=file("vue/identification.html");
			$contenu=$vitrine->connexion();
		break;

		case "inscription":
			$sortie=file("vue/identification.html");
			$contenu=$vitrine->inscription();
		break;
		
		case "":
			$contenu = $vitrine->accueil();
			$contenu.= $vitrine->prestations();
			$contenu.= $vitrine->tarifs();
		break;
		
		default:
			//redirection page 404
			$contenu = "";
			$sortie = "";
	}

?>