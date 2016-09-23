<?php
	require_once("phpaba/GestionBD.php");
	require_once("phpaba/gestionProducto.php");
	
	session_start();
	$usuario=$_SESSION['usuario'];

	if(!$usuario['validado']){
		header("Location:index.php");
	}
	
	$conexion=CrearConexion();
	$ac=$_SESSION['actualizar'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <title>Crear producto | FarmaWorks</title>
  <link rel="stylesheet" href="css/stilos.css"/>
  <link rel="shortcut icon" href="ico/favicon.ico" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
  
  <script src="css/solucion.js" type="text/javascript"></script>
  <script type="text/javascript" src="css/opaca.js"></script>
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
	
			
			<form id="formcontacto" class="formularioClass" method="post" onsubmit="return procesar();"  
			
			<?php
				if($ac){
					echo "action=\"phpaba/tratamientoFormActualizarProducto.php\">";
				}else{
					echo "action=\"phpaba/tratamientoFormCrearProducto.php\">";
				}
			?>
				<div id="crearProducto">
					
						<p>Tipo de producto</p>

						<select class="formularioClass" name="tipo" id="tipo" onchange="opaca()">
						  <?php
						  		if($ac){
						  			if($ac['OID_FA']){
										echo "<option value=\"farmaco\">F&aacute;rmaco </option>";
									}else if($ac['OID_PA']){
										echo "<option value=\"parafarmaco\">Parafarmacia </option>";
									}else if ($ac['OID_SA']) {
										echo "<option value=\"sanitario\">Sanitario </option>";
									}
						  		}else{
								  echo "<option value=\"farmaco\">F&aacute;rmaco</option>
								  <option value=\"sanitario\">Sanitario</option>
								  <option value=\"parafarmaco\">Parafarmacia</option>";
								}
						  ?>
						</select></br>
						
					    </br>
					     <p>Nombre:</p>
						 <input name="nombre" id="nombre" type="text" class="formularioClass" required="required"
						 <?php
						 if($ac){
						 	echo "value=\"".$ac['NOMBRE']."\"";
						 }?>>
						 </input></br></br>
						 <p id="precio">Precio: <?php
						 if($ac){
						 	echo $ac['PRECIO'];
						 }?></p>
						 <input name="precio" id="precio" type="number" step="0.01" min="0" class="formularioClass" required="required"
						 <?php
						 if($ac){
						 	echo "value=\"".$ac['PRECIO']."\"";
						 }?>></input></br></br>
						 <p>Stock:</p>
						 <input name="stock" id="stock" type="number" min="0" class="formularioClass" required="required"
						 <?php
						 if($ac){
						 	echo "value=\"".$ac['STOCK']."\"";
						 }?>
						 ></input></br></br>
						 <p>Receta</p>
						 <input type="radio" name="receta" id="receta" value="1"
						 <?php
						 if($ac){
						 	 if($ac['OID_PA']){
								echo "disabled=\"disabled\"";
							}
						 }?>
						 > S&iacute;
						 <input type="radio" name="receta" id="receta2" value="0"
						 <?php
						 if($ac){
						 	 if($ac['OID_PA']){
								echo "disabled=\"disabled\"";
							}
						 }?>
						 > No</br></br>
						 <p>Cubierto</p>
						 <input type="radio" name="cubierto" id="cubierto" value="1"
						 <?php
						 if($ac){
						 	 if($ac['OID_PA']){
								echo "disabled=\"disabled\"";
							}
						 }?>
						 > S&iacute;
						 <input type="radio" name="cubierto" id="cubierto2" value="0"
						 <?php
						 if($ac){
						 	 if($ac['OID_PA']){
								echo "disabled=\"disabled\"";
							}
						 }?>
						 > No</br>
				</div>
				
				<hr id="separadorVerticalCrearProducto" />
				
				<div id="crearProducto">
					
						 <p>Familia:</p>
						 <input name="familia" id="familia" type="text" class="formularioClass" required="required"
						 <?php
						 if($ac){
						 	 if($ac['OID_PA'] || $ac['OID_SA']){
								echo "disabled=\"disabled\"";
							}else{
								echo "value=\"".$ac['FAMILIA']."\"";
							}
						 }?>
						 ></input></br></br>
						 <p>Dosis:</p>
						 <input name="dosis" id="dosis" type="text" class="formularioClass" required="required"
						 <?php
						 if($ac){
						 	 if($ac['OID_PA'] || $ac['OID_SA']){
								echo "disabled=\"disabled\"";
							}else{
								echo "value=\"".$ac['DOSIS']."\"";
							}
						 }?>
						 ></input></br></br>
						 <p>V&iacute;a:</p>
						 <input name="via" id="via" type="text" class="formularioClass" required="required"
						 <?php
						 if($ac){
						 	 if($ac['OID_PA'] || $ac['OID_SA']){
								echo "disabled=\"disabled\"";
							}else{
								echo "value=\"".$ac['VIA']."\"";
							}
						 }?>
						 ></input></br></br>
						 
						 <p>Proveedor</p>

						<select class="formularioClass" name="tipoProveedor" id="proveedor">
						  <?php
						  		$lista=proveedores($conexion);
								foreach($lista as $pro){
									echo "<option value=\"".$pro['OID_PV']."\">".$pro['NOMBRE']."</option>";
								}
						  ?>
						</select></br>
				</div>
				
				<hr id="separadorVerticalCrearProducto" />
				
				<div id="crearProducto">
					
						 <p>Descripci&oacute;n:</p>
						 <textarea name="descripcion" id="descripcion" type="text" class="formularioClass" cols="31" required="required" rows="5"><?php
							 if($ac){
							 	echo $ac['DESCRIPCION'];
							 }?></textarea></br></br>
						 <?php
						 if($ac){
						 	if($ac['OID_FA']){
								echo "<input type\"number\" readonly=\"readonly\" value=\"".$ac['OID_FA']."\" name=\"id\"></input>";
							}else if($ac['OID_PA']){
								echo "<input type\"number\" readonly=\"readonly\" value=\"".$ac['OID_PA']."\" name=\"id\"></input>";
							}else if ($ac['OID_SA']) {
								echo "<input type\"number\" readonly=\"readonly\" value=\"".$ac['OID_SA']."\" name=\"id\"></input>";
							}
						 	echo "</br></br><input class=\"formularioBoton\"  type=\"submit\" value=\"Actualizar \" />";
						 }else{
						 	echo "</br></br><input class=\"formularioBoton\" type=\"submit\" value=\"Crear producto \" />";
						 }
						 ?>
						 <div id="divExito"></br><?php echo "<font color=\"green\">".$_SESSION['exitoCrear']."</font>"; unset($_SESSION['exitoCrear']);?></div>
						 <div id="errores"></div>
				</div>
			</form>
		</div>	
	<?php
	include('footer.php');
	CerrarConexion();
	?>
	

</body>
</html>