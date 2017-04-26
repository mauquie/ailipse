<?php
$dir_f =  "../vue/images/annonces/";
$images=$_GET["tab"];
foreach($images as $value){
	unlink($dir_f.$value);
}
?>