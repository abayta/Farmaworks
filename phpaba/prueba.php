<?php
	require_once("GestionBD.php");
	require_once("gestionProducto.php");
	require_once("gestionVenta.php");
	
	$conexion=CrearConexion();
	$n='prueba';
	$p='2.56';
	$s=40;
	$r=1;
	$c=1;
	$f='nose';
	$d='mucha';
	$v='rectal';
	$pro=1;
	$des='pa los que queman mal la gasofa';
	$id=4;
	
	borrarContiene($conexion,$id);
?>