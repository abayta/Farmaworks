<?php
	require_once("phpaba/GestionBD.php");
	function obtenerProveedores(){
		$conexion = CrearConexion();
		
		$ret;	
		$res=$conexion->prepare("select * from proveedores order by nombre");
		try{
			$res->execute();
			$cont=0;
			foreach($res as $producto){	
				$ret[$cont]=$producto;
				$cont++;
			}
			return $ret;
		}catch(PDOException $e){
			echo "Excepcion";
		}
		
		
	}
?>