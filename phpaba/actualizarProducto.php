<?php
	require_once("GestionBD.php");
	require_once("gestionProducto.php");
	session_start();
	$usuario=$_SESSION['usuario'];
	
	/*Control de usuario*/
	if(!$usuario['validado']){
		header("Location:index.php");
	}
	$conexion=CrearConexion();
	$res=seleccionarTodoID($_REQUEST['OID'], $conexion);
	$_SESSION['actualizar']=$res;
	header("Location:../crearProducto.php");
?>