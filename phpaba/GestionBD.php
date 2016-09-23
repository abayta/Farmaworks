<?php
	function CrearConexion(){
		$user="IISSI";
		$password="IISSI";
		$host="oci:dbname=localhost/XE";
		$conexion=null;
		
		try{
			$conexion= new PDO($host,$user,$password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			$_SESSION['excepcion']=$e;
			/*header("Location: errorConexionBD.php");*/
			echo("error en la conexion".$e->getMessage());
			
		}
		
		return $conexion;
	}
	
	function CerrarConexion(){
		$conexion=null;
	}


?>