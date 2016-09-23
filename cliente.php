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
       <title>Datos de cliente | FarmaWorks</title>
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
	
			<div id="BuscarCliente">
					<form class="formularioClass" method="post" action="phpaba/tratamientoFormBuscarCliente.php">
						<p >Buscar cliente</p>

						DNI &oacute; NSS: <input type="text" name="dnionss" placeholder="00000000A / NSS"><br>
						
					               <input class="formularioBoton"  type="submit" value="Buscar " />
					</form>
			</div>
			
			<hr id="separadorVerticalInfoCliente" />
			<div id="resultadoBusquedaCliente" class="formularioClass">
				<h2>Resultado de la b&uacute;squeda:</h2></br></br>
	
			
				<?php
					$valor=$_SESSION['busquedaCliente'];
					if(isset($valor) && $valor!="No se ha encontrado ningun cliente"){
					echo "<form><table class=\"tablaBusqueda\" ><tr>
								<tr><input type=\"text\" value=\"".$valor['NOMBRE']."\" name=\"nombreCliente\" class=\"h3Formulario\" disabled=\"disabled\"/></tr></br>
								<tr><u>DNI:</u> ".$valor['DNI']."</tr></br>
								<tr><u>NSS:</u> ".$valor['NSS']."</tr></br>
								<tr><u>Tel&eacute;fono:</u> ".$valor['TELEFONO']."</tr></br>
								<tr><u>Direcci&oacute;n:</u> ".$valor['DIRECCION']."</tr></br>
																	
							</tr></table></br></br></form>";
					
					}else{
						echo "<div id=\"noResultadoBusqueda\">".$valor."</div>";
					}
					
					unset($_SESSION['busquedaCliente']);
								
			
		?>	
		</div>
			
		</div>
	</div>	
	<?php
	include('footer.php')
	?>
	

</body>
</html>