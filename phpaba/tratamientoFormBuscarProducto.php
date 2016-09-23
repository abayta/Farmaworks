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
	
	$busquedaProducto['tipo']=$_REQUEST['tipo'];
	$busquedaProducto['buscar']=$_REQUEST['buscar'];
	$cadena=$busquedaProducto['buscar'];
	
	switch($busquedaProducto['tipo']){
		case 'elige':
			$_SESSION['eligeAlguno']="Tiene que seleccionar algun tipo valido";
			header("Location:../infoProducto.php");
			break;
		case 'farmaco':
			$res=selecionarFarmaco($cadena,$conexion);
			if($res){
				$_SESSION['busqueda']=$res;
			}else{
				$_SESSION['busqueda']="No se ha encontrado ningun producto";
			}
			header("Location:../infoProducto.php");
			
			break;
		case 'sanitario':
			$res=selecionarSanitario($cadena,$conexion);
			if($res){
				$_SESSION['busqueda']=$res;
			}else{
				$_SESSION['busqueda']="No se ha encontrado ningun producto";
			}
			header("Location:../infoProducto.php");
			break;
		case 'parafarmaco':
			$res=selecionarParafarmaco($cadena,$conexion);
			if($res){
				$_SESSION['busqueda']=$res;
			}else{
				$_SESSION['busqueda']="No se ha encontrado ningun producto";
			}
			header("Location:../infoProducto.php");
			break;
		case 'todo':
			$res=seleccionarTodo($cadena,$conexion);
			if($res){
				$_SESSION['busqueda']=$res;
			}else{
				$_SESSION['busqueda']="No se ha encontrado ningun producto";
			}
			header("Location:../infoProducto.php");
	}
	CerrarConexion();
	
	
?>