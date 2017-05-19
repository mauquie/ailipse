<?php// On détruit toutes les sessions actuellement actives
if(session_destroy())
{
	header("Location: index.php"); // on redirige vers une page
}
?>