<?php
	require_once("phpaba/mostrarProveedores.php");
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
       <title>Proveedores | FarmaWorks</title>
  <link rel="stylesheet" href="css/stilos.css"/>
  <link rel="shortcut icon" href="ico/favicon.ico" />
  
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
			
		<div id="resultadoBusquedaCliente" class="formularioClass">
			<h2>Listado de proveedores:</h2></br></br>
			<div id="Proveedores" class="formularioClass">
					<?php
						$bus=obtenerProveedores();
						foreach($bus as $prov){
							/*echo $prov['NOMBRE'];*/
							
							
							echo "<form><table class=\"tablaBusqueda\" ><tr>
								<tr><input type=\"text\" value=\"".$prov['NOMBRE']."\" name=\"nombreCliente\" class=\"h3Formulario\" disabled=\"disabled\"/></tr></br>
								<tr><u>Tel&eacute;fono:</u> ".$prov['TELEFONO']."</tr></br>
								
																	
							</tr></table></br></br></form>";
							
							
							
						};
						
					?>								
			</div>
			
	
		</div>
	</div>	
	<?php
	include('footer.php')
	?>
	

</body>
</html>