<?php
if(isset($_POST["marque"]) && isset($_POST["modele"]) && isset($_POST["taille"])&& isset($_POST["annee"]) && isset($_POST["contenu_annonce"]) && isset($_POST["localisation"]))
{
	if(($_POST["marque"]!=-2) && ($_POST["modele"]!=-2) && ($_POST["taille"]!=-2) && ($_POST["annee"]!=-2) && ($_POST["localisation"]!=-2))
	{
		$marque = $_POST["marque"];
		$modele = $_POST["modele"];
		$taille = $_POST["taille"];
		$annee = $_POST["annee"];
		$contenu_annonce = $_POST["contenu_annonce"];
		$localisation = $_POST["localisation"];
		//
		echo "marque=".$marque;
		echo "modele=".$modele;
		echo "taille=".$taille;
		echo "annee=".$annee;
		echo "contenu_annonce=".$contenu_annonce;
		echo "localisation=".$localisation;
		if(isset($_POST["surface"]))	{$surface = $_POST["surface"];}
		else							{$surface = "Non connue";}
		if(isset($_POST["ptv"]))	{$ptv = $_POST["ptv"];}
		else							{$ptv = "Non connue";}
		// Récupération des paramètres de la base de données
		$hostname = "localhost";
		$username = "admin";
		$password = "toor";
		$databaseName = "ailipset921";
		// Connexion à la base de données
		$connect = mysqli_connect($hostname, $username, $password, $databaseName);
		$connect->query("SET character_set_client=utf8");
		$connect->query("SET character_set_connection=utf8");
		$connect->query("SET character_set_results=utf8");
		
		$db_names = "";
		// Récupération des variables précédemment rentrées dans le formulaire
		$type_annonce = ($_POST['type_annonce']);		
		$titre = $_POST['titre'];
		$contenu = $_POST['contenu'];
		$prix = $_POST['prix'];
		// On definit la variable utilisée plus bas
		$photos = "test";
		// On initialise l'état de la validité ou non de l'annonce 
		$valid_annonce = true;
		// On ajoute les conditions qui doivent être remplies pour qu'une annonce soit valide
		if (count($_FILES['photos']['name'])==1 && $_FILES['photos']['name'][0]=='') {
			$valid_annonce = false;
			
			$connect->close();
			 echo '
				<script>
					alert("Veuillez ajouter une image minimum.");
									</script>';
		}
		
		// On récupère les données de la photo 
		foreach ($_FILES['photos']['tmp_name'] as $key => $val ) {
			
			$filename = $_FILES['photos']['name'][$key];
			$filesize = $_FILES['photos']['size'][$key];
			$filetmpname = $_FILES['photos']['tmp_name'][$key];
			// On spécifie le chemin où les images des annonces seront stockées
			$target_dir = "vue/images/annonces/";
			$target_file = $target_dir . basename($filename);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// On vérifie si l'image est bien un fichier de type image
			if(isset($_POST["submit"])) {
				$check = getimagesize($filetmpname);
				if($check !== false) {
					echo "Le fichier est bien une image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "Le fichier n'est pas une image.";
					$uploadOk = 0;
				}
			}
			// On vérifie si le nom de l'image existe déjà
			while (file_exists($target_file)) {
				// Si c'est le cas, on change le nom pour pouvoir l'héberger
				$extension = pathinfo($filename, PATHINFO_EXTENSION);
				$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
				$filename = $filename.strval(rand(0,9)).".".$extension;
				$target_file = $target_dir . basename($filename);
			}
			// On vérifie que le fichier ne dépasse pas la taille maximale (maxi 5mo)
			if ($filesize > 5000000) {
				echo "Téléchargement impossible, la taille de l'image est trop importante.";
				$uploadOk = 0;
			}
			// On accepte que certains types de fichier "images"
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Impossible, que les fichiers de type JPG, JPEG, PNG & GIF sont acceptés.";
				$uploadOk = 0;
			}
			// On vérifie que la variable $uploadOk est à 0 ou à 1, si elle est à 0 on affiche une erreur
			if ($uploadOk == 0) {
				echo "Erreur, votre image n'a pu être téléchargé.";
			// Si tout est OK, alors on peut héberger l'image
			} else {
				if (move_uploaded_file($filetmpname, $target_file)) {
					$db_names.=$filename.",";
					echo "Le fichier ". basename( $filename). " a bien été téléchargé sur nos serveurs.";				// Sinon, on renvoie une erreur
				} else {
					echo "Impossible, il y a eu une erreur durant le téléchargement de votre image.";
				}
			}
		}
		if($valid_annonce){
			// Si l'annonce est correctement valide, on execute la requête SQL qui enregistre l'annonce dans la base de données
			$connect->query("INSERT INTO `ailipset921`.`annonces` (`id`, `titre`, `contenu`, `prix`, `type_annonce`, `photo`) VALUES (NULL, '$titre', '$contenu', '$prix', '$type_annonce', '$db_names')");
			header("location: ../index.php?a=annonces");
		}	
		$connect->close();
	}
}


