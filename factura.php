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
       <title>Factura | FarmaWorks</title>
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

						DNI &oacute; NSS: <input type="text" name="dnionss" ><br>
						
					               <input class="formularioBoton"  type="submit" value="Buscar " />
					</form>
			</div>
			<hr id="separadorVerticalInfoProducto" />
				
			<div id="resultadoBusquedaFactura" class="formularioClass">
				<h2>Resultado de la búsqueda:</h2></br></br>
				
				
				
			</div>
	
		</div>
	</div>	
	<?php
	include('footer.php')
	?>
	

</body>
</html>