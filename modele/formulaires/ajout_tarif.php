<?php
include 'connect.php';
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$typetarif = $_POST['typeTarif'];

$nom = $_POST['tarifName'];

$valeurHT = $_POST['tarifHT'];
$valeurHT = str_replace("�","",$valeurHT);

$valeurTTC = $_POST['tarifTTC'];
$valeurTTC = str_replace("�","",$valeurTTC);

$valeurPCT = $_POST['tarifPCT'];
$valeurPCT = str_replace("%","",$valeurPCT);

$TVA = $valeurHT+20*$valeurHT/100;
$valeurTTC = number_format($TVA, 2, '.', '');

if($typetarif == 0)
{
	$typetarif = "tarifs_revision";
	$sql = "INSERT INTO `tarifs_revision`(`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES ('','$nom','$valeurHT','$valeurTTC','$valeurPCT')";
}
elseif($typetarif == 1)
{
	$typetarif = "tarifs_reparation";
	$sql = "INSERT INTO `tarifs_reparation`(`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES ('','$nom','$valeurHT','$valeurTTC','$valeurPCT')";
}
elseif($typetarif == 2)
{
	$typetarif = "tarifs_articles";
	$sql = "INSERT INTO `tarifs_articles`(`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES ('','$nom','$valeurHT','$valeurTTC','$valeurPCT')";
}

$connect->query($sql);
$connect->close();


//Ecriture du tarif ajouté dans le fichier logfile.txt
$contenu = date('Y-m-d h:i:s').' --- Ajout dans la table "'.$typetarif.'" de '.$_POST['tarifName'].' à '.$_POST['tarifHT'].' '.$valeurTTC.'€ '.$_POST['tarifPCT'].' par "'.$login_session.'"'."\r\n";
//Ouverture du répertoire de destination
$fichier = fopen ("../modelisation/logs/".$logfile, "a+");
//Copie du fichier
fwrite($fichier, $contenu);
//Fermeture du fichier
fclose ($fichier);
//Fin écriture


header("location: ../../index.php?d=administrateur&a=tarifs");
?>