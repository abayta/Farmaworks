<?php
	session_start();
	unset($_SESSION['facturaAbierta']);
	unset($_SESSION['datosFacturaAbierta']);
	unset($_SESSION['lineasFactura']);
	header("Location:../pvp.php");
?>