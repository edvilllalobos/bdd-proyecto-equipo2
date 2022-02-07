<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>REGISTRO SINIESTRO</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>REGISTRO SINIESTRO</h3>
    <div id="principal" class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" METHOD="POST">
        <table border="0">
      <?php
       if(isset($_POST['guardar_siniestro'])){
           $des_siniestro=$_POST['txt_descripcion_siniestro'];
           $nro_poliza= $_POST['txt_nro_poliza'];
           $fsiniestro=$_POST['txt_fecha_siniestro'];
           $fresp=$_POST['txt_fecha_respuesta'];
           $idRechazo=$_POST['txt_id_rechazo'];
           $montoRecon=$_POST['txt_monto_reconocido'];
           $montoSolic=$_POST['txt_monto_solicitado'];
           $campos=array();
           if($des_siniestro == ""){
            array_push($campos, "El campo descripcion de siniestro no puede estar vacio.");
          }
          if($nro_poliza == "" || is_numeric($nro_poliza)== FALSE){
            array_push($campos, "El campo numero de poliza no puede estar vacio.");
          }
          if($fsiniestro == "" || is_numeric($fsiniestro)== FALSE){
            array_push($campos, "La fecha ingresada es invalida.");
          }
          if($fresp == "" || is_numeric($fresp)== FALSE){
            array_push($campos, "La fecha ingresada es invalida.");
          }
          if($idRechazo == "" || $idRechazo != "SI" && $idRechazo != "NO"){
            array_push($campos, "El campo id de rechazo no puede estar vacio.");
          }
          if($montoRecon == "" || is_numeric($montoRecon)== FALSE){
            array_push($campos, "El campo monto reconocido no puede estar vacio.");
          }
          if($montoSolic == "" || is_numeric($montoSolic)== FALSE){
            array_push($campos, "El campo monto solicitado no puede estar vacio.");
          }
          if(count($campos)>0) {
              echo "<div class='error'>";
              for($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              } 
            } else {
                  include ("add_registro_siniestro.php");
              }
              echo "</div>";
       }
      ?>
      <tr height="50"><td><p>Descripcion del siniestro: <input type="text" name="txt_descripcion_siniestro" onkeyup="this.value=this.value.toUpperCase()"></p></td></tr>
      <tr height="50"><td><p>Numero de la poliza: <input type="text" name="txt_nro_poliza" onkeyup="this.value=this.value.toUpperCase()"></p></td></tr>
      <tr height="50"><td><p>Fecha del siniestro: <input type="text" name="txt_fecha_siniestro" onkeyup="this.value=this.value.toUpperCase()"></p></td></tr>
      <tr height="50"><td><p>Fecha de respuesta: <input type="text" name="txt_fecha_respuesta" onkeyup="this.value=this.value.toUpperCase()"></p></td></tr>
      <tr height="50"><td><p>Confirmar o negar el rechazo: <input type="text" name="txt_id_rechazo" onkeyup="this.value=this.value.toUpperCase()"></p></td></tr>
      <tr height="50"><td><p>Monto reconocido: <input type="text" name="txt_monto_reconocido" onkeyup="this.value=this.value.toUpperCase()"></p></td></tr>
      <tr height="50"><td><p>Monto solicitado: <input type="text" name="txt_monto_solicitado" onkeyup="this.value=this.value.toUpperCase()"></p></td></tr>
      <tr height="50" align="center">
      <td>
      <input type="submit" name="guardar_siniestro" value="GUARDAR SINIESTRO"> 
      </td></tr>
      </table>   
    </form>
    <a href="sn_director.html">
        <input type="button" class="volver" value="<---VOLVER">
    </a>
    </div>
</body>
</html>