<?php 	
	include 'bd.php';
	if (
		isset($_GET['nombre']) &&
		isset($_GET['apellido_paterno']) &&
		isset($_GET['apellido_materno']) &&
		isset($_GET['telefono']) &&
		isset($_GET['id'])){

		$base = new BaseDeDatos();
		$persona = new Persona();
		$persona->$nombre = $_GET['nombre'];
		$persona->$a_paterno = $_GET['apellido_paterno'];
		$persona->$a_materno = $_GET['apellido_materno'];
		$persona->$telefono = $_GET['telefono'];
		$base->altas($persona, $_GET['id']);

	}

 ?>