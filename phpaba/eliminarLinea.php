<?php
	require_once("GestionBD.php");
	require_once("gestionVenta.php");
	require_once("gestionProducto.php");
	session_start();
	$usuario=$_SESSION['usuario'];

	if(!$usuario['validado']){
		header("Location:index.php");
	}
	
	$conexion=CrearConexion();
	$id=$_REQUEST['id'];
	borrarLinea($conexion,$id);
	$idFac=$_SESSION['datosFacturaAbierta']['OID_F'];
	
	$lineas=lineasFactura($conexion,$idFac);
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
	$actuali=buscarFacturaID($conexion,$idFac);
	$_SESSION['datosFacturaAbierta']=$actuali;
	$_SESSION['lineasFactura']=$lineas;
	header("Location:../pvp.php");
?>