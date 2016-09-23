<?php
	function buscarCliente($dnionss,$conexion){	
		$res=$conexion->prepare("select * from clientes where nss='$dnionss' or dni='$dnionss'");
		try{
			$res->execute();
			$fila=$res->fetch();
			return $fila;
		}catch(PDOException $e){
			echo "Excepcion";
		}
	}
	
	function contieneTarjetas($OID_CL,$conexion){
		$res=$conexion->prepare("select * from tarjetas natural join contiene where OID_CL='$OID_CL'");
		$ret;	
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