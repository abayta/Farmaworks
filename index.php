<?php

	session_start();
	if(!isset($_SESSION['usuario'])){
		$usuario['user']="";
		$usuario['password']="";
		$_SESSION['usuario']=$usuario;
	}else{
		$usuario=$_SESSION['usuario'];
	}
	if($usuario['validado']){
		header("Location:app.php");
	}
	
	if(isset($_SESSION['errores'])){
		$errores=$_SESSION['errores'];
		unset($_SESSION['errores']);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>FarmaWorks | Software para farmacias</title>
   		<link rel="stylesheet" href="css/stilos.css"/>
   		<link rel="shortcut icon" href="ico/favicon.ico" />
   		
   		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
   		
   		
   	</head>
<body>
<?php
	include('header.php')
?> 
<div id="body_comun">
	<div id="body_index">
		<div id="shadow-top"><img src="ico/shadow-top.png"/></div>
		
		<div id="homeVerde">
		
			<div id="box">
			<img src="ico/box.png" />
			</div>
			
			<div id="bienvenido">
			<p id="bienv">Bienvenido a</p>
			<p><a id="uno">Farma</a><img id="pill" src="ico/pill.png" /><a id="dos">Works</a></p>
			</div>
			
			<div id="formularioIndex">
			
				<form method="post" action="phpaba/TratamientoFormIdentificarUsuario.php">
					<label for="user">Usuario</label><br/>
					<input id="user" class="usuarioIndex" name="user" type="text" required="required"></input><br/>
					<div class="errorIndex">
						<?php
							echo "<small>".$errores['errorUser']."</small>";
						?>
					</div><br/>
					
					<label for="password">Contrase&ntilde;a</label><br/>
					<input id="password" class="usuarioIndex" name="password" type="password" required="required"></input><br/>
					<div class="errorIndex">
						<?php
								echo "<small>".$errores['errorPassword']."</small>";	
						?></div>
					
					<input id="botonIndex" type="submit" name="submit" value="Accede a FW">
				</form>
				<!--<?php
					if(isset($errores) && count($errores)){
						echo "<div id=\"div_errores_index\" class=\"error\"><a>";
						foreach($errores as $errores) {
							echo $errores . "<br/>";	
						}
						echo "error en usuario <br/>error en contrase&ntildea";
						echo "<a/></div>";
					}
				?>-->
			</div>
		
			
	</div>	
	</div>
</div>
<?php
	include('footer.php')
?>
</body>
</html>