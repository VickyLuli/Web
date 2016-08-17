<?php 
		session_start();
		$_SESSION["login"]=0;
		$_SESSION["nombre"]="";
		header('Location: ../index.php');
?>
