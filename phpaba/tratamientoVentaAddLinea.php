<?php
	require_once("GestionBD.php");
	require_once("gestionProducto.php");
	require_once("gestionVenta.php");
	session_start();
	
	$conexion=CrearConexion();
	$pro=seleccionarTodoID($_REQUEST['id'], $conexion);
	$fact=$_SESSION['datosFacturaAbierta'];
	$idFac=intval($fact['OID_F']);
	$cant=intval($_REQUEST['cantidad']);
	$idPro = intval($pro['OID_FA']);
	
	if($pro['OID_FA']){
		crearLineaFacturaFA($conexion,$cant,$idFac,intval($pro['OID_FA']));
	}else if($pro['OID_PA']){
		crearLineaFacturaPA($conexion,$cant,$idFac,intval($pro['OID_PA']));
	}else if ($pro['OID_SA']) {
		crearLineaFacturaSA($conexion,$cant,$idFac,intval($pro['OID_SA']));
	}
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
	/*$_SESSION['datosFacturaAbierta']=seleccionarTodoID($idFac, $conexion);*/
	$actuali=buscarFacturaID($conexion,$idFac);
	$_SESSION['datosFacturaAbierta']=$actuali;
	$_SESSION['lineasFactura']=$lineas;
	header("Location:../pvp.php");
	
	
?>