<?php
		
	function crearFarmaco($conexion,$nombre,$precio,$stock,$receta,$cubierto,$familia,$dosis,$via,$proveedor,$descripcion){
		try{
			$res=$conexion->prepare("CALL introducir_farmaco(:familia,:dosis,:via,:receta,:cubierto,:descripcion,:nombre,".$precio.",:stock,:OID_PV)");
			$res->bindParam(':familia',$familia);
			$res->bindParam(':dosis',$dosis);
			$res->bindParam(':via',$via);
			$res->bindParam(':receta',$receta);
			$res->bindParam(':cubierto',$cubierto);
			$res->bindParam(':descripcion',$descripcion);
			$res->bindParam(':nombre',$nombre);
			$res->bindParam(':stock',$stock);
			$res->bindParam(':OID_PV',$proveedor);
			$res->execute();
		}catch(PDOException $e){
			echo "Excepcion";
			echo $e->GetMessage();
			echo $e->getTraceAsString();
		}
	}
	
	function crearSanitario($conexion,$nombre,$precio,$stock,$receta,$cubierto,$descripcion,$proveedor){
		try{
			$res=$conexion->prepare("CALL introducir_sanitario(:descripcion,:receta,:cubierto,:nombre,".$precio.",:stock,:OID_PV)");
			
			$res->bindParam(':receta',$receta);
			$res->bindParam(':cubierto',$cubierto);
			$res->bindParam(':descripcion',$descripcion);
			$res->bindParam(':nombre',$nombre);
			$res->bindParam(':stock',$stock);
			$res->bindParam(':OID_PV',$proveedor);
			$res->execute();
		}catch(PDOException $e){
			echo "Excepcion";
			echo $e->GetMessage();
			echo $e->getTraceAsString();
		}
	}
	function crearParafarmaco($conexion,$nombre,$precio,$stock,$descripcion,$proveedor){
		try{
			$res=$conexion->prepare("CALL introducir_parafarmacias(:descripcion,:nombre,".$precio.",:stock,:OID_PV)");
			
			$res->bindParam(':descripcion',$descripcion);
			$res->bindParam(':nombre',$nombre);
			$res->bindParam(':stock',$stock);
			$res->bindParam(':OID_PV',$proveedor);
			$res->execute();
		}catch(PDOException $e){
			echo "Excepcion";
			echo $e->GetMessage();
			echo $e->getTraceAsString();
		}
		
	}
	
	function actualizarFarmaco($conexion,$nombre,$precio,$stock,$receta,$cubierto,$familia,$dosis,$via,$proveedor,$descripcion,$id){
		try{
			 /*execute actualizar_farmacos('asdfasdf','qwert','asdfasdf',1,0,'aaaaaa','bbbbb',23.2,50,2,5)*/
			$res=$conexion->prepare("CALL actualizar_farmacos(:familia,:dosis,:via,:cubierto,:receta,:descripcion,:nombre,".$precio.",:stock,:OID_PV,:OID_FA)");
			$res->bindParam(':familia',$familia);
			$res->bindParam(':dosis',$dosis);
			$res->bindParam(':via',$via);
			$res->bindParam(':receta',$receta);
			$res->bindParam(':cubierto',$cubierto);
			$res->bindParam(':descripcion',$descripcion);
			$res->bindParam(':nombre',$nombre);
			$res->bindParam(':stock',$stock);
			$res->bindParam(':OID_PV',$proveedor);
			$res->bindParam(':OID_FA',$id);
			$res->execute();
		}catch(PDOException $e){
			echo "Excepcion";
			echo $e->GetMessage();
			echo $e->getTraceAsString();
		}
	}
	
	function actualizarSanitario($conexion,$nombre,$precio,$stock,$receta,$cubierto,$proveedor,$descripcion,$id){
		try{
			$res=$conexion->prepare("CALL actualizar_sanitarios(:cubierto,:receta,:descripcion,:nombre,".$precio.",:stock,:OID_PV,:OID_SA)");
			$res->bindParam(':receta',$receta);
			$res->bindParam(':cubierto',$cubierto);
			$res->bindParam(':descripcion',$descripcion);
			$res->bindParam(':nombre',$nombre);
			$res->bindParam(':stock',$stock);
			$res->bindParam(':OID_PV',$proveedor);
			$res->bindParam(':OID_SA',$id);
			$res->execute();
		}catch(PDOException $e){
			echo "Excepcion";
			echo $e->GetMessage();
			echo $e->getTraceAsString();
		}
	}
	
	function actualizarParafarmaco($conexion,$nombre,$precio,$stock,$proveedor,$descripcion,$id){
		try{
			$res=$conexion->prepare("CALL actualizar_parafarmacias(:descripcion,:nombre,".$precio.",:stock,:OID_PV,:OID_PA)");
			$res->bindParam(':descripcion',$descripcion);
			$res->bindParam(':nombre',$nombre);
			$res->bindParam(':stock',$stock);
			$res->bindParam(':OID_PV',$proveedor);
			$res->bindParam(':OID_PA',$id);
			$res->execute();
		}catch(PDOException $e){
			echo "Excepcion";
			echo $e->GetMessage();
			echo $e->getTraceAsString();
		}
	}
	
	function proveedores($conexion){
		$ret;	
		$res=$conexion->prepare("SELECT * FROM proveedores");
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
	function selecionarFarmaco($titulo,$conexion){
		$ret;	
		$res=$conexion->prepare("SELECT * FROM farmacos where Nombre like '%$titulo%'");
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
	
	function selecionarSanitario($titulo,$conexion){
		$ret;	
		$res=$conexion->prepare("SELECT * FROM sanitarios where Nombre like '%$titulo%'");
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
	
	function selecionarParafarmaco($titulo,$conexion){
		$ret;	
		$res=$conexion->prepare("SELECT * FROM parafarmacias where Nombre like '%$titulo%'");
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
	
	function seleccionarTodo($cadena,$conexion){
		$res1=selecionarFarmaco($cadena,$conexion);
		$res2=selecionarSanitario($cadena,$conexion);
		$res3=selecionarParafarmaco($cadena,$conexion);
		
		if ($res1){
			$result=$res1;
		}
		if ($res2){
			if($result){
				$result=array_merge($result,$res2);
			}else{
				$result=$res2;
			}
		}
		if ($res3){
			if($result){
				$result=array_merge($result,$res3);
			}else{
				$result=$res3;
			}
		}return $result;
	}
	
	
	function selecionarFarmacoID($id,$conexion){	
		$res=$conexion->prepare("SELECT * FROM farmacos where OID_FA='$id'");
		try{
			$res->execute();
			$ret=$res->fetch();
			return $ret;
		
		}catch(PDOException $e){
			echo "Excepcion";
		}
	}
	
	function selecionarSanitarioID($id,$conexion){	
		$res=$conexion->prepare("SELECT * FROM sanitarios where OID_SA='$id'");
		try{
			$res->execute();
			$ret=$res->fetch();
			return $ret;
		
		}catch(PDOException $e){
			echo "Excepcion";
		}
	}
	
	function selecionarParafarmacoID($id,$conexion){	
		$res=$conexion->prepare("SELECT * FROM Parafarmacias where OID_PA='$id'");
		try{
			$res->execute();
			$ret=$res->fetch();
			return $ret;
		
		}catch(PDOException $e){
			echo "Excepcion";
		}
	}
	
	function seleccionarTodoID($id, $conexion){
		$res1=selecionarParafarmacoID($id,$conexion);
		$res2=selecionarSanitarioID($id,$conexion);
		$res3=selecionarFarmacoID($id,$conexion);
		if($res1){
				$ret=$res1;
			}else if(isset($res2)){
				$ret=$res2;
			}
			if ($res3){
				$ret=$res3;
			}
			return $ret;
	}
	
	function seleccionarTodoNombre($nombre, $conexion){
		$res1=$conexion->prepare("SELECT * FROM Parafarmacias where nombre='$nombre'");
		$res2=$conexion->prepare("SELECT * FROM Farmacos where nombre='$nombre'");
		$res3=$conexion->prepare("SELECT * FROM Sanitarios where nombre='$nombre'");
		try{
			$res1->execute();
			$con1=$res1->fetch();
			$res2->execute();
			$con2=$res2->fetch();
			$res3->execute();
			$con3=$res3->fetch();
			
			
			if($con1){
				$ret=$con1;
			}else if(isset($con2)){
				$ret=$con2;
			}
			if ($con3){
				$ret=$con3;
			}
			return $ret;
		}catch(PDOException $e){
			echo"Exception";
		}
	}
	
?>
