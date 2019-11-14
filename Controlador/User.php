<?php 
	include_once 'BD.php';
	Class User extends BD
	{
		public $usuario;
		public $nombre;
		public $Correo;
//---------------------------Comprueba si el Uusario escrito Existe en la BD----------------------
		public function ExistUsuario($usu, $pass){
			$query = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE usuario = :usu");
			$query->execute(['usu' =>$usu]);

			foreach ($query as $rows) {
				if ($usu === $rows['usuario'] && password_verify($pass, $rows['contrasena']))
					return true;
				else 
					return false;
			}
		}
//---------------------------Comprueba si el Correo escrito Existe en la BD-------------------------
		public function ExistCorreo($cor, $pass){
			$querycorr = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE correo = :cor");
			$querycorr->execute(['cor' =>$cor]);

			foreach ($querycorr as $rows) {
				if ($cor === $rows['correo'] && password_verify($pass, $rows['contrasena']))
					return true;
				else 
					return false;
			}
		}

		public function setUsuario($usuarios){
			$sql = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE usuario = :usuarios");
			$sql->execute(['usuarios' =>$usuarios]);

			foreach ($sql as $row) {
				$this->nombre = $row['nombre'];
				$this->usuario = $row['usuario'];
				$this->Correo = $row['correo'];
			}
		}

		public function setCorreo($correo){
			$sql = $this->conexionPDO()->prepare("SELECT * FROM usuarios WHERE correo = :correo");
			$sql->execute(['correo' =>$correo]);

			foreach ($sql as $row) {
				$this->nombre = $row['nombre'];
				$this->usuario = $row['usuario'];
				$this->Correo = $row['correo'];
			}			
		}

		public function getUsuario(){
			return $this->nombre;
			return $this->usuario;
			return $this->Correo;
		}
	}
 ?>
