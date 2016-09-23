<?php
	session_start();
	$usuario=$_SESSION['usuario'];

	if(!$usuario['validado']){
		header("Location:index.php");
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>PVP RECETA| FarmaWorks</title>
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
					<form id="formcontacto" class="formularioClass" method="post" action="phpaba/tratamientoTarjeta.php">
						 <p>Buscar cliente:</p>
						 <input name="cliente" id="nombre" type="text" class="formularioClass" placeholder="00000000A / NSS"></input>
						 </br><input class="formularioBoton"  type="submit" value="Buscar " /></br>
					</form>	 
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
						
							$lineas=$_SESSION['pvp']['lineas'];
							if($lineas){
								
							foreach($lineas as $linea){
								echo "
									<form class=\"formularioClass\">
										<table class=\"tablaFactura\">
											<tr>
												<td>".$linea['nombre']." x ".$linea['CANTIDAD']."</td>
												<td align=\"right\">".$linea['IMPORTE']."&#8364;</td>
											</tr>
											<tr>
												<td><input class=\"formularioClassInvisible\" type=\"hidden\" value=\"";
												if($linea['OID_FA']){
													echo $linea['OID_FA'];
												}elseif ($linea['OID_PA']){
													echo $linea['OID_PA'];
												}elseif ($linea['OID_SA']){
													echo $linea['OID_SA'];
												}
												echo "\" name=\"id\" readonly=\"readonly\"/> <font color=\"#999999\"></td>
											</tr>
										</table>
									</form>
								";
							}	
							}
						
								unset($_SESSION['tarjeta']);?>
								
						
							
								
					</div>	
					<div id="pieReceta">
						<a>TOTAL: <?php echo $_SESSION['pvp']['datosFactura']['IMPORTE'] ?>&#8364;</a>
						<div id="confirmarRecetaPVP">
							<form method="post" action="phpaba/confirmarFactura.php">
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