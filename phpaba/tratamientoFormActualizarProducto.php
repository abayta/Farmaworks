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
	
	switch($_REQUEST['tipo']){
		case "farmaco":
			$rec=intval($_REQUEST['receta']);
			$cub=intval($_REQUEST['cubierto']);
			$pro=intval($_REQUEST['tipoProveedor']);
			$stock=intval($_REQUEST['stock']);
			actualizarFarmaco($conexion,$_REQUEST['nombre'],$_REQUEST['precio'],$stock,$rec,$cub,$_REQUEST['familia'],$_REQUEST['dosis'],$_REQUEST['via'],$pro,$_REQUEST['descripcion'],$_REQUEST['id']);
			$_SESSION['exitoCrear']="EL PRODUCTO SE HA CREADO ACTUALIZADO";
			unset($_SESSION['actualizar']);
			header("Location:../crearProducto.php");
			break;
		case "sanitario":
			$rec=intval($_REQUEST['receta']);
			$cub=intval($_REQUEST['cubierto']);
			$pro=intval($_REQUEST['tipoProveedor']);
			$stock=intval($_REQUEST['stock']);
			actualizarSanitario($conexion,$_REQUEST['nombre'],$_REQUEST['precio'],$stock,$rec,$cub,$pro,$_REQUEST['descripcion'],$_REQUEST['id']);
			$_SESSION['exitoCrear']="EL PRODUCTO SE HA CREADO ACTUALIZADO";
			unset($_SESSION['actualizar']);
			header("Location:../crearProducto.php");
			break;
		case "parafarmaco":
			$pro=intval($_REQUEST['tipoProveedor']);
			$stock=intval($_REQUEST['stock']);
			actualizarParafarmaco($conexion,$_REQUEST['nombre'],$_REQUEST['precio'],$stock,$pro,$_REQUEST['descripcion'],$_REQUEST['id']);
			$_SESSION['exitoCrear']="EL PRODUCTO SE HA CREADO ACTUALIZADO";
			unset($_SESSION['actualizar']);
			header("Location:../crearProducto.php");
			
			
	}
?>