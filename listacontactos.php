<?php 
	include 'bd.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$base = new BaseDeDatos();
		$result = $base->consulta($id);

		$str = '';
		$n = count($result);
		echo "[";
		for ($i=0; $i<$n; $i++){
			echo json_encode($result[$i]);
			if ($i<($n-1)){
				echo ",";
			}
		}
		echo "]";
	}
 ?>