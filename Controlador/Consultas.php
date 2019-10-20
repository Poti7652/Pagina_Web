<?php 
	require_once 'BD.php';
	class Consultas extends BD
	{
		public function RegistroUsu($nom, $Ap, $Am, $Usu, $Corr, $pass, $gen, $edad, $pais, $ciu, $tip){
			$query = $this->conexionPDO()->prepare("INSERT INTO usuarios(nombres, apellido_P, apellido_M, usuario, correo, contrasena, genero, edad, pais, ciudad, tipo_Usuario) VALUES (:nom, :Ap,:Am,:usu,:Corr,:pass,:gen,:ed,:pai,:ciu,:tip)");

			if($query->execute(["nom"=>$nom, "Ap"=>$Ap,"Am"=>$Am, "usu"=>$Usu,"Corr"=>$Corr,"pass"=>$pass,"gen"=>$gen,"ed"=>$edad,"pai"=>$pais,"ciu"=>$ciu,"tip"=>$tip,]))
				return true;
			else {
				return false;
			}
		}
	}

 ?>