<?php  
if(!class_exists("admin"))
{
	class admin extends operateur
	{
		public function __construct()
		{
			
		}
		public function valider_control()		// a venir 
		{
			
		}
		public function administration($deroulant)	// affiche la page avec dans $déroulant le select des clients 
		{
			
				return( '
				<div class="demo-card-wide mdl-card mdl-shadow--2dp">
				<div class="mdl-card__title mdl-card-administration__background animated slideInDown">
				<h2 class="mdl-card__title-text">Panel administrateur</h2>
				</div>
				<div class="mdl-card__supporting-text card-background">
						
				<h5 class="animated slideInLeft">Modifier les informations liées aux clients :</h5>
				<br />
				<form action="modele/forme/delete.php" method="post">
				<select id="client" class="nice-select" name="client" onchange="affich()">
					<?php 
						echo('.$deroulant.');
					?>
					</select>
					<button id="start" type="submit" style="color: #F44336;" class="mdl-button mdl-js-button mdl-button--accent">
						Supprimer le compte
					</button>

				<br /><br />
			</form>
			<br />
			<div id="affichage">
				<form>
					<div id="options-admin" class="mdl-grid animated bounceInLeft">
						<div class="mdl-cell mdl-cell--1-col graybox">
							<!-- Contenu vide -->
						</div>
						<div class="mdl-cell mdl-cell--2-col graybox">
							<div class="demo-card-square mdl-card mdl-shadow--2dp">
							  <div class="titre mdl-card__title mdl-card__title-identifiants mdl-card--expand">
								<h2 class="mdl-card__title-text">Identifiants</h2>
							  </div>
							  <div class="mdl-card__supporting-text">

									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="email_adm" class="mdl-textfield__input" type="text" value=" "  id="email_adm" >
										<label class="mdl-textfield__label" for="sample3" id="1">Email</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="password"  class="mdl-textfield__input" type="password" id="password_adm">
										<label class="mdl-textfield__label" for="sample3" id="2">Mot de passe</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="verification"  class="mdl-textfield__input" type="password" id="verification_adm">
										<label class="mdl-textfield__label" for="sample3" id="3">Confirmation</label>
									</div>
							  </div>
							  <div class="mdl-card__actions mdl-card--border card-background2">
							  <label id="label_activation_adm" for="activation_adm" class="mdl-switch mdl-js-switch mdl-js-ripple-effect">
								  <input type="checkbox" name="activation" id="activation_adm" class="mdl-switch__input" value="1">
								  <span class="mdl-switch__label">Activer le compte</span>
							  </label>
								<br />
							  </div>
							</div>
						</div>
							
						<div class="mdl-cell mdl-cell--1-col graybox">
							<!-- Contenu vide -->
						</div>
							
						<div class="mdl-cell mdl-cell--2-col graybox">
							<div class="demo-card-square mdl-card mdl-shadow--2dp">
							  <div class="titre mdl-card__title mdl-card__title-facturation mdl-card--expand">
								<h2 class="mdl-card__title-text">Identité</h2>
							  </div>
							  <div class="mdl-card__supporting-text">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="nom" class="mdl-textfield__input" type="text" value=" " id="nom_adm">
										<label class="mdl-textfield__label" for="sample3" id="4">Nom</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input  name="prenom" class="mdl-textfield__input" type="text" value=" " id="prenom_adm">
										<label class="mdl-textfield__label" for="sample3" id="5">Prénom</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="telephone" class="mdl-textfield__input" type="text" value=" " id="telephone_adm">
										<label class="mdl-textfield__label" for="sample3" id="6">Téléphone</label>
									</div>
							  </div>
							  <div class="mdl-card__actions mdl-card--border card-background2">
								<br />
							  </div>
							</div>
						</div>
						<div class="mdl-cell mdl-cell--1-col graybox">
							<!-- Contenu vide -->
						</div>
						<div class="mdl-cell mdl-cell--2-col graybox">
							<div class="demo-card-square2 mdl-card mdl-shadow--2dp">
							  <div class="titre mdl-card__title mdl-card__title-expedition-lg mdl-card--expand">
								<h2 class="mdl-card__title-text">Adresses</h2>
							  </div>
							  <div class="mdl-card__supporting-text">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="rue_exp" class="mdl-textfield__input" type="text" value=" " id="rue_exp_adm">
										<label class="mdl-textfield__label" for="sample3" id="7">Rue expédition</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="code_exp" class="mdl-textfield__input" type="text" value=" " id="code_exp_adm">
										<label class="mdl-textfield__label" for="sample3" id="8">Code postal expédition</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="ville_exp" class="mdl-textfield__input" type="text" value=" " id="ville_exp_adm">
										<label class="mdl-textfield__label" for="sample3" id="9">Ville expédition</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="rue_fac" class="mdl-textfield__input" type="text" value=" " id="rue_fact_adm">
										<label class="mdl-textfield__label" for="sample3" id="10">Rue facturation</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input  name="code_fac" class="mdl-textfield__input" type="text" value=" " id="code_fact_adm">
										<label class="mdl-textfield__label" for="sample3" id="11">Code postal facturation</label>
									</div>
									<br />
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="ville_fac" class="mdl-textfield__input" type="text" value=" " id="ville_fact_adm">
										<label class="mdl-textfield__label" for="sample3" id="12">Ville facturation</label>
									</div>
								</div>
							  <div class="mdl-card__actions mdl-card--border card-background2">
								<br />
							  </div>
							</div>
						</div>
						</div>
				</div>
			</div>
			<div id="validation" class="mdl-card__actions mdl-card--border card-background2 animated slideInUp">
			<center>
			</form>
			<button onClick="update()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			Valider les modifications apportées
			</button>
			
				</center>
		</div>
		<div class="mdl-card__menu">
		</div>
			<script>affich();</script>	
			</div>');
			
			//ligne 157 appelle de la fonction js update 
			//ligne 165 appelle de la fonction affiche a l'affichage de la page 
	
		}
		
	}

}
?>