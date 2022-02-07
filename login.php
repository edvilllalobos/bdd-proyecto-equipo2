<?php 
  $nom_usuario = $_POST['nombre_usuario'];
  $contra = $_POST['contraseña'];
  session_start();
  $_SESSION['nombre_usuario']=$nom_usuario;
  include ("conectar.php");

  $consulta = "SELECT * FROM usuario where  nombre_usuario='$nom_usuario' and contraseña='$contra'";
  $result=mysqli_query($link,$consulta);

  $filas=mysqli_fetch_array($result);

  if($filas['nombre_usuario']!="DIRECTOR"){
       header("location:login_cliente.html");
  }else if($filas['nombre_usuario']=="DIRECTOR"){
    header("location:login_director.html");
  }
   else {
      include("index.html");
  }
?>