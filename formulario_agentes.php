<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Agente</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h3>NUEVO AGENTE</h3>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" METHOD="POST">
      <?php
       if(isset($_POST['guardar_empleado'])){
           $CI=$_POST['txt_CI'];
           $nom=$_POST['txt_NombPersona'];
           $NumTlf=$_POST['txt_NumTlfPersona'];
           $TPer=$_POST['txt_Tipo_persona'];
           $dir_agente=$_POST['txt_Direc_Agente'];
           $TAgente=$_POST['txt_Tipo_agente'];
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
        if($TPer == "" || $TPer != "AGENTE"){
          array_push($campos, "El tipo de persona solo puede ser AGENTE.");
        }
        if($dir_agente == ""){
          array_push($campos, "La direccion del agente no puede ser vacio.");
        }
        if($TAgente == ""){
          array_push($campos, "El tipo de agente no puede ser vacio.");
        }
          if(count($campos)>0) {
              echo "<div class='error'>";
              for($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              } 
            } else {
                  include ("add_agente.php");
              }
              echo "</div>";
       }
      ?>
      <p>Cedula: <input type="text" name="txt_CI" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Nombre: <input type="text" name="txt_NombPersona" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Telefono: <input type="text" name="txt_NumTlfPersona"></p>
      <p>Tipo de persona: <input type="text" name="txt_Tipo_persona" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Direccion del agente: <input type="text" name="txt_Direc_Agente" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Tipo de Agente: <input type="text" name="txt_Tipo_agente" onkeyup="this.value=this.value.toUpperCase()"></p>
      <input type="submit" name="guardar_empleado" value="GUARDAR EMPLEADO">    
    </form>
    <a href="sn_director.html">
        <input type="button" class="volver" value="<---VOLVER">
    </a>
    </div>
</body>
</html>