<?php
if(session_destroy()) // on d�truit toutes les sessions actives
{
	header("Location: index.php"); // on redirige vers une page
}
?>