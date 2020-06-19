<?php 
	include 'bd.php';

	if(isset($_GET['user']) && isset($_GET['pass'])){
		$user = $_GET['user'];
		$pass = $_GET['pass'];

		$base = new BaseDeDatos();
		$result = $base->ingreso($user, $pass);
		echo '{"user":'.$result.'}';
	}
 ?>