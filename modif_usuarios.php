<?php 
  include("conectar.php");

  $id = $_POST["id_usuario"];//traemos los datos del input iid (oculto)
  $up = "update usuario set
  nombre_usuario='$nom_usuario',
  email='$email',
  contraseña='$contra',
  nombre='$nombre',
  apellido='$apellido',
  edad='$edad',
  sexo='$sexo'
   where id_usuario='$id'";
  // Se crea la variable up, la que realizara la actualizacion.
  if(mysqli_query($link, $up)){
      echo "<div class='correcto'>";
      echo "Usuario modificado satisfactoriamente!";
      echo '<p><a href="personas.php">Volver</a></p>';
  } else {
      echo "<div class='error'>";
      echo "Error: ".$sql."<br>".mysqli_error($link);
      echo "<br>.<br>";
      echo '<p><a href="personas.php">Volver</a></p>';
  }
  mysqli_close($link);
?>