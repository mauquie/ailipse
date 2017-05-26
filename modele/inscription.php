<?php

	$error=0;

	// connexion � la base de donn�es
	$bdd =  $visiteur->OpenBDD();
	
	// v�rification si le champ pseudo a bien �t� rempli
	if (isset($_POST['e-mail']))
	{
	 
	// Alors dans ce cas on met saisie du $_POST['pseudo'] dans la variable $pseudo
		$email = ($_POST['e-mail']);
		$pass = ($_POST['pass']);
		$confirm = ($_POST['confirm']);

		$query = $bdd->query("SELECT email FROM clients WHERE email='$email'");
		$num_row = $query->num_rows;
	 
		if ($num_row >= 1)
		{
			// Si l'email est d�j� utilis�e on retourne un code d'erreur
			$error=1;
			
		}
		else
		{			if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $pass))				{
					if($pass == $confirm)
					{
						// RECUPERATION des donnes de la base de donn�es
						$pass = sha1($_POST['pass']);
						$name = $_POST['name'];
						$surname = $_POST['surname'];
						$tel = $_POST['tel'];
						$ville = $_POST['ville'];
						$adresse = $_POST['adresse'];
						$cp = $_POST['cp'];
						
						// ajout a la basse de donner des client 
						$bdd->query("INSERT INTO clients VALUES('','$email','$pass','$name','$surname', '$tel', '$ville','$adresse','$cp','$ville','$adresse','$cp','default','1','0')");
						// ajoute une notification a  comptes 
						$bdd->query("UPDATE notifications SET comptes = comptes+1 WHERE id = 1");
						$error=3;
					}
					else{
						// Si les mots de passe ne sont pas identiques on retourne un code d'erreur
						$error=2;
					}				}					else{						$error=4;					}				}
		}


		
	$html="";
	// Appel du template de sortie
	$sortie = file("vue/inscription.html");
	$contenu= $visiteur->Inscription($error);	// gestion des erreurs avec la classe
	print $html;
	$visiteur->CloseBDD($bdd);// fermeture de la base de donn�es 
?>