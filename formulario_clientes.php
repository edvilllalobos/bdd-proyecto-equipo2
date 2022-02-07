<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h3>NUEVO CLIENTE</h3>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" METHOD="POST">
      <?php
       if(isset($_POST['guardar_cliente'])){
           $CI=$_POST['txt_CI'];
           $nom=$_POST['txt_NombPersona'];
           $NumTlf=$_POST['txt_NumTlfPersona'];
           $TPer=$_POST['txt_Tipo_persona'];
           $ape=$_POST['txt_ape'];
           $dir=$_POST['txt_dir'];
           $calle=$_POST['txt_calle'];
           $ciudad=$_POST['txt_ciudad'];
           $gen=$_POST['txt_gen'];
           $fnac=$_POST['txt_fnac'];
           $prof=$_POST['txt_prof'];
           $campos=array();
       if($CI == "" || is_numeric($CI)== FALSE){
            array_push($campos, "El campo CI no puede estar vacio.");
        } 
        if($nom == ""){
          array_push($campos, "El campo Nombre no puede estar vacio.");
        }
        if($NumTlf == "" || is_numeric($NumTlf)== FALSE){
          array_push($campos, "El numero de telefono ingresado es invalido.");
        }
        if($TPer == "" || $TPer == "BENEFICIARIO" || $TPer == "PERSONA" || $TPer == "AGENTE" || $TPer == "EMPLEADO"){
          array_push($campos, "El tipo de persona solo puede ser CLIENTE.");
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
          if(count($campos)>0) {
              echo "<div class='error'>";
              for($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              } 
            } else {
                  include ("add_cliente.php");
              }
              echo "</div>";
       }
      ?>
      <p>Cedula: <input type="text" name="txt_CI" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Nombre: <input type="text" name="txt_NombPersona" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Telefono: <input type="text" name="txt_NumTlfPersona"></p>
      <p>Tipo de persona: <input type="text" name="txt_Tipo_persona" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Apellido: <input type="text" name="txt_ape" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Direccion: <input type="text" name="txt_dir" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Calle: <input type="text" name="txt_calle"></p>
      <p>Ciudad: <input type="text" name="txt_ciudad"></p>
      <p>Genero: <input type="text" name="txt_gen" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Fecha de nacimiento: <input type="text" name="txt_fnac"></p>
      <p>Profesion: <input type="text" name="txt_prof" onkeyup="this.value=this.value.toUpperCase()"></p>
      <input type="submit" name="guardar_cliente" value="GUARDAR CLIENTE">    
    </form>
    <a href="sn_director.html">
        <input type="button" class="volver" value="<---VOLVER">
    </a>
    </div>
</body>
</html>