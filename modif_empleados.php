<?php 
  include("conectar.php");

  $id = $_POST["id_empleado"];//traemos los datos del input iid (oculto)
  $up = "update empleado set
  fecha_inicio_empresa='$f_ini'
   where id_empleado='$id'";
  // Se crea la variable up, la que realizara la actualizacion.
  if(mysqli_query($link, $up)){
      echo "<div class='correcto'>";
      echo "Empleados modificado satisfactoriamente!";
      echo '<p><a href="personas.php">Volver</a></p>';
  } else {
      echo "<div class='error'>";
      echo "Error: ".$sql."<br>".mysqli_error($link);
      echo "<br>.<br>";
      echo '<p><a href="personas.php">Volver</a></p>';
  }
  mysqli_close($link);
?>