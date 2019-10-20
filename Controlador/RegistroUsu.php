<?php
require 'BD.php';
include_once 'Consultas.php';
 $con = conexion();
 $registro = new Consultas();
    //variables POST
    $Ap = mysqli_real_escape_string($con,$_POST['Apellido_P']);
    $Am = mysqli_real_escape_string($con,$_POST['Apellido_M']);
    $nom = mysqli_real_escape_string($con,$_POST['nombre']);
    $usu = mysqli_real_escape_string($con,$_POST['Usuario']);
    $corr = mysqli_real_escape_string($con,$_POST['correo']);
    $pass = mysqli_real_escape_string($con,$_POST['contra']);
    $passHash = password_hash($pass, PASSWORD_BCRYPT);
    $edad = mysqli_real_escape_string($con,$_POST['edad']);
    $pai = mysqli_real_escape_string($con,$_POST['pais']);
    $ciu = mysqli_real_escape_string($con,$_POST['ciu']);
    $tip =2;
    if ($_POST["Genero"] === "Hombre")
      $gen = $_POST["Genero"];
    else
      $gen = $_POST["Genero"];

    //---------------------------------------------------------------------------------
    $SqlC="SELECT Correo FROM usuarios WHERE Correo='".$corr."'";
    $SqlU="SELECT Usuario FROM usuarios WHERE Usuario='".$usu."'";
    if($resuC=mysqli_query($con,$SqlC))
      $numC = mysqli_num_rows($resuC);

    if($resuU=mysqli_query($con,$SqlU))
      $numU = mysqli_num_rows($resuU);

    if($numC>0 && $numU>0){
      $MensCorreoUsu = "Estos Datos ya corresponden a un Usuario Existente";
    }else if($numU>0){
      $MensUsuario = "Este Alias ó Usuario ya Existe con una cuenta Ralacionada";
    }else if($numC>0){
      $MensCorreo = "Este Correo ya Existe con una cuenta Ralacionada";
    }else{
      $diruser = '../Users/'.$usu."/";
      if($registro->RegistroUsu($nom,$Ap,$Am,$usu,$corr,$passHash,$gen,$edad,$pai,$ciu,$tip)){
        echo "Registro de usuario con exito!!!";
      echo "<meta http-equiv='Refresh' content='0.0; URL=Inicio.php'>";
      }else 
        echo "Ocurrio Algo al Hacer el registro del Usuario";
    }
    
?>