<?php
	include 'connect.php';
	// recuperation de tous les atributs necessaire en POST 
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
	$connect = new mysqli($hostname, $username, $password, $databaseName); // connexion 
	if (count($_FILES['photos']['name'])==1 && $_FILES['photos']['name'][0]=='')
	{
		$valid_annonce = false;
		$connect->close();
		 echo '<script>
            alert("Veuillez ajouter une image minimum.");
			location="../../index.php?a=ajouter_voile";
			   </script>'; // si il y a pas d'image 
	}
	
	foreach ($_FILES['photos']['tmp_name'] as $key => $val ) {
		$filename = $_FILES['photos']['name'][$key];
		$filesize = $_FILES['photos']['size'][$key];
		$filetmpname = $_FILES['photos']['tmp_name'][$key];
		
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
		$filename =$nomc.".".$extension;
	
		$target_dir = "../../vue/images/fabricant/logo/"; // la ou se situera l'image enregistrée
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
	
	
	

	$connect->close();// fermeture 
	header("location: ../../index.php?a=ajouter_voile"); // redirection 
?>