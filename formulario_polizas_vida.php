<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Poliza de vida</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>NUEVA POLIZA DE VIDA</h3>
    <div id="principal" class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" METHOD="POST">
        <table border="0">
      <?php
       if(isset($_POST['guardar_poliza'])){
           $des_poliza="POLIZA DE VIDA";
           $prima=$_POST['txt_prima'];
           $primaV=$prima;
           $coberturaV=$_POST['txt_cobertura'];
           $imp_prestamo=$_POST['txt_imp_prestamo'];
           $fec_pago=$_POST['txt_fec_pago'];
           $imp_pago=$_POST['txt_imp_pago'];
           $CI=$_POST['txt_CI'];
           $nom=$_POST['txt_NombPersona'];
           $NumTlf=$_POST['txt_NumTlfPersona'];
           $TPer="CLIENTE";
           $ape=$_POST['txt_ape'];
           $dir=$_POST['txt_dir'];
           $calle=$_POST['txt_calle'];
           $ciudad=$_POST['txt_ciudad'];
           $gen=$_POST['txt_gen'];
           $fnac=$_POST['txt_fnac'];
           $prof=$_POST['txt_prof'];
           $saldo_prima=$_POST['txt_saldo_prima'];
           $fec_uso_reciente=$_POST['txt_fec_uso_reciente'];
           $fec_contrato=$_POST['txt_fec_contrato'];
           $estado_contrato=$_POST['txt_estado_contrato'];
           $monto_comision_Ag=$_POST['txt_comisionAg'];
           $TInteres=$_POST['txt_TInteres'];
           $campos=array();
        if($prima == "" || is_numeric($prima)== FALSE){
          array_push($campos, "El campo prima no puede estar vacio.");
        }
        if($coberturaV == ""){
          array_push($campos, "El campo Cobertura de vida no puede estar vacio.");
        }
        if($imp_prestamo == "" || is_numeric($imp_prestamo)== FALSE){
          array_push($campos, "El campo Importe Prestamo no puede estar vacio.");
        }
        if($fec_pago == "" || is_numeric($fec_pago)== FALSE){
          array_push($campos, "El campo Fecha de Pago no puede estar vacio.");
        }
        if($imp_pago == "" || is_numeric($imp_pago)== FALSE){
          array_push($campos, "El campo Importe Pago no puede estar vacio.");
        }
        if($CI == "" || is_numeric($CI)== FALSE){
          array_push($campos, "El campo CI no puede estar vacio.");
      } 
      if($nom == ""){
        array_push($campos, "El campo Nombre no puede estar vacio.");
      }
      if($NumTlf == "" || is_numeric($NumTlf)== FALSE){
        array_push($campos, "El numero de telefono ingresado es invalido.");
      }
      if($ape == ""){
        array_push($campos, "El campo Apellido no puede estar vacio.");
    } 
    if($dir == ""){
      array_push($campos, "El campo Direcccion no puede estar vacio.");
    }
    if($calle == ""){
      array_push($campos, "El campo Calle no puede estar vacio.");
    }
    if($ciudad == ""){
      array_push($campos, "El campo Ciudad no puede estar vacio.");
    }
    if($gen == ""){
      array_push($campos, "El campo Gen debe ser M o F");
    }
    if($fnac == "" || is_numeric($fnac)== FALSE){
      array_push($campos, "La fecha ingresada es invalido.");
    }
    if($prof == ""){
      array_push($campos, "El campo Profesion no puede estar vacio.");
    }
    if($saldo_prima == "" || is_numeric($saldo_prima)== FALSE){
      array_push($campos, "El campo Saldo Prima no puede estar vacio.");
    }
    if($fec_uso_reciente == "" || is_numeric($fec_uso_reciente)== FALSE){
      array_push($campos, "El campo fecha de uso reciente no puede estar vacio.");
    }
  if($fec_contrato == "" || is_numeric($fec_contrato)== FALSE){
    array_push($campos, "El campo fecha de contrato no puede estar vacio.");
  }
  if($estado_contrato == ""){
    array_push($campos, "El estado de contrato no puede ser vacio.");
  }
  if($monto_comision_Ag == "" || is_numeric($monto_comision_Ag)== FALSE){
    array_push($campos, "El campo monto de la comision agregada no puede estar vacio.");
  }
  if($TInteres== "" ){
    array_push($campos, "El tipo de interes no puede ser vacio.");
  }
          if(count($campos)>0) {
              echo "<div class='error'>";
              for($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              } 
            } else {
                  include ("add_poliza_vida.php");
              }
              echo "</div>";
            }
      ?>
     <tr height="50"><td>Prima: <input type="text" name="txt_prima" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Cobertura de vida: <input type="text" name="txt_cobertura" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Importe prestamo: <input type="text" name="txt_imp_prestamo"></td></tr>
     <tr height="50"><td>Fecha de pago: <input type="text" name="txt_fec_pago"></td></tr>
     <tr height="50"><td>Importe de pago: <input type="text" name="txt_imp_pago"></td></tr>
     <tr height="50"><td>Cedula del cliente: <input type="text" name="txt_CI" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Nombre del cliente: <input type="text" name="txt_NombPersona" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Telefono del cliente: <input type="text" name="txt_NumTlfPersona"></td></tr>
     <tr height="50"><td>Apellido del cliente: <input type="text" name="txt_ape" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Direccion del cliente: <input type="text" name="txt_dir" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Calle: <input type="text" name="txt_calle"></td></tr>
     <tr height="50"><td>Ciudad: <input type="text" name="txt_ciudad"></td></tr>
     <tr height="50"><td>Genero: <input type="text" name="txt_gen" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Fecha de nacimiento: <input type="text" name="txt_fnac"></td> </tr>
     <tr height="50"><td>Profesion: <input type="text" name="txt_prof" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Saldo de Prima: <input type="text" name="txt_saldo_prima" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Fecha de uso reciente: <input type="text" name="txt_fec_uso_reciente"></td></tr>
     <tr height="50"><td>Fecha de contrato: <input type="text" name="txt_fec_contrato"></td></tr>
     <tr height="50"><td>Estado del contrato: <input type="text" name="txt_estado_contrato" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
     <tr height="50"><td>Monto de la comision agregada: <input type="text" name="txt_comisionAg"></td></tr>
     <tr height="50"><td>Tipo de interes: <input type="text" name="txt_TInteres" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center">
      <td>
      <input type="submit" name="guardar_poliza" value="GUARDAR POLIZA">
      </td>
      </tr>
      </table>      
    </form>
    <tr height="50" align="right">
    <td>
    <a href="sn_cliente.html">
        <input type="button" class="volver" value="<---VOLVER">
    </a>
    </td>
    </tr>
    </div>
</body>
</html>