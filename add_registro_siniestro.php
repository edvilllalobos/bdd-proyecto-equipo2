<?php 

include("conectar.php");

$sqlSiniestro = ("INSERT INTO `siniestro` (`descripcion_siniestro`) VALUES ('$des_siniestro')");

 if (mysqli_query($link, $sqlSiniestro)){
     echo "<div class='correcto'>";
     echo "Siniestro agregado satisfactoriamente!";
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlSiniestro."<br>".mysqli_error($link);
     echo "<br>.<br>";
 }

 $nro_siniestroN = mysqli_insert_id($link);

 $sqlRSiniestro = ("INSERT INTO `registro_siniestro` (`nro_siniestro`,`nro_poliza`, `fecha_siniestro`, `fecha_respuesta`, `id_rechazo`, `monto_reconocido`, `monto_solicitado`) VALUES ($nro_siniestroN, '$nro_poliza', '$fsiniestro', '$fresp', '$idRechazo', '$montoRecon', '$montoSolic')");

 if (mysqli_query($link, $sqlRSiniestro)){
     echo "<div class='correcto'>";
     echo "Registro de siniestro agregado satisfactoriamente!";
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlRSiniestro."<br>".mysqli_error($link);
     echo "<br>.<br>";
 }
?>