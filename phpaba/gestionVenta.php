<?php
	
	function borrarContiene($conexion,$id){
		try{		
			$res=$conexion->prepare('CALL borrar_contiene(:OID_C)');
			$res->bindParam(':OID_C',$id);
			$res->execute();
		}catch(PDOException $e){
			return "Se ha producido un error al crear la base de datos";
		}	
	}
	function borrarLinea($conexion,$id){
		try{		
			$res=$conexion->prepare('CALL borrar_linea(:OID_LN)');
			$res->bindParam(':OID_LN',$id);
			$res->execute();
		}catch(PDOException $e){
			return "Se ha producido un error al crear la base de datos";
		}	
	}

	function crearFactura($conexion,$OID_E,$OID_CL,$sFecha){
		try{		
			$res=$conexion->prepare('CALL crear_factura(:fecha, :OID_E, :OID_CL)');
			$res->bindParam(':fecha',$sFecha);
			$res->bindParam(':OID_E',$OID_E);
			$res->bindParam(':OID_CL',$OID_CL);
			$res->execute();
		}catch(PDOException $e){
			return "Se ha producido un error al crear la base de datos";
		}	
	}
	
	function buscarFacturaID($conexion,$OID_F){
		$ret;	
		$res=$conexion->prepare("select * from facturas where oid_f='$OID_F'");
		try{
			$res->execute();
			$ret=$res->fetch();
			return $ret;
		}catch(PDOException $e){
			echo "Excepcion";
		}
	}
	
	function buscarFactura($conexion,$OID_E,$OID_CL,$sFecha){
		$ret;	
		$res=$conexion->prepare("select * from facturas where importe=0 and oid_cl='$OID_CL' and oid_e='$OID_E' and fecha='$sFecha'");
		try{
			$res->execute();
			$ret=$res->fetch();
			return $ret;
		}catch(PDOException $e){
			echo "Excepcion";
		}
	}
	
	function lineasFactura($conexion,$OID_F){
		$ret;	
		$res=$conexion->prepare("select * from lineasfacturas where oid_f='$OID_F'");
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
	
	function crearLineaFacturaPA($conexion,$cant,$OID_F,$OID_PA){
		try{		
			$res=$conexion->prepare('CALL introducir_lineafacturapa(:cantidad, :OID_F, :OID_PA)');
			$res->bindParam(':cantidad',$cant);
			$res->bindParam(':OID_F',$OID_F);
			$res->bindParam(':OID_PA',$OID_PA);
			$res->execute();
		}catch(PDOException $e){
			return "Se ha producido un error al crear la base de datos";
		}	
	}
	function crearLineaFacturaFA($conexion,$cant,$OID_F,$OID_FA){
		try{		
			$res=$conexion->prepare('CALL introducir_lineafacturafa(:cantidad,:OID_F,:OID_FA)');
			$res->bindParam(':cantidad',$cant);
			$res->bindParam(':OID_F',$OID_F);
			$res->bindParam(':OID_FA',$OID_FA);
			$res->execute();
		}catch(PDOException $e){
			return "Se ha producido un error al crear la base de datos";
		}	
	}
	function crearLineaFacturaSA($conexion,$cant,$OID_F,$OID_SA){
		try{		
			$res=$conexion->prepare('CALL introducir_lineaFacturaSA(:cantidad,:OID_F,:OID_SA)');
			$res->bindParam(':cantidad',$cant);
			$res->bindParam(':OID_F',$OID_F);
			$res->bindParam(':OID_SA',$OID_SA);
			$res->execute();
		}catch(PDOException $e){
			return "Se ha producido un error al crear la base de datos";
		}	
	}
	
	function ultimaFactura($conexion){
		$ret;	
		$res=$conexion->prepare("select sec_fac.currval from dual");
		try{
			$res->execute();
			$ret=$res->fetch();
			return intval($ret[0]);
		}catch(PDOException $e){
			echo "Excepcion";
			echo $e->GetMessage();
		}
	}

?>