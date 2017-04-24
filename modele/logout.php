<?php
session_start();
if(session_destroy()) // on détruit toutes les sessions actives
{
	header("Location: index.php"); // on redirige vers une page
}
?>