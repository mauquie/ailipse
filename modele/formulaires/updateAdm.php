<?php
// Connexion à la base de données
include 'connect.php';

$connect = new mysqli($hostname, $username, $password, $databaseName);

$id=$_GET["id"];
$email=$_GET["email"];
$new_password=$_GET["password"];
$verification=$_GET["verification"];
$rue=$_GET["rue_exp"];
$code=$_GET["code_postal_exp"];
$ville=$_GET["ville_exp"];
$rueFac=$_GET["rue_fac"];
$codeFac=$_GET["code_postal_fac"];
$villeFac=$_GET["ville_fac"];
$prenom=$_GET["prenom"];
$nom=$_GET["nom"];
$telephone=$_GET["telephone"];
$activa = $_GET["activation"];$operateur = $_GET["operateur"];$result = $connect->query("SELECT * FROM clients WHERE email='$email'");if($result->num_rows > 0){	while($row = $result->fetch_assoc())	{		$permissions = $row["permissions"];	}}
// A modifier : changer le champ de la base de données pour que ce soit un bool
if($activa == "true")
{
	$activation = 1;
}
if($activa =="false")
{
	$activation = 0;
}if ($permissions != 3){	if ($operateur == "true")	{		$operateur = 2;	}		if ($operateur == "false")	{		$operateur = 1;		}}else{	$operateur = 3;}

if(($new_password==$verification)&&($new_password!=""))
{
	$new_password=sha1($verification);
	$sql="UPDATE clients SET  email='$email' ,
	password='$new_password' ,
	ville_expedition='$ville' ,
	rue_expedition='$rue',
	code_postal_expedition='$code' ,
	ville_facturation='$villeFac' ,
	rue_facturation='$rueFac',
	code_postal_facturation='$codeFac',
	actif='$activation' ,	permissions ='$operateur',
	telephone='$telephone',
	nom='$nom',
	prenom='$prenom' 
	WHERE  id='$id'";
}
else
{
	$sql="UPDATE clients SET email='$email',
	ville_expedition='$ville' ,
	rue_expedition='$rue',
	code_postal_expedition='$code' ,
	ville_facturation='$villeFac' ,
	rue_facturation='$rueFac',
	code_postal_facturation='$codeFac',
	actif='$activation' ,	permissions ='$operateur',
	telephone='$telephone',
	nom='$nom',
	prenom='$prenom'
	WHERE id='$id' ";
	
}
$connect->query($sql);
 
$connect->close();
?>