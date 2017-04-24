<?php

include ('connect.php');
$nom=$_POST['nom'];
$id=$_POST['client'];
$taill=$_POST['taille'];
$date=$_POST['datesorti'];
$cert=$_POST['cert'];
$nb_susp=$_POST['nbSuspente'];
$planToUpload = "test";
$valid_annonce = true;
$manuelToUpload= "test";

$connect = new mysqli($hostname, $username, $password, $databaseName);


if (count($_FILES['planToUpload']['name'])==1 && $_FILES['planToUpload']['name'][0]=='')
	{
		$valid_annonce = false;
		 echo '<script>
            alert("Veuillez ajouter un plan en pdf .");
			location="../../../index.php?a=ajouter_voile";
			   </script>';
	}



foreach ($_FILES['planToUpload']['tmp_name'] as $key => $val ) {
		$filename = $_FILES['planToUpload']['name'][$key];
		$filesize = $_FILES['planToUpload']['size'][$key];
		$filetmpname = $_FILES['planToUpload']['tmp_name'][$key];
		
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
		$filename =$nom."_plan.".$extension;
		
		$target_dir ="../../vue/images/modeleVoile/plan/";
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
		
		$target_dir ="../../vue/images/modeleVoile/manuel/";
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
if($valid_annonce){
	$id_voile="etst";
	if($pathManuel=="")
	{
		$sql="INSERT INTO `modele`(`nom`, `id_const`, `nb_tail`, `date_s`, `cert`, `plan`) VALUES ('$nom','$id','$taill','$date','$cert','$pathplan')";
		
	}
	else
	{
		$sql="INSERT INTO `modele`(`nom`, `id_const`, `nb_tail`, `date_s`, `cert`, `plan`, `manuel`) VALUES ('$nom','$id','$taill','$date','$cert','$pathplan','$pathManuel')";
	}
	$connect->query($sql);
	$sql="SELECT id FROM `modele` WHERE nom='$nom'";
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
	$sql="INSERT INTO `taille_voile` ( `Id-voile`";
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
	// pour la basse de denner des reference fabriquand 
	for($fois=1;$fois<=$taill;$fois++)
	{
		$Id_une=$id_voile.$array[$fois];
		$value=[];
		for($i=1;$i<=$nb_susp ; $i++)
		{
			$value[$i]=$_POST['reffab'.$i.$fois];
		}
		 $sql="INSERT INTO `ref_fab_susp`(`idvoile`";
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
		 $sql="INSERT INTO `longueur_des_suspentes`(`idvoile`";
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
			$value[$i]=$_POST['materiaux'.$i.$fois];
		}
		 $sql="INSERT INTO  ` materiaux_des_suspentes` (`idvoile`";
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
	
}	

	$connect->close();
	//header("location: ../../../index.php?a=ajouter_voile");

?>