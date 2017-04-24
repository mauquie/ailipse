<?php
//////////////////////////////////////////////////////////////////////////////////
//																				//
//	Modèle :																	//
//		administration.php														//
//																				//
//	Accessible à :																//
//		Administrateur															//
//																				//
//////////////////////////////////////////////////////////////////////////////////

// Connexion à la base de données
$connect = $posibility->OpenBDD();	// ouverture de la BDD avec l'objet créé dans session.php qui est accéssible dans le noyau
$query="SELECT * FROM `clients`";		
$result = mysqli_query($connect ,$query);		// recuperation de tous les clients

$deroulant = "<option value='-2'> </option>			
			  <option value='-1'> </option>";			// tampon pour l'affichage 
while($row = mysqli_fetch_array($result))
{
    $deroulant = $deroulant."<option value=$row[0]>$row[1]</option>";		// ajout de tous les clients avec $row[0]=id et $row[1] leur email 
}

$posibility->CloseBDD($connect);		// fermeture de la connexion à la BDD

// On vérifie que l'utilisateur est bien connecté, sinon on restreint l'accès
if(!isset($login_session)) {		// condition d'étre connecté pour acceder a cette page 
	header("location: index.php");	// redirection si non 
} else {
	$contenu =$posibility->administration($deroulant);		// affichage avec toutes les valeurs

}

?>