<?php

	switch($action)
	{
		case "deconnexion":
			$sortie=file("vue/application.html");
			require_once('modele/logout.php');
		break;
		
		case "voile":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'voile';
			$contenu = file_get_contents("modele/modelisation/application.php");
		break;
		
		case "profil":
			$sortie=file("vue/application.html");
			$nav_en_cours = 'profil';
			$typeUtilisateur->recuData();
			$contenu = $typeUtilisateur->ModifierProfil();
			
			if((isset($_POST["email"]))&&(isset($_POST["verification"]))&&(isset($_POST["adresseExpedition"]))&&(isset($_POST["codePostalExpedition"]))&&(isset($_POST["villeExpedition"]))&&(isset($_POST["adresseFacturation"]))
					&&(isset($_POST["adresseFacturation"]))&&(isset($_POST["codePostalFacturation"]))&&(isset($_POST["villeFacturation"]))
					&&(isset($_POST["nom"]))&&(isset($_POST["prenom"]))&&(isset($_POST["telephone"])))
			{
				
				$typeUtilisateur->validerModifierProfil();
			}
		break;
		// a partir d'un form

		
		default:
			//redirection page 404
			$contenu = "";
			$sortie = "";
		break;
	}

?>