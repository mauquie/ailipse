<?php

if(!class_exists("Visiteur"))
{
	
	class Visiteur extends Bdd
	{
		
		public function __construct()
		{
			
		}
		
		public function connexion($error)		// gestion des erreurs due a la connexion
		{
			
			
			
			if ($error == 1) {
				
				return '<div class="alert alert-danger fade in animated shake">
						
					<strong>Nom d\'utilisateur</strong> ou <strong>mot de passe</strong> incorrect. Veuillez réessayer.
						
					</div>';
				
			}else
			
			{
				
				return  '';
				
			}
			
		}
		
		public function inscription($error)		// gestion d'erreur ou succes de l'inscription
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
					// On redirige vers la page d'accueil en affichant un message de succès pour la création de compte
					return  '<div class="alert alert-success fade in animated shake"><p>Compte créé avec <strong>succès</strong>.</p> <p>Un administrateur va procéder à la validation de votre compte.</p> <p>Vous allez être redirigé dans 5 secondes.</p></div>'.header("Refresh:5; url=index.php");;
					
				}
				else if($error == 4)
				
				{
					return  '<div class="alert alert-danger fade in animated shake">Le<strong> mot de passe</strong> doit contenir au moins une majuscule, une minuscule et un chiffre. Veuillez réessayer.</div>';
					
				}
				
			}
		}
		
		public function visualiserVoile($numSerial) // COMING SOON
		{
			
			
			
		}
	}
}



?>
