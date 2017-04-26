<?php
if(!class_exists("Utilisateur"))
{
	class Utilisateur extends Visiteur
	{
		//tous les attributs d'un utilisateur, operateur ou administrateur
		private $_nom;						//varchar 50
		public function __construct()
		{
		}
		public function setMail($email)	// recupere le mail de l'utilisateur utilisé apres l'initialisation 
		{
			$this->_email=$email;
		}
		public function recuData()
		{
			$connexionBdd=$this->OpenBDD();	//	ouverture de la base de données
			$sql="select * from clients where email='$this->_email'";
			$result = $connexionBdd->query($sql);	// execution de la requete 

			if ($result->num_rows > 0) 
			// output data of each row
				while($row = $result->fetch_assoc()) 
					$this->_email = $row["email"];				
					$this->_prenom = $row["prenom"];
					$this->_nom = $row["nom"];
					$this->_password = $row["password"];
					$this->_adresseExpedition = $row["rue_expedition"];
					$this->_villeExpedition = $row["ville_expedition"];
					$this->_codePostalExpedition = $row["code_postal_expedition"];
					$this->_adresseFacturation = $row["rue_facturation"];
					$this->_villeFacturation = $row["ville_facturation"];
					$this->_codePostalFacturation = $row["code_postal_facturation"];
					$this->_telephone=$row["telephone"];
					$this->_permissions = $row["permissions"];
				}
			} 
			$this->CloseBDD();		//fermeture de la base de données 
		}
		public function modifierProfil()		// essenciellement de l'affichage avec les valeurs du compte 
		{
			return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">
			// utilisation de modele/formulaires/update.php en POST pour valider les changements 
		}
		public function validerProfil($new_password,$verification,$rue_expedition,$code_postal_expedition,$ville_expedition,$rue_facturation,$code_postal_facturation,$ville_facturation)
		{
				// gestion du cryptage et des valeurs de la requete pour valider son profil 
				if(($new_password==$verification)&&($new_password!=""))
				{
					$new_password=sha1($verification);
					return "UPDATE clients SET password='$new_password', ville_expedition='$ville_expedition', rue_expedition='$rue_expedition',code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation' WHERE  email='$email'";
				}
				else
				{
					return "UPDATE clients SET ville_expedition='$ville_expedition', rue_expedition='$rue_expedition', code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation'  WHERE  email='$email'";
	
				}
		}
		public function visualiserControle() // COMING SOON
		{
			
			
			
			
		}
		public function deconnexion() // COMING SOON
		{
			
			
			
		}
	}
}

?>