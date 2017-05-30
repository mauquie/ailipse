<?php
if(!class_exists("Vitrine")){
	class Vitrine extends Bdd{
		public function __construct()
		{
		}
		public function prestations(){
			return '<div id="prestations" class="superbackground">
							<br/>
							<div class="col-md-12 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0 text-center">
								<h2 style="color:white; margin-top:100px; text-shadow:0 0 5px #000">Contrôle et révision</h2>
							</div>
					
						<div class="container fadeInLoad">
							<div class="row">
								<div class="fh5co-spacer fh5co-spacer-sm"></div>
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Identification du matériel</center></a></h3>
											<p><center>Après la prise en charge de l’aile, nous procèdons à un examen visuel du parapente afin de l’identifier à l’aide des documents officiels du fabricant et de la fiche signalétique du modèle. Quel que soit le niveau de révision choisi, le faisceau de suspente et l’aile sont examinés visuellement.</center></p>
										</div>
									</div>
								</div>
					
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Mesure de la porosité</center></a></h3>
											<p><center>Nous effectuons une série de mesures de la porosité sur l’extrados et l’intrados. Les points de mesure sont effectués à environ 15 cm derrière le bord d’attaque de l’aile.</center></p>
										</div>
									</div>
								</div>
					
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Contrôle de la résistance du tissus a la déchirure</center></a></h3>
											<p><center>La vérification de la résistance de la voilure est réalisée à l’aide du dynamomètre Bettsometer. Lors de cette vérification, on perce un trou de la taille d’une aiguille dans l’extrados, dans la zone du bord d’attaque, puis on vérifie la résistance à la propagation du déchirement de la toile.</center></p>
										</div>
									</div>
								</div>
					
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Contrôle de la résistance des suspentes</center></a></h3>
											<p><center>Pour effectuer ce contrôle, nous démontons des suspentes centrales avant (les plus sollicitées). Elles sont alors cassées mécaniquement, puis remplacées. Si les valeurs minimales ne sont pas atteintes, toutes les suspentes du même type ou du même diamètre peuvent être remplacées.</center></p>
										</div>
									</div>
								</div>
					
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Mesure de la longueur du cône de suspentage</center></a></h3>
											<p><center>On mesure les longueurs totales des suspentes d’une demi-aile. La mesure du côté opposé de l’aile est réalisée par comparaison symétrique. Toutes ces mesures sont faites avec un appareil de mesure au laser (Leica).</center></p>
										</div>
									</div>
								</div>
					
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Examen approfondi de l’aile</center></a></h3>
											<p><center>L’extrados et l’intrados ainsi que le bord d’attaque et les nervures (y compris les éventuelles nervures en V), les coutures et les évents sont examinés pour y déceler déchirures, zones de cisaillement, endommagements du revêtement, zones réparées et autres caractéristiques frappantes.</center></p>
										</div>
									</div>
								</div>
					
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Contrôle des élévateurs</center></a></h3>
											<p><center>Les deux élévateurs sont vérifiés afin d’y déceler zones de cisaillement, déchirures et zones de forte usure.</center></p>
										</div>
									</div>
								</div>
					
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Etablissement du rapport de vérification</center></a></h3>
											<p><center>Tous les travaux de réparation sur l’aile sont intégralement documentés dans le rapport de vérification. Avant la livraison, l’état général de l’aile est évalué et sa durée de vie estimée.</center></p>
										</div>
									</div>
								</div>
								<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
									<div class="col-md-4 col-sm-6 fh5co-property ">
										<div class="fh5co-property-innter">
											<h3><a><center>Et bien plus encore...</center></a></h3>
											<p><center>On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas On sait pas </center></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
		}
		public function tarifs (){
			$contenu = '<div id="tarifs" class="tableau">
					
								<h1 style="color: white; margin-top:70px; text-shadow:0 0 5px #000;">Tarifs public à partir du 1er septembre 2014.</h1>
								<br/>
								<div class="fondgris">Tarifs atelier lors d\'une révision</div>
									<table class="table table-bordered">
										<tr>
											<th width="50%" align="center"></th>
											<th width="15%" align="center">Tarif HT</th>
											<th width="15%" align="left">Tarif TTC</th>
											<th width="10%" align="left">% Pro</th>
										</tr>';
			try
			{
				// On se connecte à MySQL
				$bdd= $this->openBDD();
			}
			catch(Exception $e)
			{
				// En cas d\'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
			}
			
			// Si tout va bien, on peut continuer
			
			// On récupère tout le contenu de la table jeux_video
			$reponse = $bdd->query('SELECT * FROM tarifs_revision');
			
			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch_array())
			{
				$contenu.="<tr>";
				if($donnees['id']==2||$donnees['id']==4)
				{
					$contenu.='<td align="right">'.$donnees["nom"].':</td>
										<td align="center" valign="top">'.$donnees["tarifht"].'€</td>
										<td align="center" valign="top">'.$donnees["tarifttc"].'€</td>
										<td align="center" valign="top">'.$donnees["pourcent"].'%</td>';
				}
				else
				{
					$contenu.='<td align="left">'.$donnees["nom"].':</td>
							<td align="center" valign="top">'.$donnees["tarifht"].'€</td>
							<td align="center" valign="top">'.$donnees["tarifttc"].'€</td>
							<td align="center" valign="top">'.$donnees["pourcent"].'%</td>';
				}
				$contenu.='</tr>';
				if($donnees["id"]==7||$donnees["id"]==9)
				{
					$contenu.='<td></br></td>';
				}
			}
			
			$contenu.='</table>
					
    <p id="infotarif" align="left" style="text-shadow:0 0 5px #fff;">* Le tarif atelier est appliqué lorsque les coûts de révision d\'une voile dépassent 150€ TTC</p>
					
    <div class="fondgris">Tarifs atelier réparation</div>
    <table class="table table-bordered">
        <tr>
            <th width="50%" align="center"></th>
            <th width="15%" align="center">Tarif HT</th>
            <th width="15%" align="left">Tarif TTC</th>
            <th width="10%" align="left">% Pro</th>
        </tr>';
			
			try
			{
				// On se connecte à MySQL
				$bdd= $this->openBDD();
			}
			catch(Exception $e)
			{
				// En cas d\'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
			}
			
			// Si tout va bien, on peut continuer
			
			// On récupère tout le contenu de la table jeux_video
			$reponse = $bdd->query('SELECT * FROM tarifs_reparation');
			
			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch_array())
			{
				$contenu.='<tr>';
				if($donnees['id']==2||$donnees['id']==3)
				{
					$contenu.='<td align="right">'.$donnees["nom"].':</td>
							<td align="center" valign="top">'.$donnees["tarifht"].'€</td>
							<td align="center" valign="top">'.$donnees["tarifttc"].'€</td>
							<td align="center" valign="top">'.$donnees["pourcent"].'%</td>';
				}
				else
				{
					$contenu.='<td align="left">'.$donnees["nom"].':</td>
							<td align="center" valign="top">'.$donnees["tarifht"].'€</td>
							<td align="center" valign="top">'.$donnees["tarifttc"].'€</td>
							<td align="center" valign="top">'.$donnees["pourcent"].'%</td>';
				}
				
				$contenu.='</tr>';
				if($donnees["id"]==3||$donnees["id"]==5)
				{
					$contenu.='<td></br></td>';
					
				}
			}
			
			$contenu.='</table>
					
<p id="infotarif" align="left" style="text-shadow:0 0 5px #fff;">* Le tarif atelier est appliqué lorsque les coûts de révision d\'une voile dépassent 150€ TTC</p>
<div class="fondgris">Tarifs articles</div>
<table class="table table-bordered">
					
        <tr>
            <th width="50%" align="center"></th>
            <th width="15%" align="center">Tarif HT</th>
            <th width="15%" align="center">Tarif TTC</th>
            <th width="10%" align="center">% Pro</th>
        </tr>';
			
			try
			{
				// On se connecte à MySQL
				$bdd= $this->openBDD();
			}
			catch(Exception $e)
			{
				// En cas d\'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
			}
			
			// Si tout va bien, on peut continuer
			
			// On récupère tout le contenu de la table jeux_video
			$reponse = $bdd->query('SELECT * FROM tarifs_articles');
			
			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch_array())
			{
				$contenu.='<tr>';
				if($donnees['id']==2||$donnees['id']==3||$donnees['id']==5||$donnees['id']==6||$donnees['id']==8||$donnees['id']==9)
				{
					$contenu.='<td align="right">'.$donnees['nom'].':</td>
							<td align="center" valign="top">'.$donnees['tarifht'].'€</td>
							<td align="center" valign="top">'.$donnees['tarifttc'].'€</td>
							<td align="center" valign="top">'.$donnees['pourcent'].'%</td>';
				}
				else
				{
					$contenu.='<td align="left">'.$donnees['nom'].':</td>
							<td align="center" valign="top">'.$donnees['tarifht'].'€</td>
							<td align="center" valign="top">'.$donnees['tarifttc'].'€</td>
							<td align="center" valign="top">'.$donnees['pourcent'].'%</td>';
				}
				$contenu.='</tr>';
				if($donnees['id']==3||$donnees['id']==6)
				{
					$contenu.='<td></br></td>';
					
				}
			}
			
			$contenu.='</table>
					
</div>';
			return $contenu;
		}
		public function accueil(){
			return '<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(vue/images/vitrine/paragliding_1.jpg);">
		   	</li>
		   	<li style="background-image: url(vue/images/vitrine/paragliding_2.jpg);">
		   	</li>
			<li style="background-image: url(vue/images/vitrine/paragliding_3.jpg);">
		   	</li>
					
		  	</ul>
	  	</div>
	</aside>
	<div id="annonces">
		<div class="container">
			<div class="row">

				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
					<h2 style="color:#fff; text-shadow:0 0 5px #000">Vente de voiles d\'occasion</h2>
				</div>
				<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
					
					
					<div class="fh5co-property">
						<figure>
							<center><img src="vue/images/vitrine/aile_1.jpg" class="img-responsive"></center>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a>AILE PARAPENTE SUPAIR BI SORA JAUNE/ORANGE FIRE</a></h3>
							<div class="price-status">
		                 	<span class="price">4,100€ </span>
		               </div>
		               <p>Conçu par des professionnels pour des professionnels, notre nouveau SORA est le parfait outil de travail pour enchaîner les vols en biplace à longueur de journée sur toute une saison.</p>
	            	</div>
	            	<p class="fh5co-property-specification">
	            	</p>
					</div>
					
					
				</div>
				<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
					
					<div class="fh5co-property">
						<figure>
							<center><img src="vue/images/vitrine/aile_2.jpg" class="img-responsive"></center>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a>AILE PARAPENTE SUPAIR EN-A EONA **M** WINTER</a></h3>
							<div class="price-status">
		                 	<span class="price">2,950€ </span>
		               </div>
		               <p>Des premiers sauts de puce en pente école jusqu’au vol en cross, l’EONA est la compagne idéale.</p>
	            	</div>
	            	<p class="fh5co-property-specification">
	            	</p>
					</div>
					
				</div>
				<div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
					
					<div class="fh5co-property">
						<figure>
							<center><img src="vue/images/vitrine/aile_3.jpg" class="img-responsive"></center>
						</figure>
						<div class="fh5co-property-innter">
							<h3><a href="#">AILE PARAPENTE SUPAIR EN-B EIKO **23</a></h3>
							<div class="price-status">
		                 	<span class="price">2,850€</span>
		               </div>
		               <p>Vendue avec élévateurs Standards (plus lourds)</p>
	            	</div>
	            	<p class="fh5co-property-specification">
	            	</p>
					</div>
				</div>
			</div>
			<strong><center><p style="color: white;">Accéder à l\'<a style="color: #2196F3;" href="index.php?a=application">application</a> pour en voir plus</p></center></strong>
		</div>
	</div>';
		}
		public function connexion(){
			//session_start(); // on démarre la session
			
			$error=0; // variable qui stocke les messages d'erreur
			
			// si on appuie sur le bouton submit et que l'email ainsi que le mdp est vide
			
			if (isset($_POST['submit'])) 
			{
				
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
					
					$connexionBdd = $this->openBDD();
					
					// protection contre l'injection SQL
					
					$email = stripslashes($email);
					
					$password = stripslashes($password);
					
					$email = ($email);
					
					$password = ($password);
					
					
					
					// requête SQL qui vérifie que l'on a rentré un email et un mdp existant
					
					$query = $connexionBdd->query("select * from clients where password='$password' AND email='$email' AND actif=1");
					
					$getUser = $connexionBdd->query("select permissions from clients where password='$password' AND email='$email'");
					
					$rows = $query->num_rows;
					
					if ($rows == 1) {
						
						$_SESSION['login_user']=$email; // initialisation de la session
						while($typeUser = $getUser->fetch_array())
						{
							if($typeUser['permissions']==1)
							{
								$user="Utilisateur";
								$logfile = "log_User.txt";
							}
							elseif($typeUser['permissions']==2)
							{
								$user="Operateur";
								$logfile = "log_Operator.txt";
							}
							elseif($typeUser['permissions']==3)
							{
								$user="Administrateur";
								$logfile = "log_Admin.txt";
							}
							else
							{
								$user="Erreur";
							}
						}
						
						$logs = date('Y-m-d H:i:s').' --- Connexion de "'.$email.'" en tant que "'.$user.'"'."\r\n";
						//Ouverture du répertoire de destination
						$fichier = fopen ("modele/modelisation/logs/".$logfile, "a+");
						//Copie du fichier
						fwrite($fichier, $logs);
						//Fermeture du fichier
						fclose ($fichier);
						//Fin écriture
						
						header("location: index.php?d=vitrine&a=application"); // on redirige vers une page à la connexion
						
					} else {
						if ($getUser->num_rows == 1)
						{
							$error = -1;
						}
						else {
							$error = 1;
						}
						
					}
					
					
					$this->closeBDD(); // on ferme la connexion avec la base de données
				}
				
			}
			 
			
				
			
			
			
			// Appel du template de sortie
			
			
			
			
			if ($error== 1) {
				
				$message_erreur = '<div class="alert alert-danger fade in animated shake">
						
					<strong>Nom d\'utilisateur</strong> ou <strong>mot de passe</strong> incorrect. Veuillez réessayer.
						
					</div>';
				
			}
			else
			{
				
				$message_erreur =  '';
				
			}
			return ('<div class="login animated zoomInDown connexion">

			<h1>Connexion</h1>

			<p><br /></p>

			<form method="post">

				<input type="text" name="email" placeholder="Adresse e-mail" required=required; />

				<input type="password" name="password" placeholder="Mot de passe"  required=required; />

				<p><br /></p>

				<button name="submit" type="submit" class="btn btn-primary btn-block btn-large">Se connecter</button>
				
				<p style="font-size: 13px; color: #fff; text-align: center;"><br/>Besoin d\'un compte ? &nbsp; <a href="index.php?d=vitrine&a=inscription" style="color: #6eb6de;">S\'inscrire</a><br/><a href="index.php?d=vitrine&a=connexion#recuperer_mdp" style="color: #6eb6de;">Mot de passe oublié</a></p>

			</form>

			<div id="recuperer_mdp" class="overlay">
					<div class="popup_recuperer_mdp">
						<h2>Récupération de votre mot de passe</h2>
						<a class="close" href="#">&times;</a>
						<form action="index.php?d=vitrine&a=recuperer_mdp" method="post">
							<div class="content" style="overflow: hidden;">
								<div class="row">
									<br/>
										<div class="col-lg-12">
											<label for="email">Email</label>
											<input class="form-control" type="email" id="email" name="email" required="required">
										  <div class="col-lg-12">
											<p>Vous allez recevoir automatiquement par email un nouveau mot de passe à l\'adresse rentrée ci-dessus.</p>
										  </div>
										</div>
									</div>
								</div>
								
								<br/>
								
								<button type="submit" class="btn btn-primary" style="text-decoration:none; color: white;">Regénérer un mot de passe</button>

						
					</div>
					</form>
				</div>

			<br>

			'.$message_erreur.'

		</div>');
			
			
		}
		
		public function inscription() {
			$error=0;
			
			// connexion � la base de donn�es
			
			$bdd =  $this->openBDD();

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
				
				{
					if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $pass))
					{
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
							
							$bdd->query("INSERT INTO clients VALUES('','$email','$pass','$name','$surname', '$tel', '$ville','$adresse','$cp','$ville','$adresse','$cp','default',1,0)");
							// Envoie d'un email a l'utilisateur qui viens de s'inscrire
							$to      = $email;
							$subject = 'Création de votre compte client Ailipse Technique';
							$message = 'Bienvenue chez <strong>Ailipse Technique</strong>. <br/><br/> Votre demande de création de votre compte client a bien été prise en compte. <br/><br/>
											Vous allez recevoir dans les plus brefs délais une confirmation par le biais de l\'administrateur. <br/><br/>
											Cet email est un message automatique, merci de ne pas y répondre. <br/><br/> <center><img src="http://www.ailipse-technique.fr/selAT/public/img/ailipse_logoweb.png"></img></center>';
							
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							
							mail($to, $subject, $message, $headers);
							// ajoute une notification a  comptes
							
							$bdd->query("UPDATE notifications SET comptes = comptes+1 WHERE id = 1");
							
							$error=3;
							
						}
						
						else{
							
							// Si les mots de passe ne sont pas identiques on retourne un code d'erreur
							
							$error=2;
							
						}
					}
					else{
						$error=4;
					}
				}
				
			}
			
			if($error==0)
			
			{
				
				$message_erreur=  '';
				
			}
			else
			{
				
				if($error==1)
				
				{
					$message_erreur='<div class="alert alert-danger fade in animated shake"><strong>E-Mail</strong> déjà utilisé. Veuillez réessayer.</div>';
					
				}
				
				else if($error == 2)
				
				{
					$message_erreur='<div class="alert alert-danger fade in animated shake">Les<strong> mots de passe</strong> ne correspondent pas. Veuillez réessayer.</div>';
					
				}
				
				else if($error == 3)
				
				{
					// On redirige vers la page d'accueil en affichant un message de succès pour la création de compte
					$message_erreur='<div class="alert alert-success fade in animated shake"><p>Compte créé avec <strong>succès</strong>.</p> <p>Un administrateur va procéder à la validation de votre compte.</p> <p>Vous allez être redirigé dans 5 secondes.</p></div>'.header("Refresh:5; url=index.php");;
					
				}
				else if($error == 4)
				
				{
					$message_erreur='<div class="alert alert-danger fade in animated shake">Le<strong> mot de passe</strong> doit contenir au moins une majuscule, une minuscule et un chiffre. Veuillez réessayer.</div>';
					
				}
				
			}
			
			return('<div class="login animated zoomInDown">

			<h1>Inscription</h1>

			<p><br /></p>

			<form method="post">
				<input type="email" name="e-mail" placeholder="E-mail"  required=required; />
				<input type="password" name="pass" placeholder="Mot de passe"  required=required; />
				<input type="password" name="confirm" placeholder="Confirmation du mot de passe"  required=required; />
				
				<p><br /></p>

				<input type="text" name="name" placeholder="Nom"  required=required; />
				<input type="text" name="surname" placeholder="Prénom"  required=required; />
				<input type="text" name="tel" placeholder="Téléphone"  required=required; />
				<input type="text" name="adresse" placeholder="Adresse"  required=required; />
				<input class="dbl" type="text" name="cp" placeholder="Code postal"  required=required; />
				<input class="dbl" type="text" name="ville" placeholder="Ville"  required=required; />

				<p><br/></p>

				<button name="submit" type="submit" class="btn btn-primary btn-block btn-large">S\'inscrire</button>

			</form>

			<br>

			'.$message_erreur.'

		</div>

	');
			
			$this->closeBDD();// fermeture de la base de donn�es 
		}
	}
}
?>