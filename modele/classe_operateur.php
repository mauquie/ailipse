<?php
if(!class_exists("Operateur"))
{
	class Operateur extends Utilisateur
	{
		
		public function __construct()
		{
		}
		
		public function ajoutVoile()
		{
			$connect = $this->openBDD();
			$sql="SELECT * from fabricant";
			$result= $connect->query($sql);
			
			$fabricant="<option value='-2'> </option>
						  <option value='-1'> </option>";
			while($row=mysqli_fetch_array($result))
			{
				$fabricant=$fabricant."<option value=$row[0]>$row[1]</option>";
			}
			$sql="SELECT id ,ref from susp_materiaux";
			$result=$connect->query($sql);
			$materiaux="<select id='materiaux' class='nice-select' style='width:50%'>
							<option value='-1'> </option>";
			while($row = mysqli_fetch_array($result))
			{
				$materiaux=$materiaux."<option value=$row[0]>$row[1]</option>";
			}
			$materiaux=$materiaux."</select>";
			
			$this->closeBDD();
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
									<?php
											echo('.$fabricant.');
									?>
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
										Ajouter matriaux
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
						</form>
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
			$connect = $this->openBDD();
			$sql="SELECT * from fabricant";
			$result= $connect->query($sql);
			
			$fabricant="<option value='-2'> </option>
						<option value='-1'> </option>";
			while($row=mysqli_fetch_array($result))
			{
				$fabricant=$fabricant."<option value=$row[0]>$row[1]</option>";
			}
			$sql="SELECT id ,ref  From susp_materiaux";
			
			$result=$connect->query($sql);
			$materiaux="<option value='-1'> </option>";
			while($row = mysqli_fetch_array($result))
			{
				$materiaux=$materiaux."<option value=$row[0]>$row[1]</option>";
			}
			$materiaux;
			$this->closeBDD();
			
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
									<?php
											echo(".$fabricant.");
									?>
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
									<?php
											echo(".$materiaux.");
									?>
								</select>
							</div>
							<br />
						<br />
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<select id='eq2' class='nice-select' name='eq2'>
									<?php
											echo(".$materiaux.");
									?>
								</select>
							</div><br />
						<br />
							<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
								<select id='eq3' class='nice-select' name='eq3'>
									<?php
											echo(".$materiaux.");
									?>
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
			$connect = $this->openBDD();
			
			$sql="SELECT * from voile WHERE valider=0 ";
			$result= $connect->query($sql);
			
			$voile="<option value='-1'> </option>";
			while($row=mysqli_fetch_array($result))
			{
				$voile=$voile."<option value=$row[0]>$row[1]</option>";
			}
			
			$sql="SELECT * from fabricant";
			$result= $connect->query($sql);
			
			$fabricant="<option value='-2'> </option>
						<option value='-1'> </option>";
			while($row=mysqli_fetch_array($result))
			{
				$fabricant=$fabricant."<option value=$row[0]>$row[1]</option>";
			}
			$this->closeBDD();
			return("
				<div class='demo-card-wide mdl-card mdl-shadow--2dp'>
					<div class='mdl-card__title mdl-card-operateur__background animated slideInDown'>
					<h2 class='mdl-card__title-text'>modification de voile non valider</h2>
					</div>
					<div class='mdl-card__supporting-text card-background'>
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
								<select id='nbtaile' class='nice-select' name='taille'>
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
						//a metre les diferent tableux en pop up par fonction js sur le selecte
						</div>
						<div class='mdl-cell'>
						<input name='nom' class='mdl-textfield__input' type='text' id='nom'>
								<label class='mdl-textfield__label' for='nom'>nom12</label>
						//a metre les diferent tableux en pop up par fonction js sur le selecte
						</div>
					</div>
					</div>
			</div>
			");
			
			
			
			
		}
		public function ControleVoile()
		{
			
			$connect = $this->openBDD();	// ouverture de la BDD avec l'objet créé dans session.php qui est accéssible dans le noyau

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

				<form action="modele/confirm_xml.php" method="post">
				<select id="constructeur" class="nice-select" name="constructeur" onchange="affich()">
					<?php 
						echo('.$constructeur.');
					?>
					</select>
					
					<select id="modele" class="nice-select" name="modele" onchange="affich()">
					<?php 
						echo('.$modele.');
					?>
					</select>
					<button class="mdl-button mdl-js-button mdl-button--raised" type="button" onclick="affichTable()">Valider</button>
					</form>');
		}
	}
}







?>