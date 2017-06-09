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
								<div class="mdl-cell">
									<div class="longerSuspentecontain" name="longerSuspentecontain" id="longerSuspentecontain"  style="visibility: hidden">
										<a href="#popup_tableau2" class="mdl-button mdl-js-button mdl-button--primary" style="text-decoration:none; color:rgb(96,125,139)">longueur des suspentes</a>
									</div>
								</div>
								<div class="mdl-cell">
									<div class="materiauxSuspentecontin" name="materiauxSuspentecontin" id="materiauxSuspentecontin" style=" visibility: hidden">
										<a href="#popup_tableau3" class="mdl-button mdl-js-button mdl-button--primary" style="text-decoration:none; color:rgb(96,125,139)">reference fabriquant des suspente </a>
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
									<div class="popup">
								<h2>Référance fabricant des suspentes</h2>
								<a class="close" href="#">&times;</a>
								<div class="valeur_taille" id="valeur_taille">
					
								</div>
								<br />
								<hr />
							</div>
						</div>
					
					
						<div id="popup_tableau2" class="overlay">
							<div class="popup">
								<h2>longeur des supente </h2>
								<a class="close" href="#">&times;</a>
								<div class="longerSuspente" id="longerSuspente">
					
								</div>
								<br />
								<hr />
							</div>
						</div>
					
						<div id="popup_tableau3" class="overlay">
							<div class="popup">
								<h2>materiaux des suspente </h2>
								<a class="close" href="#">&times;</a>
								<div class="materiauxSuspente" id="materiauxSuspente">
					
								</div>
							</div>
						</div>
						<div id="popup_tableau4" class="overlay">
							<div class="popup">
								<h2>compisition d\'une ligne</h2>
								<a class="close" href="#">&times;</a>
								<div class="compositionligne" id="compositionligne">
									
								</div>
							</div>
						</div>
						<div id="popup_tableau5" class="overlay">
							<div class="popup">
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
			$add='';
			if($this->_permissions==3)
			{
				$add=	'<div class="mdl-cell"  style="margin-bottom: 50px;">
								<figure><a href="index.php?d=operateur&a=valider_addmin"><img width="250" height="200" src="vue/images/valider.png" /></a></figure>
								<span>Valider constructeur</span>
							</div>';
			}
			return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title mdl-card-operateur__background animated slideInDown">
						<h2 class="mdl-card__title-text">Opérateur</h2>
						</div>
							<div class="mdl-card__supporting-text card-background">
					
							<h5 class="animated fadeIn">Sélectionnez une action</h5>
					
							<br />
					
							<div class="content-grid mdl-grid hover01 column animated zoomInDown">
								<div class="mdl-cell" style="margin-left: 25px; margin-bottom: 50px;">
									<figure><a href="index.php?d=operateur&a=controle_voile"><img width="250" height="200" src="vue/images/controler.png" /></a></figure>
									<span>Contrôler une voile</span>
								</div>
						
								<div class="mdl-cell"  style="margin-bottom: 50px;">
									<figure><a href="index.php?d=operateur&a=suivi"><img width="250" height="200" src="vue/images/suivi.png" /></a></figure>
									<span>Suivre une voile</span>
								</div>
						
								'.$add.'

							</div>

							<div class="content-grid mdl-grid hover01 column animated zoomInDown">
								<div class="mdl-cell"  style="margin-left: 25px; margin-bottom: 50px;">
									<figure><a href="index.php?d=operateur&a=ajouter_voile"><img width="250" height="200" src="vue/images/ajouter.png" /></a></figure>
									<span>Ajouter une voile</span>
								</div>

								<div class="mdl-cell"  style="margin-bottom: 50px;">
									<figure><a href="index.php?d=operateur&a=modifier_voile"><img width="250" height="200" src="vue/images/modifier.png" /></a></figure>
									<span>Modifier constructeur</span>
								</div>
						
								<div class="mdl-cell"  style="margin-bottom: 50px;">
									<figure><img width="250" height="200" src="vue/images/supprimer.png" /></figure>
									<span>Supprimer une voile</span>
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
								<select id='nbtaile' class='nice-select' name='nbtaile'>
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

			$queryconstr="SELECT * FROM `fabricant`";
			$querymodele="SELECT * FROM `voile`";				

			$resultconstr = mysqli_query($connect ,$queryconstr);		// recuperation de tous les clients
			$resultmodele = mysqli_query($connect ,$querymodele);	
			$constructeur = "<option value='-2'> </option>			
									<option value='-1'> </option>";			// tampon pour l'affichage 
			$modele = "<option value='-2'> </option>			
									<option value='-1'> </option>";
									
			while($row = mysqli_fetch_array($resultconstr))
			{
				$constructeur = $constructeur."<option value=$row[0]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id 
																					// et $row[1] leur email 
			}
			while($row = mysqli_fetch_array($resultmodele))
			{
				$modele = $modele."<option value=$row[0]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id 
																					// et $row[1] leur email 
			}
			return('<div class="demo-card-wide mdl-card mdl-shadow--2dp">

						<div class="mdl-card__supporting-text card-background">

							<form action="index.php?d=operateur&a=valider_controle" method="post">
								<div id="global">
									<div id="gauche">
										<select style="padding-right: 150px;" id="constructeur" class="nice-select" name="constructeur" onchange="affich()">
											<?php 
												echo('.$constructeur.');
											?>
										</select>
										<select id="nbligne" class="nice-select" name="ligne">
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="12">11</option>
											<option value="12">12</option>
											
										</select>
									</div>
									<div id="droite">
										<select style="padding-right: 150px;" id="modèle" class="nice-select" name="modele" onchange="affich()">
											<?php 
												echo('.$modele.');
											?>
										</select>
										<select id="nbsuspentes" class="nice-select" name="ligne">
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
								<button id="validtableau" class="mdl-button mdl-js-button mdl-button--raised" type="button" onclick="CreateTable()">Valider</button>									
       									<div id="colonne2">Ligne</div>
										<div id="colonne1">suspente</div>
										<div id="tableur" class="mdl-cell">
										<div class="table_suite" id="table_suite" style="width:1250px;"> 				
										</div></br>
									</div>
									<center><button id="validvoile" class="mdl-button mdl-js-button mdl-button--raised" type="submit">Valider la voile</button></center>
								</div>
							</form>
						</div>

					</div>	');
		}
		
		public function ValideControleVoile()
		{
			$datetime = date("Y-m-d H:i:s");
			$anXMLString='<?xml version="1.0"?>
					    <controle id="MAUQUIE">
							<name>Controle</name>
							<date>'.$datetime.'</date>
									
							<AR></AR><AR></AR><AR></AR><AR>-14</AR><AR>-22</AR><AR>-20</AR><AR>-20</AR><AR>-20</AR><AR>-24</AR><AR>-32</AR><AR>-26</AR><AR>-29</AR>
							<BR>-23</BR><BR>-15</BR><BR>-20</BR><BR>-200</BR><BR>-19</BR><BR>-200</BR><BR>-17</BR><BR>-25</BR><BR>-23</BR><BR>-21</BR><BR>-21</BR><BR>-210</BR>
							<CR>-21</CR><CR>-21</CR><CR>-17</CR><CR>-21</CR><CR>-25</CR><CR>-20</CR><CR>-27</CR><CR>-27</CR><CR>-20</CR><CR>-27</CR><CR>-26</CR><CR>-25</CR>
							<DR>-30</DR><DR>-32</DR><DR>-270</DR><DR>-35</DR><DR>-24</DR><DR>-240</DR><DR>-27</DR><DR>-28</DR><DR>-28</DR><DR>-24</DR><DR>-310</DR><DR>-28</DR>
									
							<AL>-20</AL><AL>-17</AL><AL>-17</AL><AL>-22</AL><AL>-23</AL><AL>-23</AL><AL>-23</AL><AL>-20</AL><AL>-24</AL><AL>-29</AL><AL>-30</AL><AL>-30</AL>
							<BL>-22</BL><BL>-19</BL><BL>-170</BL><BL>-23</BL><BL>-26</BL><BL>-26</BL><BL>-21</BL><BL>-23</BL><BL>-280</BL><BL>-27</BL><BL>-30</BL><BL>-29</BL>
							<CL>-26</CL><CL>-24</CL><CL>-20</CL><CL>-22</CL><CL>-25</CL><CL>-240</CL><CL>-28</CL><CL>-29</CL><CL>-30</CL><CL>-29</CL><CL>-27</CL><CL>-32</CL>
							<DL>-320</DL><DL>-32</DL><DL>-310</DL><DL>-36</DL><DL>-30</DL><DL>-29</DL><DL>-280</DL><DL>-32</DL><DL>-31</DL><DL>-27</DL><DL>-330</DL><DL>-36</DL>
						</controle>';
			
			$doc = new  domDocument();
			$doc->loadXML($anXMLString);
			$doc->save("lool.xml");
			
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
					echo "Sorry, only pdf files are allowed.";
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
						echo "Sorry, your file is too large.";
						$uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType !="pdf" ) {
						echo "Sorry, only pdf files are allowed.";
						$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "Sorry, your manual was not uploaded.";
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
				$id_voile="etst";
				if($pathManuel=="")
				{
					$sql="INSERT INTO `voile`(`nom`, `id_const`, `nb_tail`, `date_s`, `cert`, `plan`) VALUES ('$nom','$id','$taill','$date','$cert','$pathplan')";
					
				}
				else
				{
					$sql="INSERT INTO `voile`(`nom`, `id_const`, `nb_tail`, `date_s`, `cert`, `plan`, `manuel`) VALUES ('$nom','$id','$taill','$date','$cert','$pathplan','$pathManuel')";
				}
				$connect->query($sql);
				$sql="SELECT id FROM `voile` WHERE nom='$nom'";
				$result=$connect->query($sql);
				
				while($row[]= $result->fetch_assoc())
				{
					foreach($row[0] as $value){
						$Id_voile=$value;
					}
				}
				$array=[];
				for($i=1;$i<=$taill;$i++)
				{
					$array[$i]=$_POST["taille$i"];
				}
				$sql="INSERT INTO `voile_taille` ( `Id-voile`";
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
				for($fois=1;$fois<=$taill;$fois++)
				{
					$Id_une=$id_voile.$array[$fois];
					$value=[];
					for($i=1;$i<=$nb_susp ; $i++)
					{
						$value[$i]=$_POST['reffab'.$i.$fois];
					}
					$sql="INSERT INTO `voile_ref_susp_cut`(`idvoile`";
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
					echo $sql."\r\n";
				}
				// pour la basse de donner des taille
				for($fois=1;$fois<=$taill;$fois++)
				{
					$Id_une=$id_voile.$array[$fois];
					$value=[];
					for($i=1;$i<=$nb_susp ; $i++)
					{
						$value[$i]=$_POST['tailsup'.$i.$fois];
					}
					$sql="INSERT INTO `voile_long_sups_cut`(`idvoile`";
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
					echo $sql."\r\n";
				}
				// pour la basse de donner des matareiaux
				for($fois=1;$fois<=$taill;$fois++)
				{
					$Id_une=$id_voile.$array[$fois];
					$value=[];
					for($i=1;$i<=$nb_susp ; $i++)
					{
						$value[$i]=$_POST['materiaux'.$fois.$i];
					}
					$sql="INSERT INTO  ` voile_mat_susp_cut` (`idvoile`";
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
					echo $sql."\r\n";
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
					$Id_une=$id_voile.$array[$all];
					$sql=$sql.") VALUES ('$id_voile'";
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
				// la longeur d
				for($all=1;$all<=$taill;$all++)
				{
					for($fois=0;$fois<6;$fois++)
					{
						for($i=1;$i<=25;$i++)
						{
							$longeur[$fois.$i.$all]=$_POST['longeur'.$fois.$i.$all];
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
					$Id_une=$id_voile.$array[$all];
					$sql=$sql.") VALUES ('$id_voile'";
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
			header("location: index.php?d=operateur&a=menu");
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
							<center>
								<a href="index.php?d=operateur&a=creer_suivi" ><button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
									Créer un nouveau suivi
								</button></a>
							</center>
							<hr/>
							<select id="select_suivi" class="nice-select" name="select_suivi" onchange="afficherSuivi()">
								<option value="-2">Sélectionnez un suivi</option>			
								'.$select_suivi.'
							</select>
							<br/><br/><br/>
							<h5 class="animated fade-in">Suivi</h5>
							<table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
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
							<div id="tableau_evenement">
							</div>
							<script>afficherSuivi()</script>
						</div>
					</div>';
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
			$sql=" UPDATE `voile` SET `nom`='$nom',`id_const`='$constructeur',`nb_tail`='$nbTaile',`date_s`='$date',`cert`='$certification' WHERE `id`='$id' ";
			
			$connect->query($sql);
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
			
			$this->_bdd->closeBDD();
			header("location: index.php?d=operateur&a=menu");
		}
	}
}







?>
