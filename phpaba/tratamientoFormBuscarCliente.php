<?php
	require_once("GestionBD.php");
	require_once("gestionCliente.php");
	
	session_start();
	$usuario=$_SESSION['usuario'];
	
	/*Control de usuario*/
	if(!$usuario['validado']){
		header("Location:index.php");
	}
	$conexion=CrearConexion();
	
	$dnionss=$_REQUEST['dnionss'];
	$res = buscarCliente($dnionss,$conexion);
	
	if ($res){
		$_SESSION['busquedaCliente'] = $res;
	}else{
		$_SESSION['busquedaCliente'] = "No se ha encontrado ningun cliente";	
	}
	CerrarConexion();
	
	header("Location:../cliente.php")
	
	
	
?>