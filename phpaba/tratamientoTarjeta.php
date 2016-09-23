<?php
	require_once("GestionBD.php");
	require_once("gestionCliente.php");
	require_once("gestionVenta.php");
	require_once("gestionProducto.php");
	session_start();
	
	$nss=$_REQUEST['cliente'];
	if(!isset($_SESSION['pvp'])){
	$conexion=CrearConexion();
	
	$cli=buscarCliente($nss,$conexion); //Todos los datos del cliente
		
	$cont=contieneTarjetas($cli['OID_CL'],$conexion);//todos los productos que tiene en la receta
	$_SESSION['contiene']=$cont;
	if($cont){
		$fecha=new DateTime();
		$sFecha=$fecha->format('d/m/Y');
		crearFactura($conexion,$_SESSION['usuario']['OID_E'],$cli['OID_CL'],$sFecha);//crea nueva faactura
		$fact=buscarFactura($conexion,$_SESSION['usuario']['OID_E'],$cli['OID_CL'],$sFecha);//obtiene los datos de la nueva factura
		$factu= intval($fact['OID_F']);
		
		foreach($cont as $linea){ //Esto va creando todas las lineas de factura correspondientes
			
			$cant=1;
			if($linea['OID_FA']){
				crearLineaFacturaFA($conexion,$cant,$factu,$linea['OID_FA']);
			}else if($linea['OID_PA']){
				crearLineaFacturaPA($conexion,$cant,$factu,$linea['OID_PA']);
			}else if ($linea['OID_SA']) {
				crearLineaFacturaSA($conexion,$cant,$factu,$linea['OID_SA']);
			}
		}
		
		$PVP['datosFactura']=buscarFacturaID($conexion,$factu);
		$lineas=lineasFactura($conexion,$factu);
		
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
		
		$PVP['lineas']=$lineas;
		$_SESSION['pvp']=$PVP;
		
		
		
		
	}else{
		$_SESSION['tarjeta']= "No hay ninguna receta pendiente";
		
		
	}
	}
		header("Location:../pvpReceta.php");
?>