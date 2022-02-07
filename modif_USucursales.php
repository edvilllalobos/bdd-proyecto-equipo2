<?php 
  include("conectar.php");

  $id = $_POST["id_sucursal"];//traemos los datos del input iid (oculto)
  $up = "update sucursal set
  nb_sucursal='$nb_sucursal',
  activos='$activos'
   where id_sucursal='$id'";
  // Se crea la variable up, la que realizara la actualizacion.
  if(mysqli_query($link, $up)){
      echo "<div class='correcto'>";
      echo "Sucursales modificada satisfactoriamente!";
      echo '<p><a href="personas.php">Volver</a></p>';
  } else {
      echo "<div class='error'>";
      echo "Error: ".$sql."<br>".mysqli_error($link);
      echo "<br>.<br>";
      echo '<p><a href="personas.php">Volver</a></p>';
  }
  mysqli_close($link);
?>