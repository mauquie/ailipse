<?php
include 'connect.php';
$connect = new mysqli($hostname, $username, $password, $databaseName); // ouverture 

$id=$_GET["ids"];
$dir_f =  "../../vue/images/annonces/"; 
$array=explode(";",$id); // transforme un string en array quand le string est avec des ; ; 

for($i=0;$i<(count($array)-1);$i++)
{
	// On initialise la variable tampon photos
	$photos="";
	// On sélectionne dans la BDD le champ photo pour récupérer les photos propres à l'annonce
	$sql="SELECT photo FROM annonces WHERE id='$array[$i]'";
	$result=$connect->query($sql);
	while($row = $result->fetch_array())
	{
		$photos = explode(",",$row[0]);
		foreach ($photos as $key => $value){
			if($photos[$key]!=""){
				unlink($dir_f.$photos[$key]);
			}
		}
	}
	
	$sql="SELECT active FROM annonces WHERE id='$array[$i]'";
	$result=$connect->query($sql);
	while($row = $result->fetch_array())
	{
		// Si l'annonce n'est pas activée
		if ($row[0] == 0)
		{
			// On décrémente le compteur de notification des annonces
			$sql="UPDATE notifications SET annonces = annonces-1 WHERE id = 1";
			$connect->query($sql);
		}
	}
	// On supprime toutes les annonces d'ou on recoit l'id 
	$sql="DELETE FROM annonces WHERE id='$array[$i]'";
	$connect->query($sql);
}


$connect->close(); // fermeture de la connexion 

?>