<?php
if(!class_exists("Annonce")){
class Annonce extends Bdd
{
	public function __construct()
	{
	}
	public function menuAnnonce()	// fonction qui affiche le menu/pannel des annonces 
	{
		// chaque <div  class="mdl-cell"> est un item du menu 
		return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">
					<div class="mdl-card__title mdl-card-annonces__background animated slideInDown">
						<h2 class="mdl-card__title-text">Petites annonces</h2>
					</div>
					<div class="mdl-card__supporting-text card-background">
				
						<h5 class="animated slideInLeft">Sélectionnez une action</h5>
		
						<br />
		
						<div class="content-grid mdl-grid hover01 column animated zoomInDown">
							<div class="mdl-cell">
								<figure><a href="index.php?a=visualiser_annonces"><img width="250" height="200" src="vue/images/visualiser.png" /></a></figure>
								<span>Visualiser les annonces</span>
							</div>
		
							<div class="mdl-cell">
								<figure><a href="index.php?a=creer_annonce"><img width="250" height="200" src="vue/images/ajouter.png" /></a></figure>
								<span>Proposer une annonce</span>
							</div>
												
							<div class="mdl-cell">
								<figure><a href="index.php?a=supprimer_annonce"><img width="250" height="200" src="vue/images/supprimer.png" /></a></figure>
								<span>Supprimer une annonce</span>			
							</div>
						</div>
					</div>
	');
	}
	public function ajouterAnnonce()
	{
		return('
				<div class="demo-card-wide mdl-card mdl-shadow--2dp">
					<div class="mdl-card__title mdl-card-annonces__background animated slideInDown">
						<h2 class="mdl-card__title-text">Publication de petites annonces</h2>
					</div>
					<div class="mdl-card__supporting-text card-background">
				
						<h5 class="animated slideInLeft">Caractéristiques</h5>

						<div class="content-grid mdl-grid">
							<div class="mdl-cell--6-col animated slideInLeft">
								<h6>Type d\'annonce *</h6>
								<form action="modele/formulaires/confirm_annonce.php" method="post" enctype="multipart/form-data">
									<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-vente">
					  					<input type="radio" id="option-vente" class="mdl-radio__button" name="type_annonce" value="1" checked>
					 					<span class="mdl-radio__label">Vente</span>
									</label>
									&nbsp;&nbsp;&nbsp;
									<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-achat">
				  						<input type="radio" id="option-achat" class="mdl-radio__button" name="type_annonce" value="2">
				 						<span class="mdl-radio__label">Achat</span>
									</label>
							<div class="mdl-cell--6-col animated slideInRight">
									<button name="submit" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
										Valider votre annonce
									</button>
									</form>
								<div/>
							</div>
</div>	
		');
		// formulaire utiliant modele/confirm_annonce.php pour valider le creation -> Seulement de l'affichage
	}
	
	
	
}
}
?>