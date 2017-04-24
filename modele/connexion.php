<?php

//session_start(); // on démarre la session
$error=0; // variable qui stocke les messages d'erreur
// si on appuie sur le bouton submit et que l'email ainsi que le mdp est vide
if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = 1;
	}
	else
	{
		// on définit les variables $email et $password
		$email=$_POST['email'];
		$password=$_POST['password'];
		// on crypte le mot de passe en utilisant SHA-1
		$password = sha1($password);
		// on établit la connexion avec le serveur par le biais de la base de données
		$connection = $visiteur->OpenBDD();
		// protection contre l'injection SQL
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = ($email);
		$password = ($password);

		// requête SQL qui vérifie que l'on a rentré un email et un mdp existant
		$query = $connection->query("select * from clients where password='$password' AND email='$email'");
		$rows = $query->num_rows;
		if ($rows == 1) {
			$_SESSION['login_user']=$email; // initialisation de la session

			header("location: index.php"); // on redirige vers une page à la connexion
		} else {
			$error = 1;
		}
		$visiteur->CloseBDD($connection); // on ferme la connexion avec la base de données
	}
}



$html="";
// Appel du template de sortie
$sortie=file("vue/connexion.html");

	
$contenu=$visiteur->Connextion($error);	// appel de la methode de gestion des erreurs 
print $html;

?>