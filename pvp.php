<?php
	require_once("phpaba/GestionBD.php");
	require_once("phpaba/gestionVenta.php");
	session_start();
	$usuario=$_SESSION['usuario'];

	if(!$usuario['validado']){
		header("Location:index.php");
	}
	if(!$_SESSION['facturaAbierta']){
		$conexion=CrearConexion();
		$fecha=new DateTime();
		$sFecha=$fecha->format('d/m/Y');
		crearFactura($conexion,$_SESSION['usuario']['OID_E'],1,$sFecha);//crea nueva faactura
		$idfact=ultimaFactura($conexion);//obtiene los datos de la nueva factura
		$fact=buscarFacturaID($conexion,$idfact);
		$_SESSION['facturaAbierta']=TRUE;
		$_SESSION['datosFacturaAbierta']=$fact;
		$factu= intval($fact['OID_F']);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>PVP | FarmaWorks</title>
  <link rel="stylesheet" href="css/stilos.css"/>
  <link rel="shortcut icon" href="ico/favicon.ico" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="fs.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
  </head>

<body>
	<?php
	include('header.php')
	?> 
	
	<div id="app">
			<?php
			include('banner.php')
			?>		
			
			<?php
			include('menuApp.php')
			?>
		
		<div id="seccionesApp">
	
			
			
				<div id="buscarProductoPVP">
					<form id="formcontacto" class="formularioClass" method="post" action="phpaba/tratamientoVentaBuscar.php">
						 <p>Buscar producto:</p>
						 <input name="cliente" id="nombre" type="text" class="formularioClass" placeholder="nombre"></input>
						 </br><input class="formularioBoton"  type="submit" value="Buscar " /></br>
					</form>	 
				</div>
				
				<hr id="separadorVerticalCrearProducto" />
				
				<div id="busquedaProductoPvp">
					<div id="tituloBusquedaPvp"><h3><img src="ico/ico_lupa.png"/> Elige tu producto</h3></div>
					
					<div id="cuerpoBusquedaPVP">
						<?php
						if($_SESSION['productosVenta']){
							$productos=$_SESSION['productosVenta'];
							foreach($productos as $pro){
							echo "<table class=\"tablaBusquedaPVP\">
							
							<form class=\"formularioClass\" method=\"post\" action=\"phpaba/tratamientoVentaAddLinea.php\">
								<tr>
									<td>".$pro['nombre']."</td>
									<td rowspan=\"3\"><input type=\"image\" src=\"ico/add.png\" class=\"botonBusquedaProductoPvp\"></input></td>
								</tr>
								<tr>
									<td><input class=\"formularioClassInvisible\" type=\"hidden\" value=\"";
										if($pro['OID_FA']){
											echo $pro['OID_FA'];
										}elseif ($pro['OID_PA']){
											echo $pro['OID_PA'];
										}elseif ($pro['OID_SA']){
											echo $pro['OID_SA'];
										}
									echo "\" name=\"id\" readonly=\"readonly\"/> <font color=\"#999999\"></td>
								</tr>
								<tr>
									<td>".$pro['PRECIO']."&#8364;</td>
								</tr>
								<tr>
									<td>Cantidad <input required=\"required\" class=\"formularioClass\" name=\"cantidad\" size=\"2\" maxlength=\"2\" type=\"number\" /></td>
								</tr>
							</form>
							</table>";
							}
							}
						unset($_SESSION['productosVenta']);
						?>
					</div>
				</div>
				
				<hr id="separadorVerticalCrearProducto" />
				
				<div id="carrito">
					<div id="tituloFacturaPvp">
						<h3><img src="ico/basket.png"/> Factura </h3>
					</div>
					<div id="cuerpoReceta">
						<?php
							 if($_SESSION['pvp']){
							 	echo "";
							 }
						?>
						
						
						<?php  echo "</br>".$_SESSION['tarjeta']; 
						
							$lineas=$_SESSION['lineasFactura'];
							if($lineas){
								
							foreach($lineas as $linea){
								echo "
									<form class=\"formularioClass\" method=\"post\" action=\"phpaba/eliminarLinea.php\">
										<table class=\"tablaFactura\">
											<tr>
												<td>".$linea['nombre']."</td>
												<td align=\"right\">".$linea['IMPORTE']."&#8364;</td>
											</tr>
											<tr>
												<td><input class=\"formularioPVPReceta\" type=\"hidden\" value=\"".$linea['OID_LN']."\" name=\"id\" readonly=\"readonly\"/> <font color=\"#999999\"></td>
											</tr>
											<tr>
												<td>x ".$linea['CANTIDAD']."</td>
												<td align=\"right\"><input class=\"formularioBoton\" value=\"eliminar \" type=\"submit\"/></td>
											</tr>
										</table>
									</form>
								";
							}	
							}
						
								unset($_SESSION['tarjeta']);?>
								
						
							
								
					</div>	
					<div id="pieReceta">
						<a>TOTAL: <?php echo $_SESSION['datosFacturaAbierta']['IMPORTE']; ?>&#8364;</a>
						<div id="confirmarRecetaPVP">
							<form method="post" action="phpaba/confirmarFactura2.php">
								<input class="formularioBoton" type="submit" value="Confirmar "></input>
							</form>
						</div>
					</div>
				</div>
				
			
			
			
			
			
			
		</div>	
	<?php
	include('footer.php')
	?>
	

</body>
</html>