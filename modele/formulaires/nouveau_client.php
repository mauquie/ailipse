<?php
	// connexion à la base de données
	$bdd =  $administrateur->OpenBDD();
	// vérification si le champ email a bien été rempli
	if (isset($_POST['email']))
	{
		$email = ($_POST['email']);
		$password = ($_POST['password']);
		$password_confirm = ($_POST['password_confirm']);
		$query = $bdd->query("SELECT email FROM clients WHERE email='$email'");
		$num_row = $query->num_rows;
		if ($num_row >= 1)
		{
			// Si l'email est déjà utilisée on retourne un code d'erreur
			echo "<script>alert('L\'adresse email est déjà utilisée. Veuillez la modifier afin de procéder à la création du client.');</script>";
		}
		else
		{
			if($password == $password_confirm)
			{
				// RECUPERATION des données de la base de données
			$password = sha1($_POST['password']);
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$telephone = $_POST['telephone'];
			$ville = $_POST['ville'];			$code_postal = $_POST['code_postal'];
			$adresse = $_POST['adresse'];			$operateur = $_POST['operateur'];						if ($operateur == 1)			{				$operateur = 2;			}			else			{				$operateur = 1;			}
			
			// ajout à la base de données des clients
			$bdd->query("INSERT INTO clients VALUES('','$email','$password','$nom','$prenom', '$telephone', '$ville','$adresse','$code_postal','$ville','$adresse','$code_postal','$operateur','1')");
			}
			else{
				// Si les mots de passe ne sont pas identiques on retourne un code d'erreur				echo "<script>alert('Les mots de passe ne sont pas identiques.');</script>";				
			}
		}
	}	
	$administrateur->CloseBDD($bdd);// fermeture de la base de données 
?>