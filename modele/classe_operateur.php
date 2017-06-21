<?php
if(!class_exists("Operateur"))
{
	class Operateur extends Utilisateur
	{
		
		public function __construct()
		{
			$this->_bdd=new Bdd;
		}
		
		public function ajoutVoile()
		{
			$connect = $this->_bdd->openBDD();
			$sql="SELECT * from fabricant";
			$result= $connect->query($sql);
			
			$fabricant=" <option value='-1'> fabricant à sélectionner </option>";
			while($row=mysqli_fetch_array($result))
			{
				$fabricant=$fabricant."<option value=$row[0]>$row[1]</option>";
			}
			$sql="SELECT id ,ref from susp_materiaux";
			$result=$connect->query($sql);
			$materiaux="<select id='materiaux' class='nice-select' style='width:50%'>
							<option value='-1'>materiaux possible</option>";
			while($row = mysqli_fetch_array($result))
			{
				$materiaux=$materiaux."<option value=$row[0]>$row[1]</option>";
			}
			$materiaux=$materiaux."</select>";
			
			$this->_bdd->CloseBDD();
			$selectSuspente="<select id='nbSuspente' name='nbSuspente' class='nice-select' style='width:50%'>";
			for($i=1;$i<=200;$i++)
			{
				
				$selectSuspente=$selectSuspente."<option value=".$i.">".$i."</option>";
				
			}
			$selectSuspente=$selectSuspente."</select>";
			return ('
				<div class="demo-card-wide mdl-card mdl-shadow--2dp">
					<div class="mdl-card__title mdl-card-operateur__background animated slideInDown">
						<h2 class="mdl-card__title-text">Ajout de voile</h2>
					</div>
					<div class="mdl-card__supporting-text card-background">
					<form  action="index.php?d=operateur&a=valider_voile" method="post" enctype="multipart/form-data">
						<div class="content-grid mdl-grid">
							<div class="mdl-cell">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input name="nom" class="mdl-textfield__input" type="text" value=""  id="nom" >
									<label class="mdl-textfield__label" for="sample3" id="nom">nom de la voile</label>
								</div>
								<h6>Fabriquant:</h6>
								<select id="id_const" class="nice-select" name="client" >
									
											'.$fabricant.'
									
								</select>
								<br />
								<br />
								<br />
									<button type="button" onclick="window.location=\'index.php?d=operateur&a=ajout_constructeur\'" name="submit"class="mdl-button mdl-js-button mdl-button--raised" >
										Ajouter constructeur
									</button>
					
								<br />
								<br />
								<h6>Nombre de taille:</h6>
								<select id="nbtaile" class="nice-select" name="taille">
									<option value="0"> </option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
								<br />
								<br />
								<br />
					
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input name="datesorti" class="mdl-textfield__input" type="text" value=""  id="datesortie" >
									<label class="mdl-textfield__label" for="sample3" id="datesortie">Date de sortie</label>
								</div>
								<br />
								<h8> jj/mm/AAAA</h8>
								<br />
								<br />
								<br />
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input name="cert" class="mdl-textfield__input" type="text" value=""  id="cert" >
									<label class="mdl-textfield__label" for="sample3" id="cert">certification</label>
								</div>
								<br />
								<button class="mdl-button mdl-js-button mdl-button--raised" type="button" onclick="affichTable()">
									Valider
								</button>
									<br />
							<br />
							<br />
					
							</div>
							<div class="mdl-cell">
								<div class="tabl_suite" id="tabl_suite">
					
					
					
								</div>
								<div class="file" name="file" id="file"  style=" visibility: hidden">
								    <h6>Select un plan  (obligatoire)</h6>
									<input type="file" name="planToUpload[]" id="planToUpload">
									<h6>Select un manuel </h6>
									<input type="file" name="manuelToUpload[]" id="manuelToUpload">
					
								</div>
								<br />
								<br />
								<div class="valider" name="valider" id="valider"  style=" visibility: hidden">
									<button class="mdl-button mdl-js-button mdl-button--raised" type="button" onclick="aficherTableauxvaleur()" >
										Valider les taille et le nombre de suspente
									</button>
									<br />
									<h7>(Pensé a selectioner le nombre de suspente)</h7>
					
					
								</div>
							</div>
							<div class="mdl-cell">
								<div class="marge">
									<h6> materiaux posible </h6>
									'.$materiaux.'
									<br />
									<br />
									<br />
									Si non présent veiller l\'ajouter avant de continuer
									<br />
									<br />
									<br />
									<button type="button" onclick="window.location=\'index.php?d=operateur&a=ajout_materiaux\'" name="submit"class="mdl-button mdl-js-button mdl-button--raised" >
										Ajouter materiaux
									</button>
									<br />
									<br />
									<br />
									<br />
									<br />
									<br />
									<div id="select_nb_suspente" class="select_nb_suspente" style="visibility: hidden" name="select_nb_suspente">
									<h6> veiller selectioner le nombre de suspente a rentré </h6>
									'.$selectSuspente.'
									</div>
								</div>
							</div>
						</div>
						<div class="positionement-ajout-voile" >
							<div class="content-grid mdl-grid">
								<div class="mdl-cell">
									<div class="valeur_taille_containt" name="valeur_taille_containt" id="valeur_taille_containt" style=" visibility: hidden">
										<a href="#popup_tableau" class="mdl-button mdl-js-button mdl-button--primary" style="text-decoration:none; color:rgb(96,125,139)">reference fabriquant des suspente </a>
									</div>
								</div>
							</div>
						</div>
						<br />
						<div class="boutons" name="boutons" id="boutons">
						</div>
						<br />
						<div class="boutonvalider" name="boutonvalider" id="boutonvalider" style="visibility: hidden">
							<button type="submit" name="submit" class="mdl-button mdl-js-button">
	  							valider la saisie
							</button>
						</div>
						
						<div id="popup_tableau" class="overlay">
									<div class="popup_tableau">
								<h2>Référance fabricant des suspentes</h2>
								<a class="close" href="#">&times;</a>
								<div class="valeur_taille" id="valeur_taille">
					
								</div>
								<br />
								<hr />
							</div>
						</div>
						<div id="popup_tableau4" class="overlay">
							<div class="popup_tableau">
								<h2>compisition d\'une ligne</h2>
								<a class="close" href="#">&times;</a>
								<div class="compositionligne" id="compositionligne">
									
								</div>
							</div>
						</div>
						<div id="popup_tableau5" class="overlay">
							<div class="popup_tableau">
								<h2>longueurs de contrôle </h2>
								<a class="close" href="#">&times;</a>
								<div class="longueursdecontrole" id="longueursdecontrole">
					
								</div>
							</div>
						</div>
					</form>
					</div>
				</div>');
		}
		
		public function ajoutConstructeur()	// affichage des input pour tous les champs a remplir dans la base de données
		{
			return"
						<div class='demo-card-wide mdl-card mdl-shadow--2dp'>
					<div class='mdl-card__title mdl-card-operateur__background animated slideInDown'>
						<h2 class='mdl-card__title-text'>Ajout constructeur </h2>
					</div>
					<div class='content-grid mdl-grid'>
						<div class='mdl-cell'>
			<form action='index.php?d=operateur&a=valider_constructeur' method='post'  enctype='multipart/form-data'>
							<h5> Informations de l'entreprise </h5>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='nomc' class='mdl-textfield__input' type='text' id='nomc'>
								<label class='mdl-textfield__label' for='nomc'>Nom</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='ad_www' class='mdl-textfield__input' type='text' id='ad_www'>
								<label class='mdl-textfield__label' for='nomc'>Adresse internet fabriquant</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='ad_wwwi' class='mdl-textfield__input' type='text' id='ad_wwwi'>
								<label class='mdl-textfield__label' for='nomc'>Adresse internet importateur</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='telephone' class='mdl-textfield__input' type='text' id='telephone'>
								<label class='mdl-textfield__label' for='nomc'>N° de telephone</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='E_mail' class='mdl-textfield__input' type='text' id='E_mail'>
								<label class='mdl-textfield__label' for='nomc'>E-mail fabriquant</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='E_mailI' class='mdl-textfield__input' type='text' id='E_mailI'>
								<label class='mdl-textfield__label' for='nomc'>E-mail importateur</label>
							</div>
						</div>
						<div class='mdl-cell'>
							<h5> Contact n°1</h5>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='nom_c1' class='mdl-textfield__input' type='text' id='nom_c1'>
								<label class='mdl-textfield__label' for='nomc'>Nom</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='pre_c1' class='mdl-textfield__input' type='text' id='pre_c1'>
								<label class='mdl-textfield__label' for='nomc'>Prénom</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='tel_c1' class='mdl-textfield__input' type='text' id='tel_c1'>
								<label class='mdl-textfield__label' for='nomc'>N° de telephone</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='E_mail_c1' class='mdl-textfield__input' type='text' id='E_mail_c1'>
								<label class='mdl-textfield__label' for='nomc'>E-mail </label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='qual_c1' class='mdl-textfield__input' type='text' id='qual_c1'>
								<label class='mdl-textfield__label' for='nomc'>Qualité du contact</label>
							</div>
						</div>
						<div class='mdl-cell'>
							<h5> Contact n°2</h5>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='nom_c2' class='mdl-textfield__input' type='text' id='nom_c2'>
								<label class='mdl-textfield__label' for='nomc'>Nom</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='pre_c2' class='mdl-textfield__input' type='text' id='pre_c2'>
								<label class='mdl-textfield__label' for='nomc'>Prénom</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='tel_c2' class='mdl-textfield__input' type='text' id='tel_c2'>
								<label class='mdl-textfield__label' for='nomc'>N° de telephone</label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='E_mail_c2' class='mdl-textfield__input' type='text' id='E_mail_c2'>
								<label class='mdl-textfield__label' for='nomc'>E-mail </label>
							</div>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='qual_c2' class='mdl-textfield__input' type='text' id='qual_c2'>
								<label class='mdl-textfield__label' for='nomc'>Qualité du contact</label>
							</div>
							<input name='photos[]' type='file' style='display:none' id='upload-image' multiple='multiple'></input>
								<div id='upload' class='drop-area'>
								Cliquez-ici et ajoutez le logo (faire un hint)
								</div>
								<div id='thumbnail'></div>
						</div>
					</div>
								<div id='validation' class='mdl-card__actions mdl-card--border card-background2 animated slideInUp'>
						<center>
					
						<button name='submit' type='submit' class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>
						Valider les données constructeur
						</button>
			</form>
				</div>";
			
		}
		public function menuOperateur()		// affichage du pannel operateur chaque <div class="mdl-cell"> sont des items
		{
			return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title mdl-card-operateur__background animated slideInDown">
						<h2 class="mdl-card__title-text">Opérateur</h2>
						</div>
							<div class="mdl-card__supporting-text card-background">
					
							<h5 class="animated fadeIn">Sélectionnez une action</h5>
					
							<br />
					
							<div class="content-grid mdl-grid hover01 column animated zoomInDown">
								<div class="mdl-cell" style="margin-left: 25px; margin-bottom: 50px;">
									<figure><a href="index.php?d=operateur&a=suivi"><img width="250" height="200" src="vue/images/suivi.png" /></a></figure>
									<span>Suivre une voile</span>
								</div>
						
						
							

							</div>

							<div class="content-grid mdl-grid hover01 column animated zoomInDown">
								<div class="mdl-cell"  style="margin-left: 25px; margin-bottom: 50px;">
									<figure><a href="index.php?d=operateur&a=ajouter_voile"><img width="250" height="200" src="vue/images/ajouter.png" /></a></figure>
									<span>Ajouter une voile</span>
								</div>

								<div class="mdl-cell"  style="margin-bottom: 50px;">
									<figure><a href="index.php?d=operateur&a=modifier_voile"><img width="250" height="200" src="vue/images/modifier.png" /></a></figure>
									<span>Modifier/valider/suprimer voile </span>
								</div>
						
								
							</div>
						</div>
					</div>
				</div>');
			
			
			
		}
		public function ajoutMateriaux()
		{
			$connect = $this->_bdd->openBDD();
			$sql="SELECT * from fabricant";
			$result= $connect->query($sql);
			
			$fabricant="<option value='-1'> le fabricant</option>";
			while($row=mysqli_fetch_array($result))
			{
				$fabricant=$fabricant."<option value=$row[0]>$row[1]</option>";
			}
			$sql="SELECT id ,ref  From susp_materiaux";
			
			$result=$connect->query($sql);
			$materiaux="<option value='-1'>aucun</option>";
			while($row = mysqli_fetch_array($result))
			{
				$materiaux=$materiaux."<option value=$row[0]>$row[1]</option>";
			}
			$materiaux;
			$this->_bdd->CloseBDD();
			
			return"
					<div class='demo-card-wide mdl-card mdl-shadow--2dp'>
					<div class='mdl-card__title mdl-card-operateur__background animated slideInDown'>
					<h2 class='mdl-card__title-text'>Ajout materiaux </h2>
					</div>
					<div class='content-grid mdl-grid'>
						<div class='mdl-cell'>
			<form action='index.php?d=operateur&a=valider_materiel' method='post'  enctype='multipart/form-data'>
							<h5> Informations du materiaux par le constructeur </h5>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<select id='id_fab' class='nice-select' name='id_fab'>
										".$fabricant."
								</select>
							</div>
							<br />
						<br />
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='ref' class='mdl-textfield__input' type='text' id='ref'>
								<label class='mdl-textfield__label' for='ref'>reference fabriquant</label>
							</div>
						</div>
						<div class='mdl-cell'>
							<h5>  equivalence avec  d'autre materiaux</h5>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
							<select id='eq1' class='nice-select' name='eq1'>
									".$materiaux."
								</select>
							</div>
							<br />
						<br />
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<select id='eq2' class='nice-select' name='eq2'>
									".$materiaux."
								</select>
							</div><br />
						<br />
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<select id='eq3' class='nice-select' name='eq3'>
									".$materiaux."
								</select>
							</div>
							</div>
													
						<div class='mdl-cell'>
							<h5> Autre information</h5>
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='materiaux' class='mdl-textfield__input' type='text' id='materiaux'>
								<label class='mdl-textfield__label' for='nomc'>materiaux</label>
							</div>
							<br />
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='rupture' class='mdl-textfield__input' type='text' id='rupture'>
								<label class='mdl-textfield__label' for='nomc'>rupture</label>
							</div>
							<br />
													
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='diam' class='mdl-textfield__input' type='text' id='diam'>
								<label class='mdl-textfield__label' for='nomc'>diam</label>
							</div>
													
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<input name='couleur' class='mdl-textfield__input' type='text' id='couleur'>
								<label class='mdl-textfield__label' for='nomc'>couleur</label>
							</div>
						</div>
					</div>
								<div id='validation' class='mdl-card__actions mdl-card--border card-background2 animated slideInUp'>
						<center>
													
						<button name='submit' type='submit' class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>
						Valider les données constructeur
						</button>
			</form>
				</div>";
			
		}
		
		public function modifierVoile()
		{
			$connect = $this->_bdd->openBDD();
			
			$sql="SELECT * from voile WHERE valider=0 ";
			$result= $connect->query($sql);
			
			$voile="<option value='-1'>Voile</option>";
			while($row=mysqli_fetch_array($result))
			{
				$voile=$voile."<option value=$row[0]>$row[1]</option>";
			}
			
			$sql="SELECT * from fabricant";
			$result= $connect->query($sql);
			
			$fabricant="<option value='-1'>Fabricant </option>";
			while($row=mysqli_fetch_array($result))
			{
				$fabricant=$fabricant."<option value=$row[0]>$row[1]</option>";
			}
			$this->_bdd->CloseBDD();
			$bouton='	<button type="button" onclick="suprimerVoile()" name="submit"class="mdl-button mdl-js-button mdl-button--raised" >
							suprimer
					</button>
					';
			if($this->_permissions==3)
			{
				$bouton.='<button type="button" onclick="activerVoile()" name="submit"class="mdl-button mdl-js-button mdl-button--raised" >
						valider
				</button>';
			}

			return("
				<div class='demo-card-wide mdl-card mdl-shadow--2dp'>
					<div class='mdl-card__title mdl-card-operateur__background animated slideInDown'>
					<h2 class='mdl-card__title-text'>modification de voile non valider</h2>
					</div>
					<div class='mdl-card__supporting-text card-background'>
					<form action='index.php?d=operateur&a=valider_modifier_voile' method='post' enctype='multipart/form-data'>
					<select name='voileat' id='voileart' onchange='affichvoile()' class='nice-select'>
					".$voile."
					</select>
					<div id='bouton' name='bouton' classe='bouton'style='visibility:hidden;'>
							".$bouton."
					</div>
					<br />
					<br /><br />
					<div class='content-grid mdl-grid'>
						<div class='mdl-cell'>
							<div name='donner'  class='donner'  style='visibility: hidden' id='donner'>
								<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
									<input name='nom' class='mdl-textfield__input' type='text' value=' ' id='nom'>
									<label  id='labelnom' style='visibility: hidden' class='mdl-textfield__label' for='nom'>nom de la voile </label>
								</div>
								<br />
								<h6> le constructeur</h6>
								<select id='fabriquand' name='fabriquand' class='nice-select'>
								".$fabricant."
								</select>
								
								<br />
								<br />
								<h6> nombre de taille </h6>
								<select id='nbtaile' class='nice-select'  onchange='affichvoile()' name='nbtaile'>
									<option value='0'> </option>
									<option value='1'>1</option>
									<option value='2'>2</option>
									<option value='3'>3</option>
									<option value='4'>4</option>
									<option value='5'>5</option>
									<option value='6'>6</option>
									<option value='7'>7</option>
									<option value='8'>8</option>
									<option value='9'>9</option>
									<option value='10'>10</option>
								</select>
								<br />
								<br />
								<br />
								<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
									<input name='date' class='mdl-textfield__input' type='text' value=' ' id='date'>
									<label  id='labeldate' style='visibility: hidden' class='mdl-textfield__label' for='nom'>date de la sortie </label>
								</div>
								<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
									<input name='cert' class='mdl-textfield__input' type='text' value=' ' id='cert'>
									<label  id='labelcert' style='visibility: hidden' class='mdl-textfield__label' for='nom'>certification</label>
								</div>
					
							</div>
						</div>
						<div class='mdl-cell'>
						<div name='taile'  class='taile'  style='visibility: hidden' id='taile'>
					
						</div>
						
						</div>
						<div class='mdl-cell'>					
							<div class='valeur_taille_containt' name='valeur_taille_containt' id='valeur_taille_containt' style=' visibility: hidden'>
								<a href='#popup_tableau' class='mdl-button mdl-js-button mdl-button--primary' style='text-decoration:none; color:rgb(96,125,139)'>reference fabriquant des suspente </a>
							</div>
							<br />
							<div class='longerSuspentecontain' name='longerSuspentecontain' id='longerSuspentecontain'  style='visibility: hidden'>
								<a href='#popup_tableau2' class='mdl-button mdl-js-button mdl-button--primary' style='text-decoration:none; color:rgb(96,125,139)'>longueur des suspentes</a>
							</div>
							<br />
							<div class='materiauxSuspentecontin' name='materiauxSuspentecontin' id='materiauxSuspentecontin' style=' visibility: hidden'>
								<a href='#popup_tableau3' class='mdl-button mdl-js-button mdl-button--primary' style='text-decoration:none; color:rgb(96,125,139)'>reference fabriquant des suspente </a>
							</div>
							<br />
							<div class='composition' name='composition' id='composition' style=' visibility: hidden'>
								<a href='#popup_tableau4' class='mdl-button mdl-js-button mdl-button--primary' style='text-decoration:none; color:rgb(96,125,139)'>compisition d\une ligne </a>
							</div>
							<br />
							<div class='longeur' name='longeur' id='longeur' style=' visibility: hidden'>
								<a href='#popup_tableau5' class='mdl-button mdl-js-button mdl-button--primary' style='text-decoration:none; color:rgb(96,125,139)'>longueurs de contrôle</a>
							</div>
							</center>
							</div>
					</div>
						<center>
					<div classe='valider' id='valider' name='valider' style='visibility:hidden;'>
							<button name='submit' type='submit' class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>
								Valider les modifications
						</button>
						</center>
					</div>
						<div id='popup_tableau' class='overlay'>
									<div class='popup'>
								<h2>Référance fabricant des suspentes</h2>
								<a class='close' href='#'>&times;</a>
								<div class='valeur_taille' id='valeur_taille'>
					
								</div>
								<br />
								<hr />
							</div>
						</div>
					
					
						<div id='popup_tableau2' class='overlay'>
							<div class='popup'>
								<h2>longeur des supente </h2>
								<a class='close' href='#'>&times;</a>
								<div class='longerSuspente' id='longerSuspente'>
					
								</div>
								<br />
								<hr />
							</div>
						</div>
					
						<div id='popup_tableau3' class='overlay'>
							<div class='popup'>
								<h2>materiaux des suspente </h2>
								<a class='close' href='#'>&times;</a>
								<div class='materiauxSuspente' id='materiauxSuspente'>
					
								</div>
							</div>
						</div>
						<div id='popup_tableau4' class='overlay'>
							<div class='popup'>
								<h2>compisition d\'une ligne</h2>
								<a class='close' href='#'>&times;</a>
								<div class='compositionligne' id='compositionligne'>
									
								</div>
							</div>
						</div>
						<div id='popup_tableau5' class='overlay'>
							<div class='popup'>
								<h2>longueurs de contrôle </h2>
								<a class='close' href='#'>&times;</a>
								<div class='longueursdecontrole' id='longueursdecontrole'>
					
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			");
			
			
			
			
		}
				public function ControleVoile()
		{
			
			$connect = $this->_bdd->openBDD();	// ouverture de la BDD avec l'objet créé dans session.php qui est accéssible dans le noyau

			
			$numSuivi=$_POST['select_suivi'];
			$queryconstr="SELECT * FROM `fabricant`";
			$querymodele="SELECT * FROM `voile`";
			$querytaille="SELECT * FROM `voile_taille`";			

			$resultconstr = mysqli_query($connect ,$queryconstr);		// recuperation de tous les clients
			$resultmodele = mysqli_query($connect ,$querymodele);
			$resulttaille = mysqli_query($connect ,$querytaille);
			$constructeur = "<option value='-1'> </option>";			// tampon pour l'affichage 
			$modele = "<option value='-1'> </option>";
			$taille = "<option value='-1'> </option>";
									
			while($row = mysqli_fetch_array($resultconstr))
			{
				$constructeur = $constructeur."<option value=$row[1]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id 
																					// et $row[1] leur email 
			}
			while($row = mysqli_fetch_array($resultmodele))
			{
				$modele = $modele."<option value=$row[1]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id 
																					// et $row[1] leur email 
			}
			while($row = mysqli_fetch_array($resulttaille))
			{
				$taille = $taille."<option value=$row[1]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id 
																					// et $row[1] leur email 
			}
			return('<div class="demo-card-wide mdl-card mdl-shadow--2dp">

							<div class="mdl-card__supporting-text card-background">

								<form action="index.php?d=operateur&a=valider_controle" method="post">
											
									<div class="mdl-grid">
										
											<div class="mdl-cell mdl-cell--6-col">
											
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Constructeur :</p>
														<select style="width: 100%;" class="nice-select" name="selConstructeur">
															'.$constructeur.'
														</select>
												</div>
											
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Modele :</p>
														<select style="width: 100%;" class="nice-select" name="selModele">
															'.$modele.'
														</select>
												</div>
												
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Taille :</p>
														<select style="width: 100%;" class="nice-select" name="selTaille">
															'.$taille.'
														</select>
												</div>
												
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Numéro de Série :</p>
														<input style="width: 100%;" class="nice-select" name="selNumSerie">
															
														</input>
												</div>
												
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Couleur de la voile :</p>
														<input style="width: 100%;" class="nice-select" name="selCouleurVoile">
															
														</input>
												</div>
												
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Porosité :</p>
													<TABLE BORDER class="tablePorosite">
														<TR>
															<TH>Centre</TH> <TH>Droite</TH> <TH>Gauche</TH>
														</TR>
														<TR>
															<TD><input style="width: 100%;" class="nice-select" name="centreex"></input></TD> 
															<TD><input style="width: 100%;" class="nice-select" name="droiteex"></input></TD> 
															<TD><input style="width: 100%;" class="nice-select" name="gaucheex"></input></TD>
														</TR>
														<TR>
															<TD><input style="width: 100%;" class="nice-select" name="centrein"></input></TD> 
															<TD><input style="width: 100%;" class="nice-select" name="droitein"></input></TD> 
															<TD><input style="width: 100%;" class="nice-select" name="gauchein"></input></TD>
														</TR>
													</TABLE>
												</div>
												
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Contrôle symétrie :</p>
														<select style="width: 100%;" class="nice-select" name="selControleSymetrie">
															<option value="ok">OK</option> 
															<option value="nv">Non Valide</option> 
															<option value="prob">Défaillance</option>
														</select>
												</div>
												
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Contrôle état tissu :</p>
														<select style="width: 100%;" class="nice-select" name="selControleTissu">
															<option value="ok">OK</option> 
															<option value="nv">Non Valide</option> 
															<option value="prob">Défaillance</option>
														</select>
												</div>
												
												<div class="mdl-cell--6-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Contrôle état suspentage :</p>
														<select style="width: 100%;" class="nice-select" name="selControleSuspente">
															<option value="ok">OK</option> 
															<option value="nv">Non Valide</option> 
															<option value="prob">Défaillance</option>
														</select>
												</div>
												
											
											</div>
												
												
											<div class="mdl-cell mdl-cell--6-col">
												<div class="mdl-cell--8-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">Numéro du contrôle :</p>
														<input style="width: 100%;" class="nice-select" name="selControle" value="'.$numSuivi.'" readonly>
															
														</input>
												</div>
												<div class="mdl-cell--8-col mdl-cell--4-col-phone animated fadeIn" style="float: left; width: 80%;">
													<p class="titreControle">PTV :</p>
														<input style="width: 100%;" class="nice-select" name="selPTV">
															
														</input>
												</div>
											</div>
											
											<div class="mdl-cell mdl-cell--3-col">
											<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A1</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a1constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a1droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a1gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A2</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a2constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a2droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a2gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A3</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a3constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a3droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a3gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A4</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a4constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a4droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a4gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A5</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a5constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a5droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a5gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A6</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a6constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a6droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a6gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A7</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a7constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a7droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a7gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A8</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a8constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a8droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a8gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A9</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a9constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a9droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a9gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A10</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a10constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a10droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a10gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A11</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a11constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a11droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a11gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A12</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a12constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a12droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a12gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A13</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a13constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a13droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a13gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A14</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a14constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a14droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a14gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A15</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a15constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a15droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a15gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A16</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a16constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a16droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="a16gauche"></input></td>
														</tr>
													</table>
													</div>
													<div class="mdl-cell mdl-cell--3-col">
													<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B1</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b1constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b1droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b1gauche"></input></td>
														</tr>
													   
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B2</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b2constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b2droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b2gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B3</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b3constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b3droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b3gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B4</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b4constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b4droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b4gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B5</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b5constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b5droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b5gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B6</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b6constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b6droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b6gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B7</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b7constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b7droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b7gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B8</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b8constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b8droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b8gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B9</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b9constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b9droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b9gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B10</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b10constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b10droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b10gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B11</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b11constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b11droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b11gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B12</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b12constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b12droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b12gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B13</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b13constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b13droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b13gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B14</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b14constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b14droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b14gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B15</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b15constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b15droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b15gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">B16</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b16constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b16droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="b16gauche"></input></td>
														</tr>
													   
													</table>
													</div>
													<div class="mdl-cell mdl-cell--3-col">
													<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
													  
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C1</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c1constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c1droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c1gauche"></input></td>
														</tr>
													   
													   
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C2</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c2constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c2droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c2gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C3</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c3constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c3droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c3gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C4</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c4constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c4droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c4gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C5</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c5constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c5droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c5gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C6</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c6constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c6droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c6gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C7</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c7constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c7droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c7gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C8</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c8constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c8droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c8gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">A9</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c9constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c9droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c9gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C10</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c10constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c10droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c10gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C11</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c11constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c11droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c11gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C12</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c12constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c12droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c12gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C13</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c13constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c13droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c13gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C14</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c14constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c14droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c14gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C15</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c15constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c15droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c15gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">C16</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c16constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c16droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="c16gauche"></input></td>
														</tr>
													   
													</table>
													</div>
													<div class="mdl-cell mdl-cell--3-col">
													<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
													  
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D1</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d1constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d1droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d1gauche"></input></td>
														</tr>
													   
													   
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D2</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d2constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d2droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d2gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D3</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d3constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d3droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d3gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D4</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d4constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d4droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d4gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D5</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d5constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d5droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d5gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D6</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d6constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d6droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d6gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D7</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d7constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d7droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d7gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D8</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d8constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d8droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d8gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D9</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d9constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d9droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d9gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D10</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d10constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d10droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d10gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D11</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d11constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d11droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d11gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D12</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d12constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d12droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d12gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D13</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d13constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d13droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d13gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D14</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d14constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d14droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d14gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D15</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d15constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d15droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required name="d15gauche"></input></td>
														</tr>
														<tr>
														  <th class="mdl-data-table__cell--non-numeric">D16</th>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required; name="d16constructeur" disabled="disabled"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required; name="d16droite"></input></td>
														  <td><input style="width: 100%;" class="mdl-textfield__input" required=required; name="d16gauche"></input></td>
														</tr>
													   
													</table>
													</div>
												
											</div>	
												
											

											<center><button id="validvoile" class="mdl-button mdl-js-button mdl-button--raised" type="submit">Valider la voile</button></center>
											
									
								</form>	
							</div>
					</div>	');
		}
		
		public function ValideControleVoile()
		{
			
			$constructeur=$_POST['selConstructeur'];
			$modele=$_POST['selModele'];
			$taille=$_POST['selTaille'];
			$couleurVoile=$_POST['selCouleurVoile'];
			$numSerie=$_POST['selNumSerie'];
			
			$poroCentreEx=$_POST['centreex'];
			$poroDroiteEx=$_POST['droiteex'];
			$poroGaucheEx=$_POST['gaucheex'];
			$poroCentreIn=$_POST['centrein'];
			$poroDroiteIn=$_POST['droitein'];
			$poroGaucheIn=$_POST['gauchein'];
			
			$controleSymetrie=$_POST['selControleSymetrie'];
			$controleTissu=$_POST['selControleTissu'];
			$controleSuspentage=$_POST['selControleSuspente'];
			
			$numSuivi=$_POST['selControle'];
			
			$ptv=$_POST['selPTV'];
			
			
			$A1C= !empty($_POST['a1constructeur']) ? $_POST['a1constructeur'] : NULL;			$A1R= !empty($_POST['a1droite']) ? $_POST['a1droite'] : NULL;			$A1L=!empty($_POST['a1gauche']) ? $_POST['a1gauche'] : NULL;	
			$A2C= !empty($_POST['a2constructeur']) ? $_POST['a2constructeur'] : NULL;			$A2R= !empty($_POST['a2droite']) ? $_POST['a2droite'] : NULL;			$A2L=!empty($_POST['a2gauche']) ? $_POST['a2gauche'] : NULL;	
			$A3C= !empty($_POST['a3constructeur']) ? $_POST['a3constructeur'] : NULL;			$A3R= !empty($_POST['a3droite']) ? $_POST['a3droite'] : NULL;			$A3L=!empty($_POST['a3gauche']) ? $_POST['a3gauche'] : NULL;	   
			$A4C= !empty($_POST['a4constructeur']) ? $_POST['a4constructeur'] : NULL;			$A4R= !empty($_POST['a4droite']) ? $_POST['a4droite'] : NULL;			$A4L=!empty($_POST['a4gauche']) ? $_POST['a4gauche'] : NULL;	
			$A5C= !empty($_POST['a5constructeur']) ? $_POST['a5constructeur'] : NULL;			$A5R= !empty($_POST['a5droite']) ? $_POST['a5droite'] : NULL;			$A5L=!empty($_POST['a5gauche']) ? $_POST['a5gauche'] : NULL;	
			$A6C= !empty($_POST['a6constructeur']) ? $_POST['a6constructeur'] : NULL;			$A6R= !empty($_POST['a6droite']) ? $_POST['a6droite'] : NULL;			$A6L=!empty($_POST['a6gauche']) ? $_POST['a6gauche'] : NULL;	
			$A7C= !empty($_POST['a7constructeur']) ? $_POST['a7constructeur'] : NULL;			$A7R= !empty($_POST['a7droite']) ? $_POST['a7droite'] : NULL;			$A7L=!empty($_POST['a7gauche']) ? $_POST['a7gauche'] : NULL;	    
			$A8C= !empty($_POST['a8constructeur']) ? $_POST['a8constructeur'] : NULL;			$A8R= !empty($_POST['a8droite']) ? $_POST['a8droite'] : NULL;			$A8L=!empty($_POST['a8gauche']) ? $_POST['a8gauche'] : NULL;	
			$A9C= !empty($_POST['a9constructeur']) ? $_POST['a9constructeur'] : NULL;			$A9R= !empty($_POST['a9droite']) ? $_POST['a9droite'] : NULL;			$A9L=!empty($_POST['a9gauche']) ? $_POST['a9gauche'] : NULL;	
			$A10C= !empty($_POST['a10constructeur']) ? $_POST['a10constructeur'] : NULL; 	$A10R=!empty($_POST['a10droite']) ? $_POST['a10droite']: NULL;		$A10L=!empty($_POST['a10gauche']) ? $_POST['a10gauche']: NULL;			
			$A11C= !empty($_POST['a11constructeur']) ? $_POST['a11constructeur'] : NULL; 	$A11R=!empty($_POST['a11droite']) ? $_POST['a11droite']: NULL;		$A11L=!empty($_POST['a11gauche']) ? $_POST['a11gauche']: NULL;			
			$A12C= !empty($_POST['a12constructeur']) ? $_POST['a12constructeur'] : NULL; 	$A12R=!empty($_POST['a12droite']) ? $_POST['a12droite']: NULL;		$A12L=!empty($_POST['a12gauche']) ? $_POST['a12gauche']: NULL;			
			$A13C= !empty($_POST['a13constructeur']) ? $_POST['a13constructeur'] : NULL; 	$A13R=!empty($_POST['a13droite']) ? $_POST['a13droite']: NULL;		$A13L=!empty($_POST['a13gauche']) ? $_POST['a13gauche']: NULL;		
			$A14C= !empty($_POST['a14constructeur']) ? $_POST['a14constructeur'] : NULL;		$A14R=!empty($_POST['a14droite']) ? $_POST['a14droite']: NULL;		$A14L=!empty($_POST['a14gauche']) ? $_POST['a14gauche']: NULL;		
			$A15C= !empty($_POST['a15constructeur']) ? $_POST['a15constructeur'] : NULL; 	$A15R=!empty($_POST['a15droite']) ? $_POST['a15droite']: NULL;		$A15L=!empty($_POST['a15gauche']) ? $_POST['a15gauche']: NULL;		
			$A16C= !empty($_POST['a16constructeur']) ? $_POST['a16constructeur'] : NULL;		$A16R=!empty($_POST['a16droite']) ? $_POST['a16droite']: NULL;		$A16L=!empty($_POST['a16gauche']) ? $_POST['a16gauche']: NULL;
															
			$B1C= !empty($_POST['b1constructeur']) ? $_POST['b1constructeur']: NULL;			$B1R=!empty($_POST['b1droite']) ? $_POST['b1droite'] : NULL;			$B1L=!empty($_POST['b1gauche']) ? $_POST['b1gauche']: NULL;		
			$B2C= !empty($_POST['b2constructeur']) ? $_POST['b2constructeur']: NULL;			$B2R=!empty($_POST['b2droite']) ? $_POST['b2droite'] : NULL;			$B2L=!empty($_POST['b2gauche']) ? $_POST['b2gauche']: NULL;		
			$B3C= !empty($_POST['b3constructeur']) ? $_POST['b3constructeur']: NULL;			$B3R=!empty($_POST['b3droite']) ? $_POST['b3droite'] : NULL;			$B3L=!empty($_POST['b3gauche']) ? $_POST['b3gauche']: NULL;		
			$B4C= !empty($_POST['b4constructeur']) ? $_POST['b4constructeur']: NULL;			$B4R=!empty($_POST['b4droite']) ? $_POST['b4droite'] : NULL;			$B4L=!empty($_POST['b4gauche']) ? $_POST['b4gauche']: NULL;			
			$B5C= !empty($_POST['b5constructeur']) ? $_POST['b5constructeur']: NULL;			$B5R=!empty($_POST['b5droite']) ? $_POST['b5droite'] : NULL;			$B5L=!empty($_POST['b5gauche']) ? $_POST['b5gauche']: NULL;			
			$B6C= !empty($_POST['b6constructeur']) ? $_POST['b6constructeur']: NULL;			$B6R=!empty($_POST['b6droite']) ? $_POST['b6droite'] : NULL;			$B6L=!empty($_POST['b6gauche']) ? $_POST['b6gauche']: NULL;			
			$B7C= !empty($_POST['b7constructeur']) ? $_POST['b7constructeur']: NULL;			$B7R=!empty($_POST['b7droite']) ? $_POST['b7droite'] : NULL;			$B7L=!empty($_POST['b7gauche']) ? $_POST['b7gauche']: NULL;		
			$B8C= !empty($_POST['b8constructeur']) ? $_POST['b8constructeur']: NULL;			$B8R=!empty($_POST['b8droite']) ? $_POST['b8droite'] : NULL;			$B8L=!empty($_POST['b8gauche']) ? $_POST['b8gauche']: NULL;		
			$B9C= !empty($_POST['b9constructeur']) ? $_POST['b9constructeur']: NULL;			$B9R=!empty($_POST['b9droite']) ? $_POST['b9droite'] : NULL;			$B9L=!empty($_POST['b9gauche']) ? $_POST['b9gauche']: NULL;		
			$B10C= !empty($_POST['b10constructeur']) ? $_POST['b10constructeur']: NULL;		$B10R=!empty($_POST['b10droite']) ? $_POST['b10droite']: NULL;		$B10L=!empty($_POST['b10gauche']) ? $_POST['b10gauche']: NULL;		
			$B11C= !empty($_POST['b11constructeur']) ? $_POST['b11constructeur']: NULL;		$B11R=!empty($_POST['b11droite']) ? $_POST['b11droite']: NULL;		$B11L=!empty($_POST['b11gauche']) ? $_POST['b11gauche']: NULL;		
			$B12C= !empty($_POST['b12constructeur']) ? $_POST['b12constructeur']: NULL;		$B12R=!empty($_POST['b12droite']) ? $_POST['b12droite']: NULL;		$B12L=!empty($_POST['b12gauche']) ? $_POST['b12gauche']: NULL;		
			$B13C= !empty($_POST['b13constructeur']) ? $_POST['b13constructeur']: NULL;		$B13R=!empty($_POST['b13droite']) ? $_POST['b13droite']: NULL;		$B13L=!empty($_POST['b13gauche']) ? $_POST['b13gauche']: NULL;			
			$B14C= !empty($_POST['b14constructeur']) ? $_POST['b14constructeur']: NULL;		$B14R=!empty($_POST['b14droite']) ? $_POST['b14droite']: NULL;		$B14L=!empty($_POST['b14gauche']) ? $_POST['b14gauche']: NULL;			
			$B15C= !empty($_POST['b15constructeur']) ? $_POST['b15constructeur']: NULL;		$B15R=!empty($_POST['b15droite']) ? $_POST['b15droite']: NULL;		$B15L=!empty($_POST['b15gauche']) ? $_POST['b15gauche']: NULL;				
			$B16C= !empty($_POST['b16constructeur']) ? $_POST['b16constructeur']: NULL;		$B16R=!empty($_POST['b16droite']) ? $_POST['b16droite']: NULL;		$B16L=!empty($_POST['b16gauche']) ? $_POST['b16gauche']: NULL;
															
			$C1C= !empty($_POST['c1constructeur']) ? $_POST['c1constructeur']: NULL;			$C1R=!empty($_POST['c1droite']) ? $_POST['c1droite'] : NULL;			$C1L=!empty($_POST['c1gauche']) ? $_POST['c1gauche']: NULL;	  
			$C2C= !empty($_POST['c2constructeur']) ? $_POST['c2constructeur']: NULL;			$C2R=!empty($_POST['c2droite']) ? $_POST['c2droite'] : NULL;			$C2L=!empty($_POST['c2gauche']) ? $_POST['c2gauche']: NULL;		  
			$C3C= !empty($_POST['c3constructeur']) ? $_POST['c3constructeur']: NULL;			$C3R=!empty($_POST['c3droite']) ? $_POST['c3droite'] : NULL;			$C3L=!empty($_POST['c3gauche']) ? $_POST['c3gauche']: NULL;		  
			$C4C= !empty($_POST['c4constructeur']) ? $_POST['c4constructeur']: NULL;			$C4R=!empty($_POST['c4droite']) ? $_POST['c4droite'] : NULL;			$C4L=!empty($_POST['c4gauche']) ? $_POST['c4gauche']: NULL;		  
			$C5C= !empty($_POST['c5constructeur']) ? $_POST['c5constructeur']: NULL;			$C5R=!empty($_POST['c5droite']) ? $_POST['c5droite'] : NULL;			$C5L=!empty($_POST['c5gauche']) ? $_POST['c5gauche']: NULL;	  
			$C6C= !empty($_POST['c6constructeur']) ? $_POST['c6constructeur']: NULL;			$C6R=!empty($_POST['c6droite']) ? $_POST['c6droite'] : NULL;			$C6L=!empty($_POST['c6gauche']) ? $_POST['c6gauche']: NULL;		  
			$C7C= !empty($_POST['c7constructeur']) ? $_POST['c7constructeur']: NULL;			$C7R=!empty($_POST['c7droite']) ? $_POST['c7droite'] : NULL;			$C7L=!empty($_POST['c7gauche']) ? $_POST['c7gauche']: NULL;		  
			$C8C= !empty($_POST['c8constructeur']) ? $_POST['c8constructeur']: NULL;			$C8R=!empty($_POST['c8droite']) ? $_POST['c8droite'] : NULL;			$C8L=!empty($_POST['c8gauche']) ? $_POST['c8gauche']: NULL;		  
			$C9C= !empty($_POST['c9constructeur']) ? $_POST['c9constructeur']: NULL;			$C9R=!empty($_POST['c9droite']) ? $_POST['c9droite'] : NULL;			$C9L=!empty($_POST['c9gauche']) ? $_POST['c9gauche']: NULL;		  
			$C10C= !empty($_POST['c10constructeur']) ?$_POST['c10constructeur']: NULL;		$C10R=!empty($_POST['c10droite']) ? $_POST['c10droite']: NULL;		$C10L=!empty($_POST['c10gauche']) ? $_POST['c10gauche']: NULL;			  
			$C11C= !empty($_POST['c11constructeur']) ?$_POST['c11constructeur']: NULL;		$C11R=!empty($_POST['c11droite']) ? $_POST['c11droite']: NULL;		$C11L=!empty($_POST['c11gauche']) ? $_POST['c11gauche']: NULL;			  
			$C12C= !empty($_POST['c12constructeur']) ?$_POST['c12constructeur']: NULL;		$C12R=!empty($_POST['c12droite']) ? $_POST['c12droite']: NULL;		$C12L=!empty($_POST['c12gauche']) ? $_POST['c12gauche']: NULL;			  
			$C13C= !empty($_POST['c13constructeur']) ?$_POST['c13constructeur']: NULL;		$C13R=!empty($_POST['c13droite']) ? $_POST['c13droite']: NULL;		$C13L=!empty($_POST['c13gauche']) ? $_POST['c13gauche']: NULL;			  
			$C14C= !empty($_POST['c14constructeur']) ?$_POST['c14constructeur']: NULL;		$C14R=!empty($_POST['c14droite']) ? $_POST['c14droite']: NULL;		$C14L=!empty($_POST['c14gauche']) ? $_POST['c14gauche']: NULL;			  
			$C15C= !empty($_POST['c15constructeur']) ?$_POST['c15constructeur']: NULL;		$C15R=!empty($_POST['c15droite']) ? $_POST['c15droite']: NULL;		$C15L=!empty($_POST['c15gauche']) ? $_POST['c15gauche']: NULL;		  
			$C16C= !empty($_POST['c16constructeur']) ?$_POST['c16constructeur']: NULL;		$C16R=!empty($_POST['c16droite']) ? $_POST['c16droite']: NULL;		$C16L=!empty($_POST['c16gauche']) ? $_POST['c16gauche']: NULL;
															
			$D1C= !empty($_POST['d1constructeur']) ? $_POST['d1constructeur']: NULL;			$D1R=!empty($_POST['d1droite']) ? $_POST['d1droite']: NULL;				$D1L=!empty($_POST['d1gauche']) ? $_POST['d1gauche']: NULL;		  
			$D2C= !empty($_POST['d2constructeur']) ? $_POST['d2constructeur']: NULL;			$D2R=!empty($_POST['d2droite']) ? $_POST['d2droite']: NULL;				$D2L=!empty($_POST['d2gauche']) ? $_POST['d2gauche']: NULL;	  
			$D3C= !empty($_POST['d3constructeur']) ? $_POST['d3constructeur']: NULL;			$D3R=!empty($_POST['d3droite']) ? $_POST['d3droite']: NULL;				$D3L=!empty($_POST['d3gauche']) ? $_POST['d3gauche']: NULL;	  
			$D4C= !empty($_POST['d4constructeur']) ? $_POST['d4constructeur']: NULL;			$D4R=!empty($_POST['d4droite']) ? $_POST['d4droite']: NULL;				$D4L=!empty($_POST['d4gauche']) ? $_POST['d4gauche']: NULL;		  
			$D5C= !empty($_POST['d5constructeur']) ? $_POST['d5constructeur']: NULL;			$D5R=!empty($_POST['d5droite']) ? $_POST['d5droite']: NULL;				$D5L=!empty($_POST['d5gauche']) ? $_POST['d5gauche']: NULL;	  
			$D6C= !empty($_POST['d6constructeur']) ? $_POST['d6constructeur']: NULL;			$D6R=!empty($_POST['d6droite']) ? $_POST['d6droite']: NULL;				$D6L=!empty($_POST['d6gauche']) ? $_POST['d6gauche']: NULL;	  
			$D7C= !empty($_POST['d7constructeur']) ? $_POST['d7constructeur']: NULL;			$D7R=!empty($_POST['d7droite']) ? $_POST['d7droite']: NULL;				$D7L=!empty($_POST['d7gauche']) ? $_POST['d7gauche']: NULL;	  
			$D8C= !empty($_POST['d8constructeur']) ? $_POST['d8constructeur']: NULL;			$D8R=!empty($_POST['d8droite']) ? $_POST['d8droite']: NULL;				$D8L=!empty($_POST['d8gauche']) ? $_POST['d8gauche']: NULL;		  
			$D9C= !empty($_POST['d9constructeur']) ? $_POST['d9constructeur']: NULL;			$D9R=!empty($_POST['d9droite']) ? $_POST['d9droite']: NULL;				$D9L=!empty($_POST['d9gauche']) ? $_POST['d9gauche']: NULL;		  
			$D10C=!empty($_POST['d10constructeur']) ?$_POST['d10constructeur']: NULL;		$D10R=!empty($_POST['d10droite']) ? $_POST['d10droite']: NULL;		$D10L=!empty($_POST['d10gauche']) ? $_POST['d10gauche']: NULL;			  
			$D11C=!empty($_POST['d11constructeur']) ?$_POST['d11constructeur']: NULL;		$D11R=!empty($_POST['d11droite']) ? $_POST['d11droite']: NULL;		$D11L=!empty($_POST['d11gauche']) ? $_POST['d11gauche']: NULL;		  
			$D12C=!empty($_POST['d12constructeur']) ?$_POST['d12constructeur']: NULL;		$D12R=!empty($_POST['d12droite']) ? $_POST['d12droite']: NULL;		$D12L=!empty($_POST['d12gauche']) ? $_POST['d12gauche']: NULL;		  
			$D13C=!empty($_POST['d13constructeur']) ?$_POST['d13constructeur']: NULL;		$D13R=!empty($_POST['d13droite']) ? $_POST['d13droite']: NULL;		$D13L=!empty($_POST['d13gauche']) ? $_POST['d13gauche']: NULL;			  
			$D14C=!empty($_POST['d14constructeur']) ?$_POST['d14constructeur']: NULL;		$D14R=!empty($_POST['d14droite']) ? $_POST['d14droite']: NULL;		$D14L=!empty($_POST['d14gauche']) ? $_POST['d14gauche']: NULL;		  
			$D15C=!empty($_POST['d15constructeur']) ?$_POST['d15constructeur']: NULL;		$D15R=!empty($_POST['d15droite']) ? $_POST['d15droite']: NULL;		$D15L=!empty($_POST['d15gauche']) ? $_POST['d15gauche']: NULL;		  
			$D16C=!empty($_POST['d16constructeur']) ?$_POST['d16constructeur']: NULL;		$D16R=!empty($_POST['d16droite']) ? $_POST['d16droite']: NULL;		$D16L=!empty($_POST['d16gauche']) ? $_POST['d16gauche']: NULL;
			
			
			$datetime = date("Y-m-d H:i:s");
			$anXMLString='<?xml version="1.0"?>
					    <controle id="MAUQUIE">
							<name>Controle</name>
							<date>'.$datetime.'</date>
							<constructeur>'.$constructeur.'</constructeur>
                            <modele>'.$modele.'</modele>
                            <taille>'.$taille.'</taille>
                            <numeroSerie>'.$numSerie.'</numeroSerie>
                            <couleurVoile>'.$couleurVoile.'</couleurVoile>
                            <Porosite>
                                <extrades>
                                    <centre>'.$poroCentreEx.'</centre>
                                    <droite>'.$poroDroiteEx.'</droite>
                                    <gauche>'.$poroGaucheEx.'</gauche>
                                </extrades>
								<intrades>
                                    <centre>'.$poroCentreIn.'</centre>
                                    <droite>'.$poroDroiteIn.'</droite>
                                    <gauche>'.$poroGaucheIn.'</gauche>
                                </intrades>
                            </Porosite>
                            <controleSymetrie>'.$controleSymetrie.'</controleSymetrie>
                            <controleTissu>'.$controleTissu.'</controleTissu>
                            <controleSuspentage>'.$controleSuspentage.'</controleSuspentage>
                            
                            <A1>'.$A1C.';'.$A1R.';'.$A1L.'</A1>
                            <A2>'.$A2C.';'.$A2R.';'.$A2L.'</A2>
                            <A3>'.$A3C.';'.$A3R.';'.$A3L.'</A3>
                            <A4>'.$A4C.';'.$A4R.';'.$A4L.'</A4>
                            <A5>'.$A5C.';'.$A5R.';'.$A5L.'</A5>
                            <A6>'.$A6C.';'.$A6R.';'.$A6L.'</A6>
                            <A7>'.$A7C.';'.$A7R.';'.$A7L.'</A7>
                            <A8>'.$A8C.';'.$A8R.';'.$A8L.'</A8>
                            <A9>'.$A9C.';'.$A9R.';'.$A9L.'</A9>
                            <A10>'.$A10C.';'.$A10R.';'.$A10L.'</A10>
                            <A11>'.$A11C.';'.$A11R.';'.$A11L.'</A11>
                            <A12>'.$A12C.';'.$A12R.';'.$A12L.'</A12>
                            <A13>'.$A13C.';'.$A13R.';'.$A13L.'</A13>
                            <A14>'.$A14C.';'.$A14R.';'.$A14L.'</A14>
                            <A15>'.$A15C.';'.$A15R.';'.$A15L.'</A15>
                            <A16>'.$A16C.';'.$A16R.';'.$A16L.'</A16>
                            
                            <B1>'.$B1C.';'.$B1R.';'.$B1L.'</B1>
                            <B2>'.$B2C.';'.$B2R.';'.$B2L.'</B2>
                            <B3>'.$B3C.';'.$B3R.';'.$B3L.'</B3>
                            <B4>'.$B4C.';'.$B4R.';'.$B4L.'</B4>
                            <B5>'.$B5C.';'.$B5R.';'.$B5L.'</B5>
                            <B6>'.$B6C.';'.$B6R.';'.$B6L.'</B6>
                            <B7>'.$B7C.';'.$B7R.';'.$B7L.'</B7>
                            <B8>'.$B8C.';'.$B8R.';'.$B8L.'</B8>
                            <B9>'.$B9C.';'.$B9R.';'.$B9L.'</B9>
                            <B10>'.$B10C.';'.$B10R.';'.$B10L.'</B10>
                            <B11>'.$B11C.';'.$B11R.';'.$B11L.'</B11>
                            <B12>'.$B12C.';'.$B12R.';'.$B12L.'</B12>
                            <B13>'.$B13C.';'.$B13R.';'.$B13L.'</B13>
                            <B14>'.$B14C.';'.$B14R.';'.$B14L.'</B14>
                            <B15>'.$B15C.';'.$B15R.';'.$B15L.'</B15>
                            <B16>'.$B16C.';'.$B16R.';'.$B16L.'</B16>  
                            
                            
                            <C1>'.$C1C.';'.$C1R.';'.$C1L.'</C1>
                            <C2>'.$C2C.';'.$C2R.';'.$C2L.'</C2>
                            <C3>'.$C3C.';'.$C3R.';'.$C3L.'</C3>
                            <C4>'.$C4C.';'.$C4R.';'.$C4L.'</C4>
                            <C5>'.$C5C.';'.$C5R.';'.$C5L.'</C5>
                            <C6>'.$C6C.';'.$C6R.';'.$C6L.'</C6>
                            <C7>'.$C7C.';'.$C7R.';'.$C7L.'</C7>
                            <C8>'.$C8C.';'.$C8R.';'.$C8L.'</C8>
                            <C9>'.$C9C.';'.$C9R.';'.$C9L.'</C9>
                            <C10>'.$C10C.';'.$C10R.';'.$C10L.'</C10>
                            <C11>'.$C11C.';'.$C11R.';'.$C11L.'</C11>
                            <C12>'.$C12C.';'.$C12R.';'.$C12L.'</C12>
                            <C13>'.$C13C.';'.$C13R.';'.$C13L.'</C13>
                            <C14>'.$C14C.';'.$C14R.';'.$C14L.'</C14>
                            <C15>'.$C15C.';'.$C15R.';'.$C15L.'</C15>
                            <C16>'.$C16C.';'.$C16R.';'.$C16L.'</C16> 
                            
                            <D1>'.$C1C.';'.$C1R.';'.$C1L.'</D1>
                            <D2>'.$C2C.';'.$C2R.';'.$C2L.'</D2>
                            <D3>'.$C3C.';'.$C3R.';'.$C3L.'</D3>
                            <D4>'.$C4C.';'.$C4R.';'.$C4L.'</D4>
                            <D5>'.$C5C.';'.$C5R.';'.$C5L.'</D5>
                            <D6>'.$C6C.';'.$C6R.';'.$C6L.'</D6>
                            <D7>'.$C7C.';'.$C7R.';'.$C7L.'</D7>
                            <D8>'.$C8C.';'.$C8R.';'.$C8L.'</D8>
                            <D9>'.$C9C.';'.$C9R.';'.$C9L.'</D9>
                            <D10>'.$C10C.';'.$C10R.';'.$C10L.'</D10>
                            <D11>'.$C11C.';'.$C11R.';'.$C11L.'</D11>
                            <D12>'.$C12C.';'.$C12R.';'.$C12L.'</D12>
                            <D13>'.$C13C.';'.$C13R.';'.$C13L.'</D13>
                            <D14>'.$C14C.';'.$C14R.';'.$C14L.'</D14>
                            <D15>'.$C15C.';'.$C15R.';'.$C15L.'</D15>
                            <D16>'.$C16C.';'.$C16R.';'.$C16L.'</D16> 
                            
							
						</controle>';
			
			$doc = new  domDocument();
			$doc->loadXML($anXMLString);
			$doc->save('document/controlexml/'.$numSuivi.'.xml');
			
			echo "fichier xml créer";
					
		}
		public function valider_materiel()
		{
			
			$id_fab=$_POST['id_fab'];
			$ref=$_POST['ref'];
			$eq1=$_POST['eq1'];
			$eq2=$_POST['eq2'];
			$eq3=$_POST['eq3'];
			$materiaux=$_POST['materiaux'];
			$rupture=$_POST['rupture'];
			$diam=$_POST['diam'];
			$couleur=$_POST['couleur'];
			$connect = $this->_bdd->openBDD();
			
			
			if($eq1==-1)
			{
				$eq1="null";
			}
			if($eq2==-1)
			{
				$eq2="null";
			}
			if($eq3==-1)
			{
				$eq3="null";
			}
			
			if(($ref != "")&&($id_fab!=-1))
			{
				$sql="INSERT INTO `susp_materiaux`( `id_fab`, `ref`, `eq1`, `eq2`, `eq3`, `mat`, `rupture`, `diam`, `couleur`) VALUES ('$id_fab','$ref','$eq1','$eq2','$eq3','$materiaux','$rupture','$diam','$couleur')";
				$connect->query($sql);
			}
			$this->_bdd->CloseBDD();
			echo '
					<script>
						alert("Succès : Votre materiel a bien etait crée");
						location.href = "index.php?d=vitrine&a=ajouter_voile";
				</script>';
			
		}
		public function valider_voile()
		{
			$nom=$_POST['nom'];
			$id=$_POST['client'];
			$taill=$_POST['taille'];
			$date=$_POST['datesorti'];
			$cert=$_POST['cert'];
			$nb_susp=$_POST['nbSuspente'];
			$planToUpload = "test";
			$valid_annonce = true;
			$manuelToUpload= "test";
			
			$connect = $this->_bdd->openBDD();
			
			if (count($_FILES['planToUpload']['name'])==1 && $_FILES['planToUpload']['name'][0]=='')
			{
				$valid_annonce = false;
				echo '<script>
            		alert("Veuillez ajouter un plan en pdf .");
					location="index.php?d=operateur&a=ajouter_voile";
			   </script>';
			}
			
			
			
			foreach ($_FILES['planToUpload']['tmp_name'] as $key => $val ) {
				$filename = $_FILES['planToUpload']['name'][$key];
				$filesize = $_FILES['planToUpload']['size'][$key];
				$filetmpname = $_FILES['planToUpload']['tmp_name'][$key];
				
				$extension = pathinfo($filename, PATHINFO_EXTENSION);
				$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
				$filename =$nom."_plan.".$extension;
				
				$target_dir ="vue/images/modeleVoile/plan/";
				$target_file = $target_dir . basename($filename);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if file already exists
				while (file_exists($target_file)) {
					$extension = pathinfo($filename, PATHINFO_EXTENSION);
					$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
					$filename = $filename.strval(rand(0,9)).".".$extension;
					$target_file = $target_dir . basename($filename);
				}
				// Check file size
				if ($filesize > 500000000000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType !="pdf") {
					echo "Desoler seul els PDF sont autoriser";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($filetmpname, $target_file)) {
						$filename;
						echo "The file ". basename( $filename). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
				$pathplan=$filename;
			}
			if (count($_FILES['manuelToUpload']['name'])==1 && $_FILES['manuelToUpload']['name'][0]=='')
			{
				$pathManuel="";
				
			}
			else
			{
				foreach ($_FILES['manuelToUpload']['tmp_name'] as $key => $val ) {
					$filename = $_FILES['manuelToUpload']['name'][$key];
					$filesize = $_FILES['manuelToUpload']['size'][$key];
					$filetmpname = $_FILES['manuelToUpload']['tmp_name'][$key];
					
					$extension = pathinfo($filename, PATHINFO_EXTENSION);
					$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
					$filename =$nom."_manuel.".$extension;
					
					$target_dir ="vue/images/modeleVoile/manuel/";
					$target_file = $target_dir . basename($filename);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if file already exists
					while (file_exists($target_file)) {
						$extension = pathinfo($filename, PATHINFO_EXTENSION);
						$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
						$filename = $filename.strval(rand(0,9)).".".$extension;
						$target_file = $target_dir . basename($filename);
					}
					// Check file size
					if ($filesize > 500000000000) {
						echo "dessoler le fichie rest trop large";
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType !="pdf" ) {
						echo "seul les PDF sont autoriser.";	
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "desoler, votre ficheir na pas etait uploader.";
						// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($filetmpname, $target_file)) {
							$filename;
							echo "The file ". basename( $filename). " has been uploaded.";
						} else {
							echo "Sorry, there was an error uploading your file.";
						}
					}
					$pathManuel=$filename;
				}
			}
			if($valid_annonce)
			{
				if($pathManuel=="")
				{
					$sql="INSERT INTO `voile`(`nom`, `id_const`, `nb_tail`, `date_s`, `cert`, `plan`) VALUES ('$nom','$id','$taill','$date','$cert','$pathplan')";
					
				}
				else
				{
					$sql="INSERT INTO `voile`(`nom`, `id_const`, `nb_tail`, `date_s`, `cert`, `plan`, `manuel`) VALUES ('$nom','$id','$taill','$date','$cert','$pathplan','$pathManuel')";
				}
				$connect->query($sql);
				$result=$connect->query("SELECT id FROM `voile` WHERE nom='$nom'");
				$row= $result->fetch_assoc();
				$Id_voile=$row["id"];
				$array=[];
				for($i=1;$i<=$taill;$i++)
				{
					$array[$i]=$_POST["taille$i"];
				}
				$sql="INSERT INTO `voile_taille` ( `Idvoile`";
				for($i=1;$i<=$taill;$i++)
				{
					$sql=$sql.",`T$i`";
				}
				$sql=$sql.") VALUES('$Id_voile'";
				for($i=1;$i<=$taill;$i++)
				{
					$sql=$sql.",'$array[$i]'";
				}
				$sql=$sql.")";
				$connect->query($sql);
				// pour la base de dennée des reference fabriquand
				$value=[];
				for($i=1;$i<=$nb_susp ; $i++)
				{
					$value[$i]=$_POST['reffab'.$i."1"];
				}
				$sql="INSERT INTO `voile_ref_susp_cut`(`idvoile`";
				for($i=1;$i<=$nb_susp;$i++)
				{
					$sql=$sql.",`r$i`";
				}
				$sql=$sql.")  VALUES ('$Id_voile'";
				for($i=1;$i<=$nb_susp;$i++)
				{
					$sql=$sql.",'$value[$i]'";
				}
				$sql=$sql.")";
				$connect->query($sql);
				// pour la basse de donner des taille
				for($fois=1;$fois<=$taill;$fois++)
				{
					$Id_une=$Id_voile.$array[$fois];
					$value=[];
					for($i=1;$i<=$nb_susp ; $i++)
					{
						$value[$i]=$_POST['tailsup'.$i.$fois];
					}
					$sql="INSERT INTO `voile_long_susp_cut`(`idvoile`";
					for($i=1;$i<=$nb_susp;$i++)
					{
						$sql=$sql.",`r$i`";
					}
					$sql=$sql.")  VALUES ('$Id_une'";
					for($i=1;$i<=$nb_susp;$i++)
					{
						$sql=$sql.",'$value[$i]'";
					}
					$sql=$sql.")";
					$connect->query($sql);
					
				}
				// pour la basse de donner des matareiaux
				for($fois=1;$fois<=$taill;$fois++)
				{
					$Id_une=$Id_voile.$array[$fois];
					$value=[];
					for($i=1;$i<=$nb_susp ; $i++)
					{
						$value[$i]=$_POST['materiaux'.$fois.$i];
					}
					$sql="INSERT INTO  `voile_mat_susp_cut` (`idvoile`";
					for($i=1;$i<=$nb_susp;$i++)
					{
						$sql=$sql.",`r$i`";
					}
					$sql=$sql.")  VALUES ('$Id_une'";
					for($i=1;$i<=$nb_susp;$i++)
					{
						$sql=$sql.",'$value[$i]'";
					}
					$sql=$sql.")";
					$connect->query($sql);
					echo $sql;
				}
				$composition=[];
				$letre=array('A','B','C','D','E','br');
				for($all=1;$all<=$taill;$all++)
				{
					for($fois=0;$fois<6;$fois++)
					{
						for($i=1;$i<=25;$i++)
						{
							$composition[$fois.$i.$all]=$_POST['composition'.$fois.$i.$all];
						}
						
					}
					$sql="INSERT INTO `voile_assemblage_sup`(`idvoile`";
					
					foreach ($letre as $sortie)
					{
						for($i=1;$i<=25;$i++)
						{
							$sql.=",`$sortie$i`";
						}
						
					}
					$Id_une=$Id_voile.$array[$all];
					$sql=$sql.") VALUES ('$Id_une'";
					for($fois=0;$fois<6;$fois++)
					{
						for($i=1;$i<=25;$i++)
						{
							$valeur=$fois.$i.$all;
							$sql=$sql.",'$composition[$valeur]'";
						}
						
						
					}
					$sql=$sql.")";
					$connect->query($sql);
					
				}
				for($all=1;$all<=$taill;$all++)
				{
					for($fois=0;$fois<6;$fois++)
					{
						for($i=1;$i<=25;$i++)
						{
							$longeur[$fois.$i.$all]=$_POST['longeur'.$fois.$i.$all];
						}
						
					}
					$sql="INSERT INTO `voile_controle_long`(`idvoile`";
					
					foreach ($letre as $sortie)
					{
						for($i=1;$i<=25;$i++)
						{
							$sql.=",`$sortie$i`";
						}
						
					}
					$Id_une=$Id_voile.$array[$all];
					$sql=$sql.") VALUES ('$Id_une'";
					for($fois=0;$fois<6;$fois++)
					{
						for($i=1;$i<=25;$i++)
						{
							$valeur=$fois.$i.$all;
							$sql=$sql.",'$longeur[$valeur]'";
						}
						
						
					}
					$sql=$sql.")";
					$connect->query($sql);
					
				}
				
			}
			
			$this->_bdd->CloseBDD();
			///header("location: index.php?d=operateur&a=menu");
		}
		public function valider_constructeur()
		{
			$nomc=$_POST['nomc'];
			$ad_www=$_POST['ad_www'];
			$ad_wwwi=$_POST['ad_wwwi'];
			$telephone=$_POST['telephone'];
			$E_mail=$_POST['E_mail'];
			$E_mailI=$_POST['E_mailI'];
			$nom_c1=$_POST['nom_c1'];
			$pre_c1=$_POST['pre_c1'];
			$tel_c1=$_POST['tel_c1'];
			$E_mail_c1=$_POST['E_mail_c1'];
			$qual_c1=$_POST['qual_c1'];
			$nom_c2=$_POST['nom_c2'];
			$pre_c2=$_POST['pre_c2'];
			$tel_c2=$_POST['tel_c2'];
			$E_mail_c2=$_POST['E_mail_c2'];
			$qual_c2=$_POST['qual_c2'];
			//initalise la variable
			$photos = "test";
			$valid_annonce= true;
			$connect = $this->_bdd->openBDD(); // connexion
			if (count($_FILES['photos']['name'])==1 && $_FILES['photos']['name'][0]=='')
			{
				$valid_annonce = false;
				$this->_bdd->CloseBDD();
				echo '<script>
            alert("Veuillez ajouter une image minimum.");
			location="index.php?d=operateur&a=ajouter_voile";
			   </script>'; // si il y a pas d'image
			}
			
			foreach ($_FILES['photos']['tmp_name'] as $key => $val ) {
				$filename = $_FILES['photos']['name'][$key];
				$filesize = $_FILES['photos']['size'][$key];
				$filetmpname = $_FILES['photos']['tmp_name'][$key];
				
				$extension = pathinfo($filename, PATHINFO_EXTENSION);
				$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
				$filename =$nomc.".".$extension;
				
				$target_dir = "../../vue/images/application/fabricant/logo/"; // la ou se situera l'image enregistrée
				$target_file = $target_dir . basename($filename);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($filetmpname);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				
				while (file_exists($target_file)) {
					$extension = pathinfo($filename, PATHINFO_EXTENSION);
					$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
					$filename = $filename.strval(rand(0,9)).".".$extension;
					$target_file = $target_dir . basename($filename);
				}
				// Check file size
				if ($filesize > 500000000000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
							// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($filetmpname, $target_file)) {
								$filename;
								echo "The file ". basename( $filename). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
			}
			if($valid_annonce){
				$sql="INSERT INTO `fabricant`(`nom`, `ad_www`, `ad_wwwi`, `tel`, `mail`, `maili`, `nom_c1`, `prenom_c1`, `tel_c1`, `mail_c1`,
				`q_c1`, `nom_c2`, `pre_c2`, `tel_c2`, `e_mail_c2`, `qual_c2`,`logo`)
				VALUES ('$nomc','$ad_www','$ad_wwwi','$telephone','$E_mail','$E_mailI','$nom_c1','$pre_c1','$tel_c1','$E_mail_c1','
				$qual_c2','$nom_c2','$pre_c2','$tel_c2','$E_mail_c2','$qual_c2','$filename')";
				$connect->query($sql); // update la base de données des fabriquants
				// dans logo sera le chemin d'axée a l'image du logo
			}
			
			
			
			
			$this->_bdd->CloseBDD();// fermeture
			echo '
					<script>
						alert("Succès : Votre constructeur a bien etait crée");
						location.href = "index.php?d=vitrine&a=ajouter_voile";
				</script>';
		}
		public function recuperer_materiaux()
		{
			
			$connect = $this->_bdd->openBDD();
			
			$sql="SELECT id ,ref  From susp_materiaux";
			
			$result=$connect->query($sql);
			$materiaux="<option value='-1'>a rentré</option>";
			while($row = mysqli_fetch_array($result))
			{
				$materiaux=$materiaux."<option value=$row[0]>$row[1]</option>";
			}
			echo $materiaux;
			$this->_bdd->CloseBDD();
		}
		public function  recuperer_voile()
		{
			$id=$_POST["id"];
			$connect = $this->_bdd->openBDD();
			$sql="SELECT * FROM voile where id='$id'";
			$result=$connect->query($sql);
			$atsend="";
			while($row = $result->fetch_array())
			{
				$atsend="$row[1],$row[2],$row[3],$row[4],$row[5],";
				$nbtaille=$row[3];
				
			}
			
			$sql="SELECT * FROM `voile_taille` WHERE idvoile='$id'";
			$result=$connect->query($sql);
			$row = $result->fetch_array();
			
			for($i=1;$i<=$nbtaille;$i++)
			{
				$atsend.=$row[$i].",";
			}
			echo $atsend;
		}
		public function suiviVoile()
		{
			$select_suivi = "";
			$connect = $this->_bdd->openBDD();
			
			// recuperation de tous les suivis
			$result = $connect->query("SELECT id,date_ouverture FROM suivi WHERE statut <> 'cloturé'");
			if(gettype($result)=="object"){
				if($result->num_rows>0){
					while($row = $result->fetch_array())
					{
						$select_suivi= $select_suivi."<option value=".$row[0].">".$row[1]."&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;".$row[0]."</option>";
					}
				}
			}
			$this->_bdd->closeBDD();
			return '<div class="demo-card-wide mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title mdl-card-operateur__background animated slideInDown">
							<h2 class="mdl-card__title-text">Suivi des voiles</h2>
						</div>
						<div class="mdl-card__supporting-text card-background">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--6-col graybox">
									<form action="index.php?d=operateur&a=controle_voile" method="post" enctype="multipart/form-data">
										<select id="select_suivi" class="nice-select" name="select_suivi" onchange="afficherSuivi()" style="visibility:hidden;">
											<option value="-2">Sélectionnez un suivi</option>			
											'.$select_suivi.'
										</select>
										<button id="controle" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
											Création/Modification du contrôle
										</button>
									</form>
									<br/><br/><br/>
									<h5 id="titre" class="animated fade-in" style="visibility:hidden;">Suivi</h5>
									<table id="table" class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp" style="visibility:hidden;">
										<thead>
											<tr>
										  		<th class="mdl-data-table__cell--non-numeric">ID</th>
										  		<th class="mdl-data-table__cell--non-numeric">date d\'ouverture</th>
										  		<th class="mdl-data-table__cell--non-numeric">commentaire</th>
												<th class="mdl-data-table__cell--non-numeric">statut</th>
												<th class="mdl-data-table__cell--non-numeric">opérateur</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="mdl-data-table__cell--non-numeric" id="id"></td>
												<td class="mdl-data-table__cell--non-numeric" id="date_ouverture"></td>
												<td class="mdl-data-table__cell--non-numeric" id="commentaire"></td>
												<td class="mdl-data-table__cell--non-numeric" id="statut"></td>
												<td class="mdl-data-table__cell--non-numeric" id="operateur"></td>
											</tr>
										</tbody>
									</table>
									<div id="champsSuivi" style="visibility:hidden">
										<div class="mdl-textfield mdl-js-textfield">
											<textarea class="mdl-textfield__input" type="text" maxlength="30" rows= "1" id="statut_suivi" name="nouveau_commentaire"></textarea>
											<label class="mdl-textfield__label" for="sample5">Statut</label>
										</div><br/><br/>
										<div class="mdl-textfield mdl-js-textfield">
											<textarea class="mdl-textfield__input" type="text" maxlength="200" rows= "8" id="commentaire_suivi" name="nouveau_commentaire"></textarea>
											<label class="mdl-textfield__label" for="sample5">Commentaire</label>
										</div><br/><br/>
										<button onclick="gestionSuivi()" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"  style="margin-bottom:40px;">
											Modifier le suivi
										</button>
									</div>
								</div>
								<div class="mdl-cell mdl-cell--6-col graybox">
									<div id="tableau_evenement">
									</div>
								</div>
							</div>
							<div id="validation" class="mdl-card__actions mdl-card--border card-background2 animated slideInUp">
								<center>	
									<a href="index.php?d=operateur&a=creer_suivi" ><button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
										Créer un nouveau suivi
									</button></a>
								</center>
							</div>
							<script>afficherSuivi()</script>
						</div>
					</div>
					<script>
						$(document).keyup(function(e) {
							revelerChamps(e.key);
						});
					</script>';
		}
		public function creerSuiviVoile()
		{
			//récupérer un nouvel ID unique de suivi
			$connect = $this->_bdd->openBDD();
			$deroulant_client = "";
			$result = $connect->query("SELECT id,nom,prenom FROM clients WHERE permissions = 1");
			while($row = $result->fetch_array()){
				$deroulant_client.='<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
			}
			
			$this->_bdd->closeBDD();
			return '<div class="demo-card-wide mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title mdl-card-operateur__background animated slideInDown">
							<h2 class="mdl-card__title-text">Création d\'un nouveau suivi</h2>
						</div>
						<div class="mdl-card__supporting-text card-background">
							<h5 class="animated fade-in">Créer un suivi</h5>
							<div class="content-grid mdl-grid">
								<div class="mdl-cell">
									<form  action="index.php?d=operateur&a=valider_creer_suivi" method="post" enctype="multipart/form-data">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<select id="client" style="width: 100%"; class="nice-select" name="client">
												<option value="-2">Client non utilisateur</option>
												'.$deroulant_client.'
											</select>
										</div>
										<div class="mdl-textfield mdl-js-textfield">
								  			<textarea class="mdl-textfield__input" type="text" maxlength="300" rows= "9" id="commentaire" name="commentaire"></textarea>
								  			<label class="mdl-textfield__label" for="commentaire">Commentaire</label>
								   		</div>
										</br>
										<button type="submit" value="Submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Créer</button>
									</form>
								</div>
							</div>
						</div>
					</div>';
		}
		public function validerCreerSuivi($login_session)
		{
			if((isset($_POST["client"]))&&(isset($_POST["commentaire"])))
			{
				
				$connect = $this->_bdd->openBDD();
				date_default_timezone_set('Europe/Brussels');
				
				//on génère un ID de suivi unique
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$myString ="";
				for($i=0;$i<5;$i++){
					$myString .= $chars[rand(0,61)];
				}
				
				//on affecte les bonnes valeurs aux variables utilisés pour les requêtes
				$id_suivi = date("HidmY").$myString;
				$id_client = $_POST["client"];
				$commentaire = $_POST["commentaire"];
				$date = date('d/m/Y');
				
				//Création du suivi dans la table
				$connect->query("INSERT INTO suivi VALUES ('$id_suivi','$date','en cours','$commentaire','receptionné','$id_client','$login_session')");
				
				//Création d'un évènement dans la table suivi_évènement
				$connect->query("INSERT INTO suivi_evenement (id_suivi,operateur,commentaire,date) VALUES ('$id_suivi','$login_session','$commentaire','$date')");
				
				//Récupération du mail du client pour créer une notification
				$result = $connect->query("SELECT email FROM clients WHERE id='$id_client'");
				if(gettype($result)=="object"){
					if($result->num_rows>0){
						while($row = $result->fetch_array()){
							$email = $row[0];
						}
						$message = "Nouvel événement disponible dans le suivi de votre voile.";
						
						//Création d'une notification dans la table correspondante
						$connect->query("INSERT INTO notifications_utilisateur (email,message,active) VALUES ('$email','$message',1)");
					}
				}
				$this->_bdd->closeBDD();
				header("location: index.php?d=operateur&a=menu");
			}
		}
		function recupererEvenementsSuivis(){
			//on récupère tous les événements liés à l'ID de suivi pour formater les données à retourner au javascript
			$id_select = $_POST["id_select"];
			$connect = $this->_bdd->openBDD();
			$result = $connect->query("SELECT commentaire,date,operateur FROM suivi_evenement WHERE id_suivi='$id_select'");
			if(gettype($result)=="object"){
				if($result->num_rows>0){
					while($row = $result->fetch_array()){
						echo $row[0].",".$row[1].",".$row[2].",";
					}
				}
			}
		}
		function recupererSuivi(){
			//On récupère les informations d'un suivi grâce à son ID
			$id_select = $_POST["id_select"];
			$connect = $this->_bdd->openBDD();
			$result = $connect->query("SELECT date_ouverture,commentaire,statut,operateur FROM suivi WHERE id='$id_select'");
			if(gettype($result)=="object"){
				if($result->num_rows>0){
					while($row = $result->fetch_array()){
						echo $row[0].",".$row[1].",".$row[2].",".$row[3];
					}
				}
			}
		}
		function ajouterEvenementSuivi($login_session){
			if((isset($_POST["commentaire"]))&&(isset($_POST["id"]))){
				date_default_timezone_set('Europe/Brussels');
				$date = date('d/m/Y');
				$id=$_POST["id"];
				$commentaire= str_replace("'","\'",$_POST["commentaire"]);
				$commentaire = str_replace(",","&#x2C;",$commentaire);
				$connect = $this->_bdd->openBDD();
				
				//ajout de l'événement dans la base de données
				$connect->query("INSERT INTO suivi_evenement (id_suivi,operateur,commentaire,date) VALUES ('$id','$login_session','$commentaire','$date')");
				
				//On récupère l'ID client lié au suivi
				$result = $connect->query("SELECT id_client FROM suivi WHERE id='$id'");
				if(gettype($result)=="object"){
					if($result->num_rows>0){
						while($row = $result->fetch_array()){
							if($row[0]!=-2){
								
								//on récupère l'email grâce à l'ID retrouvé
								$result = $connect->query("SELECT email FROM clients WHERE id='$row[0]'");
								if(gettype($result)=="object"){
									if($result->num_rows>0){
										$message = "Nouvel événement disponible dans le suivi de votre voile.";
										while($row = $result->fetch_array()){
											
											//On notifie l'utilisateur qu'un nouvel évènement est présent dans le suivi de sa voile
											$connect->query("INSERT INTO notifications_utilisateur (email,message,active) VALUES ('$row[0]','$message',1)");
										}
									}
								}
							}
						}
					}
				}	
			}
		}
		public  function validerModificationVoile()
		{
			$connect=$this->_bdd->openBDD();
			$id=$_POST["voileat"];
			$nbTaile=$_POST["nbtaile"];
			$constructeur=$_POST["fabriquand"];
			$date=$_POST["date"];
			$certification=$_POST["cert"];
			$nom=$_POST["nom"];
			$reponce=$connect->query("SELECT * FROM `voile`WHERE `id`='$id'");
			if($reponce->num_rows>0)
			{
				$row = $reponce->fetch_array();
				$nbOldTaile=$row[3];
			}
			$sql=" UPDATE `voile` SET `nom`='$nom',`id_const`='$constructeur',`nb_tail`='$nbTaile',`date_s`='$date',`cert`='$certification' WHERE `id`='$id' ";
			
			$connect->query($sql);
			
			
			$reponce=$connect->query("SELECT * FROM `voile_taille`WHERE `id`='$id'");
			if($reponce->num_rows>0)
			{
				$row = $reponce->fetch_array();
				for($i=1;$i<=$nbOldTaile;$i++)
				{
					$oldTaile[$i]=$row[$i];
				}
			}
			
			$sql="UPDATE `voile_taille` SET ";
			for($i=1;$i<=$nbTaile;$i++)
			{
				$taile[$i]=$_POST["taille".$i];
				if($i==1)
				{
					$sql.="t".$i."="."'$taile[$i]'";
				}
				else {
					$sql.=",t".$i."="."'$taile[$i]'";
				}
				
			}
			$sql.="WHERE idvoile='$id'";
			$connect->query($sql);
			$connect->query("UPDATE `voile_ref_susp_cut` SET `idvoile`='$id' WHERE `idvoile`='$id'");
			for($i=1;$i<$nbOldTaile;$i++)
			{
				
				$connect->query("UPDATE `voile_mat_susp_cut` SET `idvoile`='$id.$taile[$i]' WHERE `idvoile`='$id.$oldTaile[$i]'");
				$connect->query("UPDATE `voile_assemblage_sup` SET `idvoile`='$id.$taile[$i]' WHERE `idvoile`='$id.$oldTaile[$i]'");
				$connect->query("UPDATE `voile_long_susp` SET `idvoile`='$id.$taile[$i]' WHERE `idvoile`='$id.$oldTaile[$i]'");
				$connect->query("UPDATE `voile_controle_long` SET `idvoile`='$id.$taile[$i]' WHERE `idvoile`='$id.$oldTaile[$i]'");
				
			}
			$this->_bdd->closeBDD();
			header("location: index.php?d=operateur&a=menu");
		}
		public function modificationSuivi($id_suivi,$commentaire,$statut,$operateur){
			/////////////////////////////////////////////////////////////////////////////////
			//utilisation: L'id du suivi est obligatoire ainsi que le mail de l'operateur. //
			//$commentaire et $statut sont optionnels, on peut mettre une string vide.	   //
			//Dans le cas où $commentaire et $statut sont vides, rien ne se passe.		   //
			//Si au moins un de ces deux champs n'est pas vide,							   //
			//On met à jour le suivi, on crée un évènement de suivi et on notifie le client//
			/////////////////////////////////////////////////////////////////////////////////
			
			
			//On récupère l'ID client lié au suivi
			$connect = $this->_bdd->openBDD();
			$result = $connect->query("SELECT id_client FROM suivi WHERE id='$id_suivi'");
			if(gettype($result)=="object"){
				if($result->num_rows>0){
					while($row = $result->fetch_array()){
						if($row[0]!=-2){
							
							//on récupère l'email grâce à l'ID retrouvé
							$result = $connect->query("SELECT email FROM clients WHERE id='$row[0]'");
							if(gettype($result)=="object"){
								if($result->num_rows>0){
									while($row = $result->fetch_array()){
										$mail_client = $row[0];
					
									}
								}
							}
						}
					}
				}
			}
			
			$case="";
			date_default_timezone_set('Europe/Brussels');
			$date = date('d/m/Y');
			
			//On traite les différents cas possibles
			if($statut=="cloturé"){	
				$case = "cloturation";
				if($commentaire!=''){
					$commentaire = str_replace("'","\'",$commentaire);
					$commentaire = str_replace(",","&#x2C;",$commentaire);
					$connect->query("UPDATE `suivi` SET `commentaire`='$commentaire',`date_cloture`='$date',`statut`='$statut',`operateur`='$operateur' WHERE `id`='$id_suivi'");
				}
				else{
					$connect->query("UPDATE suivi SET `date_cloture`='$date',`statut`='$statut',`operateur`='$operateur' WHERE `id`='$id_suivi'");
				}
				$commentaire = "Cloturation du suivi";
				$connect->query("INSERT INTO suivi_evenement (id_suivi,operateur,commentaire,date) VALUES ('$id_suivi','$operateur','$commentaire','$date')");
			}
			else if ($statut!=''){
				$case="MaJ";
				$statut = str_replace("'","\'",$statut);
				if($commentaire!=''){
					$commentaire = str_replace("'","\'",$commentaire);
					$commentaire = str_replace(",","&#x2C;",$commentaire);
					$connect->query("UPDATE `suivi` SET `commentaire`='$commentaire',`statut`='$statut',`operateur`='$operateur' WHERE `id`='$id_suivi'");
					
				}
				else{
					$connect->query("UPDATE `suivi` SET `statut`='$statut',`operateur`='$operateur' WHERE `id`='$id_suivi'");
				}
				$commentaire = "Mise à jour du suivi de la voile";
				$connect->query("INSERT INTO suivi_evenement (id_suivi,operateur,commentaire,date) VALUES ('$id_suivi','$operateur','$commentaire','$date')");
			}
			else{
				$case="MaJ";
				if($commentaire!=''){
					$commentaire = str_replace("'","\'",$commentaire);
					$commentaire = str_replace(",","&#x2C;",$commentaire);
					$connect->query("UPDATE `suivi` SET `commentaire`='$commentaire',`operateur`='$operateur' WHERE `id`='$id_suivi'");
					$commentaire = "Mise à jour du suivi de la voile";
					$connect->query("INSERT INTO suivi_evenement (id_suivi,operateur,commentaire,date) VALUES ('$id_suivi','$operateur','$commentaire','$date')");
				}				
			}
			switch($case){
				case "cloturation":
					//On notifie l'utilisateur que le suivi a été cloturé
					$message = "Le suivi de votre voile a été cloturé";
					$connect->query("INSERT INTO notifications_utilisateur (email,message,active) VALUES ('$mail_client','$message',1)");
				break;
				case "MaJ":
					//On notifie l'utilisateur que le suivi a été mis à jour
					$message = "Le suivi de votre voile a été mis à jour";
					$connect->query("INSERT INTO notifications_utilisateur (email,message,active) VALUES ('$mail_client','$message',1)");
				break;
				default:
					echo "Bad arguments given when calling the function modificationSuivi";
			}
			$this->_bdd->closeBDD();
		}
		public function fichierExiste()
		{
			//on regarde si un fichier xml portant le nom de suivi a été crée
			$id_suivi = $_POST["id_suivi"];
			if(file_exists("document/controlexml/".$id_suivi.".xml"))	{echo "1";}
			else														{echo "0";}
		}
		public function valider()
		{
			$id=$_POST["id"];
			$connect = $this->_bdd->openBDD();
			$connect->query("UPDATE `voile` SET `valider`='1'WHERE `id`=$id");
			$this->_bdd->closeBDD();
		}
		public function suprimer()
		{
			
			$id=$_POST["id"];
			$connect = $this->_bdd->openBDD();
			$reponce=$connect->query("SELECT `nb_tail`FROM `voile` WHERE `id`='$id'");
			if($reponce->num_rows>0)
			{
				$row = $reponce->fetch_array();
				$nbTaile=$row[0];
			}
			$reponce=$connect->query("SELECT * FROM `voile_taille` WHERE `id`='$id'");
			if($reponce->num_rows>0)
			{
				$row = $reponce->fetch_array();
			}
			for($i=1;$i<=$nbTaile;$i++)
			{
				$taile[$i]=$row[$i];
				$connect->query("DELETE FROM `voile_assemblage_sup` WHERE `id`='$id.$taile[$i]'"); 
				$connect->query("DELETE FROM `voile_controle_long` WHERE `id`='$id.$taile[$i]'"); 
				$connect->query("DELETE FROM `voile_long_susp_cut`  WHERE `id`='$id.$taile[$i]'"); 
				$connect->query("DELETE FROM `voile_mat_susp_cut` WHERE `id`='$id.$taile[$i]'"); 
				$connect->query("DELETE FROM `voile_ref_susp_cut` WHERE `id`='$id.$taile[$i]'"); 
			}
			$connect->query("DELETE FROM `voile` WHERE `id`='$id'"); 
			$connect->query("DELETE FROM `voile_taille` WHERE `id`='$id'"); 		
			$this->_bdd->closeBDD();
			echo("ok");
		}

	}
}







?>
