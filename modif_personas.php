<?php 
  include("conectar.php");

  $id = $_POST["idPersona"];//traemos los datos del input iid (oculto)
  $up = "update persona set 
  CI='$CI', 
  NombPersona='$nom', NumTlfPersona='$NumTlf', Tipo_persona='$TPer'
   where idPersona='$id'";
  // Se crea la variable up, la que realizara la actualizacion.
  if(mysqli_query($link, $up)){
      echo "<div class='correcto'>";
      echo "Persona modificado satisfactoriamente!";
      echo '<p><a href="personas.php">Volver</a></p>';
  } else {
      echo "<div class='error'>";
      echo "Error: ".$sql."<br>".mysqli_error($link);
      echo "<br>.<br>";
      echo '<p><a href="personas.php">Volver</a></p>';
  }
  mysqli_close($link);
?>