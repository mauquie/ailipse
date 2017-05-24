<?phpif(!class_exists("Administrateur")){		class Administrateur extends Operateur		{				public function __construct()				{								}				public function validerControl()		// a venir				{											}				public function menuAdministration()	// fonction qui affiche le menu/pannel des annonces				{						// chaque <div  class="mdl-cell"> est un item du menu						return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">										<div class="mdl-card__title mdl-card-administration__background animated slideInDown">											<h2 class="mdl-card__title-text">Administration</h2>										</div>										<div class="mdl-card__supporting-text card-background">																					<h5 class="animated fadeIn">Sélectionnez une action</h5>																					<br />																					<div class="content-grid mdl-grid hover01 column animated zoomInDown">												<div class="mdl-cell" style="margin-left: 25px; margin-bottom: 50px;">													<figure><a href="index.php?d=administrateur&a=gerer_utilisateurs"><img width="250" height="200" src="vue/images/utilisateurs.png" /></a></figure>													<span>Gérer les utilisateurs</span>												</div>																						<div class="mdl-cell"  style="margin-bottom: 50px;">													<figure><a href="index.php?d=administrateur&a=gerer_tarifs"><img width="250" height="200" src="vue/images/tarifs.png" /></a></figure>													<span style="margin-left: 12%;">Gérer les tarifs</span>												</div>																</div>										</div>							');					}				public function gererUtilisateurs()	// affiche la page avec dans $déroulant le select des clients				{			$connect = $this->openBDD();	// ouverture de la BDD avec l'objet créé dans session.php qui est accéssible dans le noyau						$query="SELECT * FROM `clients`";						$result = mysqli_query($connect ,$query);		// recuperation de tous les clients									$deroulant = "<option value='-2'> </option>											<option value='-1'>Choisir un client</option>";			// tampon pour l'affichage						while($row = mysqli_fetch_array($result))			{				$deroulant = $deroulant."<option value=$row[0]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id et $row[1] leur email			}						$this->closeBDD();		// fermeture de la connexion à la BDD									return( '									<div class="demo-card-wide mdl-card mdl-shadow--2dp">									<div class="mdl-card__title mdl-card-administration__background animated slideInDown">									<h2 class="mdl-card__title-text">Panel administrateur</h2>									</div>									<div class="mdl-card__supporting-text card-background">																			<h5 class="animated fadeIn">Modifier les informations liées aux clients</h5>									<br />									<form action="index.php?d=administrateur&a=delete" method="post">									<select id="client" class="nice-select" name="client" onchange="affich()">										<?php											echo('.$deroulant.');										?>										</select>										<a id="ajout_compte" class="mdl-button mdl-js-button mdl-button--primary" href="#ajout_client">						Ajouter un compte					</a>										<button id="start" type="submit" style="color: #F44336; margin-left: -170px;" class="mdl-button mdl-js-button mdl-button--accent">						Supprimer le compte					</button>														<br /><br />								</form>								<br />								<div id="affichage">										<div id="options-admin" class="mdl-grid animated bounceInLeft">						<div class="mdl-cell mdl-cell--2-col graybox">							<div class="demo-card-square mdl-card mdl-shadow--2dp">							  <div class="titre mdl-card__title mdl-card__title-identifiants mdl-card--expand">								<h2 class="mdl-card__title-text">Identifiants</h2>							  </div>							  <div class="mdl-card__supporting-text">									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="email_adm" class="mdl-textfield__input" type="text" value=" "  id="email_adm" >										<label class="mdl-textfield__label" for="sample3" id="1">Email</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="password"  class="mdl-textfield__input" type="password" id="password_adm">										<label class="mdl-textfield__label" for="sample3" id="2">Mot de passe</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="verification"  class="mdl-textfield__input" type="password" id="verification_adm">										<label class="mdl-textfield__label" for="sample3" id="3">Confirmation</label>									</div>							  </div>							  <div class="mdl-card__actions mdl-card--border card-background2">							  <label id="label_activation_adm" for="activation_adm" class="mdl-switch mdl-js-switch mdl-js-ripple-effect">								  <input type="checkbox" name="activation" id="activation_adm" class="mdl-switch__input" value="1">								  <span class="mdl-switch__label">Activer le compte</span>							  </label>								<br />							  </div>							</div>						</div>													<div class="mdl-cell mdl-cell--1-col graybox">							<!-- Contenu vide -->						</div>													<div class="mdl-cell mdl-cell--2-col graybox">							<div class="demo-card-square mdl-card mdl-shadow--2dp">							  <div class="titre mdl-card__title mdl-card__title-identite mdl-card--expand">								<h2 class="mdl-card__title-text">Identité</h2>							  </div>							  <div class="mdl-card__supporting-text">									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="nom" class="mdl-textfield__input" type="text" value=" " id="nom_adm">										<label class="mdl-textfield__label" for="sample3" id="4">Nom</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input  name="prenom" class="mdl-textfield__input" type="text" value=" " id="prenom_adm">										<label class="mdl-textfield__label" for="sample3" id="5">Prénom</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="telephone" class="mdl-textfield__input" type="text" value=" " id="telephone_adm">										<label class="mdl-textfield__label" for="sample3" id="6">Téléphone</label>									</div>							  </div>							  <div class="mdl-card__actions mdl-card--border card-background2">							  <label id="label_operateur_adm" for="operateur_adm" class="mdl-switch mdl-js-switch mdl-js-ripple-effect">								  <input type="checkbox" name="operateur" id="operateur_adm" class="mdl-switch__input" value="2">								  <span class="mdl-switch__label">Opérateur</span>							  </label>								<br />							  </div>							</div>						</div>						<div class="mdl-cell mdl-cell--1-col graybox">							<!-- Contenu vide -->						</div>						<div class="mdl-cell mdl-cell--2-col graybox">							<div class="demo-card-square2 mdl-card mdl-shadow--2dp">							  <div class="titre mdl-card__title mdl-card__title-expedition mdl-card--expand">								<h2 class="mdl-card__title-text">Adresse expédition</h2>							  </div>							  <div class="mdl-card__supporting-text">									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="rue_exp" class="mdl-textfield__input" type="text" value=" " id="rue_exp_adm">										<label class="mdl-textfield__label" for="sample3" id="7">Rue expédition</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="code_exp" class="mdl-textfield__input" type="text" value=" " id="code_exp_adm">										<label class="mdl-textfield__label" for="sample3" id="8">Code postal expédition</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="ville_exp" class="mdl-textfield__input" type="text" value=" " id="ville_exp_adm">										<label class="mdl-textfield__label" for="sample3" id="9">Ville expédition</label>									</div>									<div class="espace"></div>								</div>							</div>						</div>													<div class="mdl-cell mdl-cell--1-col graybox">							<!-- Contenu vide -->						</div>						<div class="mdl-cell mdl-cell--2-col graybox">							<div class="demo-card-square2 mdl-card mdl-shadow--2dp">							  <div class="titre mdl-card__title mdl-card__title-facturation-lg mdl-card--expand">								<h2 class="mdl-card__title-text">Adresse facturation</h2>							  </div>							  <div class="mdl-card__supporting-text">									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="rue_fac" class="mdl-textfield__input" type="text" value=" " id="rue_fact_adm">										<label class="mdl-textfield__label" for="sample3" id="10">Rue facturation</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input  name="code_fac" class="mdl-textfield__input" type="text" value=" " id="code_fact_adm">										<label class="mdl-textfield__label" for="sample3" id="11">Code postal facturation</label>									</div>									<br />									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">										<input name="ville_fac" class="mdl-textfield__input" type="text" value=" " id="ville_fact_adm">										<label class="mdl-textfield__label" for="sample3" id="12">Ville facturation</label>									</div>																		<div class="espace"></div>								</div>							</div>																				</div>						</div>				</div>									<div id="ajout_client" class="overlay">						<div class="popup_nouveau_client">							<h2>Création d\'un nouveau compte</h2>							<a class="close" href="#">&times;</a>							<form action="index.php?d=administrateur&a=nouveau_client" method="post">								<div class="content">									<div class="mdl-grid">										<div class="mdl-cell mdl-cell--12-col graybox">											<h7 style="font-size: 18px;">Informations liées au compte</h7>										</div>											<div class="mdl-cell mdl-cell--4-col graybox">											  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">												<input class="mdl-textfield__input" type="email" id="email" name="email" required="required">												<label class="mdl-textfield__label" for="email">Email</label>											  </div>											  <div class="mdl-cell mdl-cell--11-col graybox">												<p>Le mot de passe du compte est généré automatiquement et envoyé par email à l\'utilisateur.</p>											  </div>											</div>											<div class="mdl-cell mdl-cell--4-col graybox">											  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">												<input class="mdl-textfield__input" type="text" id="nom" name="nom" required="required">												<label class="mdl-textfield__label" for="nom">Nom</label>											  </div>											  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">												<input class="mdl-textfield__input" type="text" id="prenom" name="prenom" required="required">												<label class="mdl-textfield__label" for="prenom">Prénom</label>											  </div>											  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">												<input class="mdl-textfield__input" type="text" id="telephone" name="telephone" maxlength="10" required="required">												<label class="mdl-textfield__label" for="telephone">Téléphone</label>											  </div>											</div>											<div class="mdl-cell mdl-cell--4-col graybox">											  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">												<input class="mdl-textfield__input" type="text" id="adresse" name="adresse" required="required">												<label class="mdl-textfield__label" for="adresse">Adresse</label>											  </div>											  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">												<input class="mdl-textfield__input" type="text" id="code_postal" name="code_postal" maxlength="5" required="required"">												<label class="mdl-textfield__label" for="code_postal">Code postal</label>											  </div>											  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">												<input class="mdl-textfield__input" type="text" id="ville" name="ville" required="required">												<label class="mdl-textfield__label" for="ville">Ville</label>											  </div>											</div>											<div class="mdl-cell mdl-cell--12-col graybox">											  <h7 style="font-size: 18px;">Permissions</h7>											</div>											<div class="mdl-cell mdl-cell--12-col graybox">											  <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="permissions">												<input type="checkbox" id="permissions" class="mdl-switch__input" name="permissions" value="1">												<span class="mdl-switch__label">Opérateur</span>											  </label>											</div>										</div>									</div>																		<br />									<hr />																		<button type="submit" class="mdl-button mdl-js-button mdl-button--primary" style="text-decoration:none; color:rgb(96,125,139)">CRÉER LE COMPTE</button>													</div>						</form>					</div>					<div class="espace"></div>			</div>														<div id="validation" class="mdl-card__actions mdl-card--border card-background2 animated slideInUp">								<center>													<button onClick="update()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">								Valider les modifications apportées								</button>																			</center>							</div>							<div class="mdl-card__menu">							</div>								<script>affich();</script>								</div>');												//ligne 157 appelle de la fonction js update						//ligne 165 appelle de la fonction affiche a l'affichage de la page											}		public function gerer_tarifs()		{			$connect = $this->OpenBDD();			mysqli_set_charset($connect,"utf8");			$reponse = $connect->query('SELECT * FROM tarifs_revision UNION SELECT * FROM tarifs_reparation UNION SELECT * FROM tarifs_articles');			$affichage="";			$i = 0;						$nbTarifRevision=0;			$nbTarifReparation=0;			$nbTarifArticle=0;						$compteur = $connect->query('SELECT * FROM tarifs_revision');			while($donnees = $compteur->fetch_array())			{				$nbTarifRevision++;			}						$compteur = $connect->query('SELECT * FROM tarifs_reparation');			while($donnees = $compteur->fetch_array())			{				$nbTarifReparation++;			}						$compteur = $connect->query('SELECT * FROM tarifs_articles');			while($donnees = $compteur->fetch_array())			{				$nbTarifArticle++;			}						while($donnees = $reponse->fetch_array())			{				$TVA = $donnees['tarifht']+20*$donnees['tarifht']/100;				$TVA = number_format($TVA, 2, '.', '');				if($i==0){					$contenuRevision = '<div class="demo-card-wide mdl-card mdl-shadow--2dp">									<div class="mdl-card__supporting-text card-background" style="width:99%;">								 <div class="tableau">								 <form action="index.php?d=administrateur&a=valider_tarif" method="post">									<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto; width:70%;">										<tr><th colspan="5" style="text-align:left; font-size:18px;">Tarifs atelier lors d\'une révision</th></tr>										<tr>											<th></th>											<th style="text-align:left; font-size:18px;">Tarif HT</th>											<th style="text-align:left; font-size:18px;">Tarif TTC</th>											<th style="text-align:left; font-size:18px;">%Pro</th>											<th></th>										</tr>										<tr ng-app="">											<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly	>													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<a href="index.php?d=administrateur&a=suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>											</td>										</tr>';				}				else{					$contenuRevision = '<tr>									<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">											<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">											<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>										</div>									</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">											<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly>											<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>										</div>									</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">											<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">											<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>										</div>									</td>									<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">										<a href="index.php?d=administrateur&a=suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>									</td>								</tr>';														}				$contenuReparation = '</br><div class="tableau">									<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto; width:70%;">										<tr><th colspan="5" style="text-align:left; font-size:18px;">Tarifs atelier lors d\'une réparation</th></tr>										<tr>											<th></th>											<th style="text-align:left; font-size:18px;">Tarif HT</th>											<th style="text-align:left; font-size:18px;">Tarif TTC</th>											<th style="text-align:left; font-size:18px;">%Pro</th>											<th></th>										</tr>										<tr>											<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly>													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<a href="index.php?d=administrateur&a=suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>											</td>										</tr>';								$contenuArticles = '</br></br><div class="tableau">									<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto; width:70%;">										<tr><th colspan="5" style="text-align:left; font-size:18px;">Tarifs articles</th></tr>										<tr>											<th></th>											<th style="text-align:left; font-size:18px;">Tarif HT</th>											<th style="text-align:left; font-size:18px;">Tarif TTC</th>											<th style="text-align:left; font-size:18px;">%Pro</th>											<th></th>										</tr>										<tr>											<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--4-col">'.$donnees['nom'].' :</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$TVA.'€" style="text-align:right; width:50%;" readonly>													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="'.$i.'" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<a href="index.php?d=administrateur&a=suppression_tarifs.php?id='.$donnees['id'].'&num='.$i.'"><input style="color: #F44336;" type="button" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" value="Supprimer"/></a>											</td>										</tr>';								if($i==$nbTarifRevision)				{					$affichage=$affichage.'</table>'.$contenuReparation;				}				elseif($i==$nbTarifRevision+$nbTarifReparation){					$affichage=$affichage.'</table>'.$contenuArticles;				}				else{					$affichage=$affichage.$contenuRevision;				}								$i++;			}			$affichage = $affichage.'</table></br>									<center><button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">										Valider les modifications apportées									</button></center>								</form>						</div></div></div>							<a href="#popup_addTarif">								<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored fixedButton" style="position:fixed; top:8%; left:13%; height:56px;">									<i class="material-icons">add</i>									<span></span>								</button>							</a>							<div id="popup_addTarif" class="overlay">								<div class="popup">									<h2>Ajouter un tarif</h2>									<a class="close" href="#">&times;</a>									<div id="tarif">										<p>Type de tarif à ajouter :</p>									<form action="index.php?d=administrateur&a=ajout_tarif" method="post">										<select id="typeTarif" class="nice-select" name="typeTarif">											<option value="0">Révision</option>											<option value="1">Réparation</option>											<option value="2">Article</option>										</select>									</div>														<div id="tabAdd">										<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">											<tr>												<th style="text-align:left; font-size:18px;">Nom</th>												<th style="text-align:center; font-size:18px;">Tarif HT</th>												<th style="text-align:center; font-size:18px;">Tarif TTC</th>												<th style="text-align:center; font-size:18px;">%Pro</th>											</tr>											<td align="left" valign="top" class="mdl-cell mdl-cell--6-col" style="text-align:left;">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifName" class="mdl-textfield__input" type="text" value="" style="text-align:right; width:200px;">													<label class="mdl-textfield__label" for="sample3" id="" style="width:200px;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifHT" class="mdl-textfield__input" type="text" value="€" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifTTC" class="mdl-textfield__input" type="text" value="€" style="text-align:right; width:50%;" readonly>													<label class="mdl-textfield__label" for="sample3" id="" style="width:50%;"></label>												</div>											</td>											<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">													<input name="tarifPCT" class="mdl-textfield__input" type="text" value="%" style="text-align:right; width:50%;">													<label class="mdl-textfield__label" for="sample3" id="" style="width:50%;"></label>												</div>											</td>										</table>									</div>									<br />									<center>										<button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">											Ajouter le tarif										</button>										</form>									</center>									<br />								</div>							</div>';			return($affichage);			$connect->close();		}		public function ValidationVoileConstructeur()		{			$select="<option value=-2>rien</option>";			$connectionBDD=$this->openBDD();			$sql="SELECT * FROM voile WHERE valider=0";			$result=$connectionBDD->query($sql);			while($row = mysqli_fetch_array($result))			{				$select = $select."<option value=$row[0]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id et $row[1] leur email			}			return('								<div class="demo-card-wide mdl-card mdl-shadow--2dp">									<div class="mdl-card__title mdl-card-administration__background animated slideInDown">				<h2 class="mdl-card__title-text">valisation de voile </h2>				</div>				<div class="voile-select">					<select id="voile" class="nice-select" name="voile" >					'.$select.'					</select>				</div>				<div classe="valeur-voile">					<div class="content-grid mdl-grid">						<div class="mdl-cell">											</div>						<div class="mdl-cell">						</div>						<div class="mdl-cell">						</div>					</div>				</div>																												');		}				public function validationNouveauClient()		{						function generationMotDePasse($taille = 10) {				$chaine = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';				$chaineTaille = strlen($chaine);				$motDePasse = '';				for ($i = 0; $i < $taille; $i++) {					$motDePasse .= $chaine[rand(0, $chaineTaille - 1)];				}				return $motDePasse;			}						// connexion à la base de données			$bdd =  $this->OpenBDD();						$email = ($_POST['email']);			$query = $bdd->query("SELECT email FROM clients WHERE email='$email'");			$num_row = $query->num_rows;			if ($num_row >= 1)			{				// Si l'email est déjà utilisée on retourne un code d'erreur				echo "<script>alert('L\'adresse email est déjà utilisée. Veuillez la modifier afin de procéder à la création du compte.'); location.href = 'index.php?d=administrateur&a=gerer_utilisateurs';</script>";			}			else			{				if(ctype_digit($_POST['telephone']) == true && (ctype_digit($_POST['code_postal'])) == true)				{					// RECUPERATION des données de la base de données					$password = generationMotDePasse();					$password_crypt = sha1($password);					$nom = $_POST['nom'];					$prenom = $_POST['prenom'];					$telephone = $_POST['telephone'];					$ville = $_POST['ville'];					$code_postal = $_POST['code_postal'];					$adresse = $_POST['adresse'];										if(isset($_POST['permissions']))					{						if ($_POST['permissions'] == 1)						{							$permissions = 2;						}						else						{							$permissions = 1;						}					}					else 					{						$permissions = 1;					}										// ajout à la base de données des clients					$bdd->query("INSERT INTO clients VALUES('','$email','$password_crypt','$nom','$prenom', '$telephone', '$ville','$adresse','$code_postal','$ville','$adresse','$code_postal','$permissions','1')");										if($permissions == 1)					{						$typeCompte = "client";					}					else					{						$typeCompte = "opérateur";					}										// Préparation du mail de récapitulatif					$to      = $email;					$subject = 'Création de votre compte '.$typeCompte.' Ailipse Technique';					$message = 'Bienvenue chez <strong>Ailipse Technique</strong>. <br/><br/> Voici un récapitulatif des informations de votre compte : <br/><br/> <strong>Identifiant</strong> : '.$email.'<br/> <strong>Mot de passe provisoire</strong> : '.$password.'<br/><br/> <strong>Nom</strong> : '.$nom.' <br/> <strong>Prénom</strong> : '.$prenom.' <br/> <strong>Téléphone</strong> : '.$telephone.' <br/><br/> <strong>Adresse d\'expédition</strong> : '.$adresse.' <br/> <strong>Code postal d\'expédition</strong> : '.$code_postal.' <br/> <strong>Ville d\'expédition</strong> : '.$ville.' <br/><br/> <strong>Adresse de facturation</strong> : '.$adresse.' <br/> <strong>Code postal de facturation</strong> : '.$code_postal.' <br/> <strong>Ville de facturation</strong> : '.$ville.' <br/><br/> Pour une raison de sécurité, vous êtes invité à changer votre mot de passe dès votre première connexion via notre site internet. <br/><br/> Cet email est un message automatique, merci de ne pas y répondre. <br/><br/> <center><img src="http://www.ailipse-technique.fr/selAT/public/img/ailipse_logoweb.png"></img></center>';					//chunk_split(base64_encode($message));					$headers = "MIME-Version: 1.0" . "\r\n";					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";					//$headers .= "Content-Transfer-Encoding: base64\r\n\r\n";										mail($to, $subject, $message, $headers);					echo "<script>alert('Compte créé avec succès.'); location.href = 'index.php?d=administrateur&a=gerer_utilisateurs';</script>";				}				else				{					// Si les champs code postal et téléphone ne sont pas des saisies numériques					echo "<script>alert('Les champs téléphone et/ou code postal ne sont pas au format numérique.'); location.href = 'index.php?d=administrateur&a=gerer_utilisateurs#ajout_client';</script>";				}			}			$this->CloseBDD($bdd);// fermeture de la base de données 		}					}			}?>