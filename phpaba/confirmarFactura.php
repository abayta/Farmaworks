<?php
	require_once("GestionBD.php");
	require_once("gestionVenta.php");
	
	session_start();
	unset($_SESSION['pvp']);
	$conexion=CrearConexion();
	$cont=$_SESSION['contiene'];
	foreach($cont as $contiene){
		borrarContiene($conexion,$contiene['OID_C']);	
	}
	unset($_SESSION['contiene']);
	header("Location:../pvpReceta.php");
?>