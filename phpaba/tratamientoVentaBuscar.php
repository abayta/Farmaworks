<?php
	require_once("GestionBD.php");
	require_once("gestionProducto.php");
	session_start();
	$usuario=$_SESSION['usuario'];

	if(!$usuario['validado']){
		header("Location:index.php");
	}
	
	$conexion=CrearConexion();
	
	$lineas=seleccionarTodo($_REQUEST['cliente'],$conexion);
	
	$cont=0;
		foreach ($lineas as $lin){
			if($lin['OID_FA']){
				$nombre=selecionarfarmacoID($lin['OID_FA'],$conexion);
				$lineas[$cont]['nombre']= $nombre['NOMBRE'];
			}else if($lin['OID_PA']){
				$nombre=selecionarParafarmacoID($lin['OID_PA'],$conexion);
				$lineas[$cont]['nombre']= $nombre['NOMBRE'];
			}else if ($lin['OID_SA']) {
				$nombre=selecionarSanitarioID($lin['OID_SA'],$conexion);
				$lineas[$cont]['nombre']= $nombre['NOMBRE'];
			}$cont++;
		}
	
	$_SESSION['productosVenta']=$lineas;
	
	
	header("Location:../pvp.php");
	
?>