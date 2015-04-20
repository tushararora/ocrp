<?php 
	session_start();
	if($_SESSION['loggedin']){
	session_destroy();
	header('Location:index.php');
	}
	else
	{
		header('Location: 404.php');
	}
?>