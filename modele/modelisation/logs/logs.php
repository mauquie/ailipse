<?php 
	$myFile = "logfile.txt"; //Considering the text file in same directory where server.php is
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = $_POST['ClickedButton'].' '.date('Y-m-d-h:i:s');
	fwrite($fh, $stringData);
	fclose($fh);
?>