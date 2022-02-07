<?php 
  include("conectar.php");

  $id = $_POST["id_agente"];//traemos los datos del input iid (oculto)
  $up = "update agente set
  Direc_Agente='$dir_agente',
  Tipo_agente='$TAgente'
   where id_agente='$id'";
  // Se crea la variable up, la que realizara la actualizacion.
  if(mysqli_query($link, $up)){
      echo "<div class='correcto'>";
      echo "Agentes modificado satisfactoriamente!";
      echo '<p><a href="personas.php">Volver</a></p>';
  } else {
      echo "<div class='error'>";
      echo "Error: ".$sql."<br>".mysqli_error($link);
      echo "<br>.<br>";
      echo '<p><a href="personas.php">Volver</a></p>';
  }
  mysqli_close($link);
?>