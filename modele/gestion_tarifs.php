<?php
include 'Forme/connect.php';
$connect=new mysqli($hostname, $username, $password, $databaseName);
mysqli_set_charset($connect,"utf8");
$reponse = $connect->query('SELECT * FROM tarifsrevision UNION SELECT * FROM tarifsreparation UNION SELECT * FROM tarifsarticles');
$contenu="";
$i = 0;
while($donnees = $reponse->fetch_array())
{
	if($i==0){	
		$contenuRevision = '<div class="demo-card-wide mdl-card mdl-shadow--2dp">
						<div class="mdl-card__supporting-text card-background" style="width:99%;">
					 <div class="tableau"">
					 <form action="modele/Forme/validation_tarif.php" method="post">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto;">
							<tr><th colspan="4" style="text-align:left; font-size:18px;">Tarifs atelier lors d\'une révision</th></tr>
							<tr>
								<th></th>
								<th style="text-align:left; font-size:18px;">Tarif HT</th>
								<th style="text-align:left; font-size:18px;">Tarif TTC</th>
								<th style="text-align:left; font-size:18px;">%Pro</th>
							</tr>
							<tr>
								<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--6-col">'.$donnees['nom'].' :</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifttc'].'€"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
							</tr>';
	}
	else{
		$contenuRevision = '<tr>
						<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--6-col">'.$donnees['nom'].' :</td>
						<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
								<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€"  id="datesortie" style="text-align:right; width:50%;">
								<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
							</div>
						</td>
						<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
								<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifttc'].'€"  id="datesortie" style="text-align:right; width:50%;">
								<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
							</div>
						</td>
						<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
								<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%"  id="datesortie" style="text-align:right; width:50%;">
								<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
							</div>
						</td>
					</tr>';
					
	}
	$contenuReparation = '</br><div class="tableau">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto;">
							<tr><th colspan="4" style="text-align:left; font-size:18px;">Tarifs atelier lors d\'une réparation</th></tr>
							<tr>
								<th></th>
								<th style="text-align:left; font-size:18px;">Tarif HT</th>
								<th style="text-align:left; font-size:18px;">Tarif TTC</th>
								<th style="text-align:left; font-size:18px;">%Pro</th>
							</tr>
							<tr>
								<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--6-col">'.$donnees['nom'].' :</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifttc'].'€"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
							</tr>';
	
	$contenuArticles = '</br></br><div class="tableau">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="margin:auto;">
							<tr><th colspan="4" style="text-align:left; font-size:18px;">Tarifs articles</th></tr>
							<tr>
								<th></th>
								<th style="text-align:left; font-size:18px;">Tarif HT</th>
								<th style="text-align:left; font-size:18px;">Tarif TTC</th>
								<th style="text-align:left; font-size:18px;">%Pro</th>
							</tr>
							<tr>
								<td align="left" style="text-align:left; font-size:16px" class="mdl-cell mdl-cell--6-col">'.$donnees['nom'].' :</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifHT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifht'].'€"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifTTC'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['tarifttc'].'€"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
								<td align="center" valign="top" class="mdl-cell mdl-cell--2-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:150px;">
										<input name="tarifPCT'.$i.'" class="mdl-textfield__input" type="text" value="'.$donnees['pourcent'].'%"  id="datesortie" style="text-align:right; width:50%;">
										<label class="mdl-textfield__label" for="sample3" id="datesortie" style="width:50%;"></label>	
									</div>
								</td>
							</tr>';
							
	if($i==10)
	{
		$contenu=$contenu.'</table>'.$contenuReparation;
	}
	elseif($i==16){
		$contenu=$contenu.'</table>'.$contenuArticles;
	}
	else{
		$contenu=$contenu.$contenuRevision;
	}
	
	$i++;
}
$contenu = $contenu.'</table></br>
						<center><button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
							Valider les modifications apportées
						</button></center>
					</form>
			</div></div></div>';
?>