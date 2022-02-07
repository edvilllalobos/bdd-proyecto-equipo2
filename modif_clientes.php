<?php 
  include("conectar.php");

  $id = $_POST["id_cliente"];//traemos los datos del input iid (oculto)
  $up = "update cliente set apellido_cliente='$ape', Direc_Cliente='$dir', 
  calle='$calle', 
  ciudad='$ciudad', 
  genero='$gen',
  fecha_nac='$fnac',
  profesion='$prof' where id_cliente='$id'";
  // Se crea la variable up, la que realizara la actualizacion.
  if(mysqli_query($link, $up)){
      echo "<div class='correcto'>";
      echo "Clientes modificado satisfactoriamente!";
      echo '<p><a href="personas.php">Volver</a></p>';
  } else {
      echo "<div class='error'>";
      echo "Error: ".$sql."<br>".mysqli_error($link);
      echo "<br>.<br>";
      echo '<p><a href="personas.php">Volver</a></p>';
  }
  mysqli_close($link);
?>