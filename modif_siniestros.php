<?php 
  include("conectar.php");

  $id = $_POST["nro_siniestro"];//traemos los datos del input iid (oculto)
  $up = "update registro_siniestro set nro_poliza='$nro_poliza', 
  fecha_siniestro='$fsiniestro', 
  fecha_respuesta='$fresp', 
  id_rechazo='$idRechazo', 
  monto_reconocido='$montoRecon',
  monto_solicitado='$montoSolic' 
  where nro_siniestro='$id'";
  // Se crea la variable up, la que realizara la actualizacion.
  if(mysqli_query($link, $up)){
      echo "<div class='correcto'>";
      echo "Registro de siniestro modificado satisfactoriamente!";
  } else {
      echo "<div class='error'>";
      echo "Error: ".$sql."<br>".mysqli_error($link);
      echo "<br>.<br>";
  }
  mysqli_close($link);
?>