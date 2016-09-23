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
       <title>Informaci&oacute;n de producto | FarmaWorks</title>
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
	
			
			
			<div id="SeleccionaTipoProducto">
					<form class="formularioClass" method="post" action="phpaba/tratamientoFormBuscarProducto.php">
						<p>Tipo de producto</p>

						<select class="formularioClass" name="tipo" id="tipo">
							<option value="elige">Elige</option>
						
						  <option value="farmaco">F&aacute;rmaco</option>
						  <option value="sanitario">Sanitario</option>
						  <option value="parafarmaco">Parafarmacia</option>
						  <option value="todo">Todo</option>

						</select></br>
					    </br>
					     <p>Producto</p>
						<input name="buscar" id="buscar" type="text" class="formularioClass"></input></br></br>
					     <input class="formularioBoton"  type="submit" value="Buscar " />
					     
					     
					</form>
			</div>
			
			<hr id="separadorVerticalInfoProducto" />
			<div id="resultadoBusquedaProducto">
				<h2>Resultado de la b&uacute;squeda:</h2></br></br>
			
			
				<?php
					$bus=$_SESSION['busqueda'];
					if(isset($bus) && $bus!="No se ha encontrado ningun producto"){
					foreach($bus as $valor){
						echo "<form method=\"post\" action=\"phpaba/actualizarProducto.php\"><table class=\"tablaBusqueda\"><tr>
								<tr><input type=\"text\" value=\"".$valor['NOMBRE']."\" name=\"nombreProducto\" class=\"h3Formulario\" readonly=\"readonly\"/></input></tr></br>";
									if ($valor['OID_PA']){
										echo "<tr><u>Código del prodcuto:</u><input type=\"text\" value=\"".$valor['OID_PA']."\" name=\"OID\" class=\"formularioClassInvisible\" readonly=\"readonly\"/></input></tr></br>";
									}if($valor['OID_SA']){
										echo "<tr><u>Código del prodcuto:</u><input type=\"text\" value=\"".$valor['OID_SA']."\" name=\"OID\" class=\"formularioClassInvisible\" readonly=\"readonly\"/></input></tr></br>";
									}if($valor['OID_FA']){
										echo "<tr><u>Código del prodcuto:</u><input type=\"text\" value=\"".$valor['OID_FA']."\" name=\"OID\" class=\"formularioClassInvisible\" readonly=\"readonly\"/></input></tr></br>";
									}
									
								echo "<tr><u>Precio:</u> ".$valor['PRECIO']."<a> &#8364</a></tr></br>
								<tr><u>Stock:</u> ".$valor['STOCK']."<a> unidades</a></tr></br>
								<tr><u>Descripci&oacute;n:</u> ".$valor['DESCRIPCION']."</tr></br>
								<tr><input class=\"formularioBoton\" type=\"submit\" value=\"Actualizar \"></input><tr>	
							</tr></table></br></br></form>";
					}
					unset($_SESSION['busqueda']);
					}else{
						$error=$_SESSION['eligeAlguno'];
					
					if($error){
					 echo $error;
					}else{
						echo "<div id=\"noResultadoBusqueda\">".$bus."</div>";
					}
					unset($_SESSION['eligeAlguno']);
						
					}
					
			
			
		?>	
		</div>
	</div>	
	<?php
	include('footer.php')
	?>
	

</body>
</html>