<?php 
if(!class_exists("visiteur"))
{
	
	class visiteur extends BDD
	{ 
		
		public function __construct()
		{
		}
		

		
		public function Connextion($error)		// gestion des erreurs due a la connexion 
		{

			if ($error == 1) {
			return '<div class="alert alert-danger fade in animated shake">
					<strong>Nom d&#145;utilisateur</strong> ou <strong>mot de passe</strong> incorrect. Veuillez réessayer.
					</div>';
			}else 
			{
				return  '';
			}
			
			
		}
		public function Inscription($error)		// gestion d'erreur ou succes de l'inscription
		{	
		

			if($error==0)
			{
				return  '';
			} 
			else 
			{
				if($error==1) 
				{
					return   '<div class="alert alert-danger fade in animated shake"><strong>E-Mail</strong> déjà utilisé. Veuillez réessayer.</div>';
				}
				else if($error == 2)
				{
					return  '<div class="alert alert-danger fade in animated shake">Les<strong> mots de passe</strong> ne correspondent pas. Veuillez réessayer.</div>';
				}
				else if($error == 3)
				{
					return  '<div class="alert alert-success fade in animated shake"><p>Compte créé avec <strong>succès</strong>.</p> <p>Un administrateur va procéder à la validation de votre compte.</p> <p>Vous allez être redirigé dans 5 secondes.</p></div>';
					header("refresh:5;url=index.php");
				}

				
			}


		}
		public function VisualerVoile($numSerial) // COMING SOON
		{
			
		}
		
	}

}

?>