<?php
if(!class_exists("user"))
{
	class user extends visiteur
	{
		//tous les attributs d'un utilisateur, operateur ou administrateur
		private $nom;			//varchar 50
		private $prenom;		//varchar 50
		private $telephone;			//varchar 10
		private $email;			//varchar 255
		private $villeFacturation;		//varchar 80
		private $adresseFacturation;		//varchar 80
		private $codePostalFacturation;		//varchar 5
		private $villeExpedition;		//varchar 80
		private $adresseExpedition;		//varchar 80
		private $codePostalExpedition;		//varchar 5
		private $permissions;	// int 1
		
		public function __construct()
		{
		}
		public function SetMail($maile)	// recupere le mail de l'utilisateur utilisé apres l'initialisation 
		{
			$this->email=$maile;
		}
		public function recuData()
		{
			$conec=$this->OpenBDD();	//	ouverture de la base de données
			$sql="select * from clients where email='$this->email'";
			$result = $conec->query($sql);	// execution de la requete 

			if ($result->num_rows > 0) {		// verification que le compte existe 
			// output data of each row
			while($row = $result->fetch_assoc()) {			// recuperation de tous les parametres
			$this->email = $row["email"];				
			$this->prenom = $row["prenom"];
			$this->nom = $row["nom"];
			$this->password = $row["password"];
			$this->adresseExpedition = $row["rue_expedition"];
			$this->villeExpedition = $row["ville_expedition"];
			$this->codePostalExpedition = $row["code_postal_expedition"];
			$this->adresseFacturation = $row["rue_facturation"];
			$this->villeFacturation = $row["ville_facturation"];
			$this->codePostalFacturation = $row["code_postal_facturation"];
			$this->telephone=$row["telephone"];
			$this->permissions = $row["permissions"];
    }
} 
			$this->CloseBDD($conec);		//fermeture de la base de données 
		}
		public function ModifierProfil()		// essenciellement de l'affichage avec les valeurs du compte 
		{
			return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">	<div class="mdl-card__title mdl-card-annonces__background animated slideInDown">	<h2 class="mdl-card__title-text">'.$this->prenom.' '.$this->nom.'</h2>	</div>			<div class="mdl-card__supporting-text card-background">				<form action="modele/Forme/update.php" method="post">				<div id="alert" >		</div>				<h5>Modifiez vos informations personnelles</h5>		<div class="content-grid mdl-grid">			<div class="mdl-cell">				<h6>Identifiants de connexion</h6>										  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="email" class="mdl-textfield__input" id="email" type="text" value="'.$this->email.'" disabled>					<label class="mdl-textfield__label" for="sample3">Adresse E-mail</label>				  </div>				  				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="password" id="password" class="mdl-textfield__input" type="password">					<label class="mdl-textfield__label" for="sample3">Mot de passe</label>				  </div>				  				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="verification" id="password_check" class="mdl-textfield__input" type="password">					<label class="mdl-textfield__label" for="sample3">Confirmation du mot de passe</label>				  </div>				  						</div>						<div class="mdl-cell">				<h6>Données personnelles</h6>								  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="nom" class="mdl-textfield__input" id="nom" type="text" value="'.$this->nom.'" required="required">					<label class="mdl-textfield__label" for="sample3">Nom</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="prenom" class="mdl-textfield__input" id="prenom" type="text" value="'.$this->prenom.'" required="required">					<label class="mdl-textfield__label" for="sample3">Prénom</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="telephone" class="mdl-textfield__input" id="telephone" type="text" value="'.$this->telephone.'" required="required">					<label class="mdl-textfield__label" for="sample3">Téléphone</label>				  </div>				  			</div>						<div class="mdl-cell animated slideInRight">				<br/><br/><br/>				<img src="vue/images/profil_account.png" height="200px" width="200px">			</div>						<div class="mdl-cell">				<h6>Adresse de facturation</h6>								  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="adresseFacturation" class="mdl-textfield__input" id="adresseFacturation" type="text" value="'.$this->adresseFacturation.'" required="required">					<label class="mdl-textfield__label" for="sample3">Adresse</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="villeFacturation" class="mdl-textfield__input" id="villeFacturation" type="text" value="'.$this->villeFacturation.'" required="required">					<label class="mdl-textfield__label" for="sample3">Ville</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="codePostalFacturation" class="mdl-textfield__input" id="codePostalFacturation" type="text" value="'.$this->codePostalFacturation.'" required="required">					<label class="mdl-textfield__label" for="sample3">Code postal</label>				  </div>			</div>						<div class="mdl-cell">				<h6>Adresse d\'expédition</h6>								  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="adresseExpedition" class="mdl-textfield__input" id="adresseExpedition" type="text" value="'.$this->adresseExpedition.'" required="required">					<label class="mdl-textfield__label" for="sample3">Adresse</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="villeExpedition" class="mdl-textfield__input" id="villeExpedition" type="text" value="'.$this->villeExpedition.'" required="required">					<label class="mdl-textfield__label" for="sample3">Ville</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="codePostalExpedition" class="mdl-textfield__input" id="codePostalExpedition" type="text" value="'.$this->codePostalExpedition.'" required="required">					<label class="mdl-textfield__label" for="sample3">Code postal</label>				  </div>			</div>						<div class="mdl-cell animated slideInRight">				<br/><br/><br/>				<img src="vue/images/profil_shipping.png" height="200px" width="200px">			</div>									<div class="mdl-card__actions mdl-card--border card-background2 animated slideInUp">			<center>				<button  type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">					Valider les modifications apportées				</button>			</center>			</form>			<div/>	</div></div>');
			// utilisation de modele/Forme/update.php en POST pour valider les changements 
		}
		public function ValiderProfil($new_password,$verification,$rue_expedition,$code_postal_expedition,$ville_expedition,$rue_facturation,$code_postal_facturation,$ville_facturation)
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
		public function VisualiserControle() // COMING SOON
		{
			
			
			
			
		}
		public function SoumettreAnnonce() // COMING SOON
		{
			
		}
		public function Deconnexion() // COMING SOON
		{
			
			
			
		}
	}
}

?>