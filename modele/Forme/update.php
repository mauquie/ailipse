<?php
// Connexion à la base de données
include ('../Class_BDD.php');

$bd = new BDD();

$connect=$bd->OpenBDD();

$email=$_POST["email"];
$new_password=$_POST["password"];
$verification=$_POST["verification"];
$rue_expedition=$_POST["rue_expedition"];
$code_postal_expedition=$_POST["code_postal_expedition"];
$ville_expedition=$_POST["ville_expedition"];
$rue_facturation=$_POST["rue_facturation"];
$code_postal_facturation=$_POST["code_postal_facturation"];
$ville_facturation=$_POST["ville_facturation"];


if(($new_password==$verification)&&($new_password!=""))
{
	$new_password=sha1($verification);
	$sql="UPDATE clients SET password='$new_password', ville_expedition='$ville_expedition', rue_expedition='$rue_expedition',code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation' WHERE  email='$email'";
}
else
{
	$sql="UPDATE clients SET ville_expedition='$ville_expedition', rue_expedition='$rue_expedition', code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation'  WHERE  email='$email'";
	
}
$connect->query($sql);
 
$bd->CloseBDD($connect);
unset($bd);
	header("location: ../../index.php?a=profil");
?>