<?php
	include 'modelo.php';
	class BaseDeDatos
	{
		private $connection;
		public function __construct()
		{
			$this->connection=new PDO('mysql:host=localhost;dbname=crud', 'root', '');
		}
	

	public function consulta($id)
	{
		$sql = $this->connection->prepare("SELECT * FROM contacto, contacto_cuenta, cuenta WHERE contacto.id_contacto = contacto_cuenta.id_contacto AND cuenta.id_cuenta = '{$id}' ");
		$sql->execute();
		$res=$sql.>fetchAll();
		$arreglo=array();
		foreach($res) as $dato) {
			$obj = new Persona();
			$obj->nombre = $dato['nombre'];
			$obj->apellido_paterno = $dato['apellido_paterno'];
			$obj->apellido_materno = $dato['apellido_materno'];
			$obj->telefono = $dato['telefono'];
			array_push($arreglo, $obj);
		}
		return $arreglo;
	}

	public function ingreso($user, $pass){
			$sql = $this->connection->prepare("SELECT * FROM cuenta WHERE cuenta.user = '{$user}' AND cuenta.password = '{$pass}' ");
			$sql->execute();
			$result = $sql->fetchAll();

			if(count($result)>0){
				foreach ($result as $dato) {
					return $dato['id_cuenta'];
				}
			}
		}

		public function altas($persona, $id){
			$data = [
				'nombre'=>$persona->$nombre;
				'apellido_paterno'=>$persona->$apellido_paterno;
				'apellido_materno'=>$persona->$apellido_materno;
				'telefono'=>$persona->$telefono;
			];

			$sql=$this->connection->prepare("INSERT INTO contacto (nombre,apellido_paterno, apellido_materno, telefono) VALUES (:nombre, :apellido_paterno, :apellido_materno, :telefono)");
			$sql->execute();
			$last = $this->connection->lastInsertId();

			$relation = $this->connection->prepare("INSERT INTO contacto_cuenta (id_cuenta, id_contacto) VALUES ('{$id}', '{$last}')");
			$relation->execute();

		}
	}

?>