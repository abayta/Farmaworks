<?php
	session_start();
	$usuario=$_SESSION['usuario'];
	$errores=$_SESSION['errores'];
	
	if(!$usuario['validado']){
		header("Location:../index.php");
	}else{
		session_destroy();
		header("Location:../index.php");
	}
?>