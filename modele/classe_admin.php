<?php  
if(!class_exists("Administrateur"))
{
	class Administrateur extends Operateur
	{
		public function __construct()
		{		}		public function validerControl()		// a venir 		{					}				public function menuAdministration()	// fonction qui affiche le menu/pannel des annonces 		{		// chaque <div  class="mdl-cell"> est un item du menu 		return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">					<div class="mdl-card__title mdl-card-administration__background animated slideInDown">						<h2 class="mdl-card__title-text">Administration</h2>					</div>					<div class="mdl-card__supporting-text card-background">										<h5 class="animated slideInLeft">Sélectionnez une action</h5>								<br />								<div class="content-grid mdl-grid hover01 column animated zoomInDown">							<div class="mdl-cell">								<figure><a href="index.php?a=gerer_utilisateurs"><img width="250" height="200" src="vue/images/utilisateurs.png" /></a></figure>								<span>Gérer les utilisateurs</span>							</div>									<div class="mdl-cell">								<figure><a href="index.php?a=gerer_tarifs"><img width="250" height="200" src="vue/images/tarifs.png" /></a></figure>								<span style="margin-left: 12%;">Gérer les tarifs</span>							</div>						</div>					</div>		');		}		public function gererUtilisateurs()	// affiche la page avec dans $déroulant le select des clients 		{			$connect = $this->openBDD();	// ouverture de la BDD avec l'objet créé dans session.php qui est accéssible dans le noyau			$query="SELECT * FROM `clients`";					$result = mysqli_query($connect ,$query);		// recuperation de tous les clients			$deroulant = "<option value='-2'> </option>									<option value='-1'> </option>";			// tampon pour l'affichage 			while($row = mysqli_fetch_array($result))			{				$deroulant = $deroulant."<option value=$row[0]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id et $row[1] leur email 			}						$this->closeBDD();		// fermeture de la connexion à la BDD				return( '				<div class="demo-card-wide mdl-card mdl-shadow--2dp">				<div class="mdl-card__title mdl-card-administration__background animated slideInDown">				<h2 class="mdl-card__title-text">Panel administrateur</h2>				</div>				<div class="mdl-card__supporting-text card-background">										<h5 class="animated slideInLeft">Modifier les informations liées aux clients :</h5>				<br />				<form action="modele/formulaires/delete.php" method="post">				<select id="client" class="nice-select" name="client" onchange="affich()">					<?php 						echo('.$deroulant.');					?>					</select>					<button id="start" type="submit" style="color: #F44336;" class="mdl-button mdl-js-button mdl-button--accent">						Supprimer le compte					</button>				<br /><br />			</form>			<br />			<div id="affichage">				<form>					<div id="options-admin" class="mdl-grid animated bounceInLeft">						<div class="mdl-cell mdl-cell--1-col graybox">							<!-- Contenu vide -->						</div>						<div class="mdl-cell mdl-cell--2-col graybox">							<div class="demo-card-square mdl-card mdl-shadow--2dp">							  <div class="titre mdl-card__title mdl-card__title-identifiants mdl-card--expand">								<h2 class="mdl-card__title-text">Identifiants</h2>							  </div>							  <div class="mdl-card__supporting-text">									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="email_adm" class="mdl-textfield__input" type="text" value=" "  id="email_adm" >										<label class="mdl-textfield__label" for="sample3" id="1">Email</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="password"  class="mdl-textfield__input" type="password" id="password_adm">										<label class="mdl-textfield__label" for="sample3" id="2">Mot de passe</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="verification"  class="mdl-textfield__input" type="password" id="verification_adm">										<label class="mdl-textfield__label" for="sample3" id="3">Confirmation</label>									</div>							  </div>							  <div class="mdl-card__actions mdl-card--border card-background2">							  <label id="label_activation_adm" for="activation_adm" class="mdl-switch mdl-js-switch mdl-js-ripple-effect">								  <input type="checkbox" name="activation" id="activation_adm" class="mdl-switch__input" value="1">								  <span class="mdl-switch__label">Activer le compte</span>							  </label>								<br />							  </div>							</div>						</div>													<div class="mdl-cell mdl-cell--1-col graybox">							<!-- Contenu vide -->						</div>													<div class="mdl-cell mdl-cell--2-col graybox">							<div class="demo-card-square mdl-card mdl-shadow--2dp">							  <div class="titre mdl-card__title mdl-card__title-facturation mdl-card--expand">								<h2 class="mdl-card__title-text">Identité</h2>							  </div>							  <div class="mdl-card__supporting-text">									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="nom" class="mdl-textfield__input" type="text" value=" " id="nom_adm">										<label class="mdl-textfield__label" for="sample3" id="4">Nom</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input  name="prenom" class="mdl-textfield__input" type="text" value=" " id="prenom_adm">										<label class="mdl-textfield__label" for="sample3" id="5">Prénom</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="telephone" class="mdl-textfield__input" type="text" value=" " id="telephone_adm">										<label class="mdl-textfield__label" for="sample3" id="6">Téléphone</label>									</div>							  </div>							  <div class="mdl-card__actions mdl-card--border card-background2">								<br />							  </div>							</div>						</div>						<div class="mdl-cell mdl-cell--1-col graybox">							<!-- Contenu vide -->						</div>						<div class="mdl-cell mdl-cell--2-col graybox">							<div class="demo-card-square2 mdl-card mdl-shadow--2dp">							  <div class="titre mdl-card__title mdl-card__title-expedition-lg mdl-card--expand">								<h2 class="mdl-card__title-text">Adresses</h2>							  </div>							  <div class="mdl-card__supporting-text">									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="rue_exp" class="mdl-textfield__input" type="text" value=" " id="rue_exp_adm">										<label class="mdl-textfield__label" for="sample3" id="7">Rue expédition</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="code_exp" class="mdl-textfield__input" type="text" value=" " id="code_exp_adm">										<label class="mdl-textfield__label" for="sample3" id="8">Code postal expédition</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="ville_exp" class="mdl-textfield__input" type="text" value=" " id="ville_exp_adm">										<label class="mdl-textfield__label" for="sample3" id="9">Ville expédition</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="rue_fac" class="mdl-textfield__input" type="text" value=" " id="rue_fact_adm">										<label class="mdl-textfield__label" for="sample3" id="10">Rue facturation</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input  name="code_fac" class="mdl-textfield__input" type="text" value=" " id="code_fact_adm">										<label class="mdl-textfield__label" for="sample3" id="11">Code postal facturation</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="ville_fac" class="mdl-textfield__input" type="text" value=" " id="ville_fact_adm">										<label class="mdl-textfield__label" for="sample3" id="12">Ville facturation</label>									</div>								</div>							  <div class="mdl-card__actions mdl-card--border card-background2">								<br />							  </div>							</div>						</div>						</div>				</div>			</div>			<div id="validation" class="mdl-card__actions mdl-card--border card-background2 animated slideInUp">			<center>			</form>			<button onClick="update()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">			Valider les modifications apportées			</button>							</center>		</div>		<div class="mdl-card__menu">		</div>			<script>affich();</script>				</div>');						//ligne 157 appelle de la fonction js update 			//ligne 165 appelle de la fonction affiche a l'affichage de la page 			}		public function gerer_tarifs()		{			$connect = $this->OpenBDD();			mysqli_set_charset($connect,"utf8");			$reponse = $connect->query('SELECT * FROM tarifs_revision UNION SELECT * FROM tarifs_reparation UNION SELECT * FROM tarifs_articles');			$affichage="";			$i = 0;			$nbTarifRevision=0;			$nbTarifReparation=0;			$nbTarifArticle=0;			$compteur = $connect->query('SELECT * FROM tarifs_revision');			while($donnees = $compteur->fetch_array())			{				$nbTarifRevision++;			}			$compteur = $connect->query('SELECT * FROM tarifs_reparation');			while($donnees = $compteur->fetch_array())			{				$nbTarifReparation++;			}			$compteur = $connect->query('SELECT * FROM tarifs_articles');			while($donnees = $compteur->fetch_array())			{				$nbTarifArticle++;			}			while($donnees = $reponse->fetch_array())			{				$TVA = $donnees['tarifht']+20*$donnees['tarifht']/100;				$TVA = number_format($TVA, 2, '.', '');				if($i==0){						$contenuRevision = '<div class="demo-card-wide mdl-card mdl-shadow--2dp">									<div class="mdl-card__supporting-text card-background" style="width:99%;">								 <div class="tableau">								 <form action="modele/formulaires/validation_tarif.php" method="post">									<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto; width:70%;">										<tr><th colspan="5" style="text-align:left; font-size:18px;">Tarifs atelier lors d\'une révision</th></tr>										<tr>											<th></th>											<th style="text-align:left; font-size:18px;">Tarif HT</th>											<th style="text-align:left; font-size:18px;">Tarif TTC</th>											<th style="text-align:left; font-size:18px;">%Pro</th>											<th></th>										</tr>										<tr ng-app="">											<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly	>													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<a href="modele/formulaires/suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>											</td>										</tr>';				}				else{					$contenuRevision = '<tr>									<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">											<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">											<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>											</div>									</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">											<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly>											<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>											</div>									</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">											<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">											<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>											</div>									</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<a href="modele/formulaires/suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>									</td>								</tr>';																}				$contenuReparation = '</br><div class="tableau">									<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto; width:70%;">										<tr><th colspan="5" style="text-align:left; font-size:18px;">Tarifs atelier lors d\'une réparation</th></tr>										<tr>											<th></th>											<th style="text-align:left; font-size:18px;">Tarif HT</th>											<th style="text-align:left; font-size:18px;">Tarif TTC</th>											<th style="text-align:left; font-size:18px;">%Pro</th>											<th></th>										</tr>										<tr>											<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly>													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<a href="modele/formulaires/suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>											</td>										</tr>';								$contenuArticles = '</br></br><div class="tableau">									<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto; width:70%;">										<tr><th colspan="5" style="text-align:left; font-size:18px;">Tarifs articles</th></tr>										<tr>											<th></th>											<th style="text-align:left; font-size:18px;">Tarif HT</th>											<th style="text-align:left; font-size:18px;">Tarif TTC</th>											<th style="text-align:left; font-size:18px;">%Pro</th>											<th></th>										</tr>										<tr>											<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly>													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<a href="modele/formulaires/suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>											</td>										</tr>';														if($i==$nbTarifRevision)				{					$affichage=$affichage.'</table>'.$contenuReparation;				}				elseif($i==$nbTarifRevision+$nbTarifReparation){					$affichage=$affichage.'</table>'.$contenuArticles;				}				else{					$affichage=$affichage.$contenuRevision;				}								$i++;			}			$affichage = $affichage.'</table></br>									<center><button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">										Valider les modifications apportées									</button></center>								</form>						</div></div></div>							<a href="#popup_addTarif">								<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored fixedButton" style="position:fixed; top:8%; left:13%; height:56px;">																										<i class="material-icons">add</i>									<span></span>																	</button>							</a>							<div id="popup_addTarif" class="overlay">								<div class="popup">									<h2>Ajouter un tarif</h2>									<a class="close" href="#">&times;</a>									<div id="tarif">										<p>Type de tarif à ajouter :</p>									<form action="modele/formulaires/ajout_tarif.php" method="post">										<select id="typeTarif" class="nice-select" name="typeTarif">											<option value="0">Révision</option>											<option value="1">Réparation</option>											<option value="2">Article</option>										</select>									</div>																		<div id="tabAdd">																				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">											<tr>												<th style="text-align:left; font-size:18px;">Nom</th>												<th style="text-align:center; font-size:18px;">Tarif HT</th>												<th style="text-align:center; font-size:18px;">Tarif TTC</th>												<th style="text-align:center; font-size:18px;">%Pro</th>											</tr>											<td align="left" valign="top" class="mdl-cell mdl-cell--6-col" style="text-align:left;">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifName" class="mdl-textfield__input" type="text" value="" style="text-align:right; width:200px;">													<label class="mdl-textfield__label" for="sample3" id="" style="width:200px;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT" class="mdl-textfield__input" type="text" value="€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC" class="mdl-textfield__input" type="text" value="€" style="text-align:right; width:50%;" readonly>													<label class="mdl-textfield__label" for="sample3" id="" style="width:50%;"></label>													</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT" class="mdl-textfield__input" type="text" value="%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="" style="width:50%;"></label>													</div>											</td>										</table>									</div>																					<br />									<center>										<button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">											Ajouter le tarif																				</button>										</form>									</center>									<br />								</div>							</div>';			return($affichage);			$connect->close();		}			}

}
?>