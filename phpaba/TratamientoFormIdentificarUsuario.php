<?php
	require_once("GestionBD.php");
	
	session_start();
	$usuario = $_SESSION['usuario'];
	
	if(isset($usuario)){
		$usuario['user']=$_REQUEST['user'];
		$usuario['password']=$_REQUEST['password'];
		$_SESSION['usuario']=$usuario;
	}else{
		header("Location:index.php");
	}
	
	$conexion = CrearConexion();
	$u= $usuario['user'];
	
	
	$res = $conexion->prepare("SELECT * FROM Empleados where nombre='$u'"); 
	
	try{
		$res->execute();
		$final=$res->fetch();
		if($final){
			if($usuario['password']==$final['CLAVE']){
				$usuario['validado']=TRUE;
				$usuario['OID_E']=$final['OID_E'];
				$_SESSION['usuario']=$usuario;
				header("Location:../app.php");
			}else{
				$errores['errorPassword']="contrase&ntildea incorrecta";
				$_SESSION['errores']=$errores;
				header("Location:../index.php");	
			}
		}else{
			$errores['errorUser']="El usuario no existe";
			$_SESSION['errores']=$errores;
			header("Location:../index.php");
		}
	}catch(PDOException $e){
		echo "Excepcion";
	}
	
	CerrarConexion();
?>