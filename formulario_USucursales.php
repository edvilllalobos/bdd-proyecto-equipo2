<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Sucursal</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h3>NUEVA SUCURSAL</h3>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" METHOD="POST">
      <?php
       if(isset($_POST['guardar_sucursal'])){
           $nb_pais=$_POST['txt_nb_pais'];
           $nb_estado=$_POST['txt_nb_estado'];
           $nb_municipio=$_POST['txt_nb_municipio'];
           $nb_parroquia=$_POST['txt_nb_parroquia'];
           $nb_ciudad=$_POST['txt_nb_ciudad'];
           $CI=$_POST['txt_CI'];
           $nom=$_POST['txt_NombPersona'];
           $NumTlf=$_POST['txt_NumTlfPersona'];
           $TPer=$_POST['txt_Tipo_persona'];
           $f_ini=$_POST['txt_f_ini'];
           $nb_sucursal=$_POST['txt_nb_sucursal'];
           $activos=$_POST['txt_activos'];
           $campos=array();
        if($nb_pais == ""){
          array_push($campos, "El campo Nombre Pais no puede estar vacio.");
        }
        if($nb_estado == ""){
          array_push($campos, "El campo Nombre de Estado no puede estar vacio.");
        }
        if($nb_municipio == ""){
          array_push($campos, "El campo Nombre Municiopio no puede estar vacio.");
        }
        if($nb_parroquia == ""){
          array_push($campos, "El campo Nombre Parroquia no puede estar vacio.");
        }
        if($nb_ciudad == ""){
          array_push($campos, "El campo Nombre Ciudad no puede estar vacio.");
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
      if($TPer == "" || $TPer != "DIRECTOR"){
        array_push($campos, "El tipo de persona solo puede ser DIRECTOR.");
      }
      if($f_ini == "" || is_numeric($f_ini)== FALSE){
        array_push($campos, "El numero de telefono ingresado es invalido.");
      }
        if($nb_sucursal == ""){
          array_push($campos, "El campo Nombre Sucursal no puede estar vacio.");
        }
        if($activos == "" || is_numeric($activos)== FALSE){
          array_push($campos, "El campo Activos no puede estar vacio.");
      } 
          if(count($campos)>0) {
              echo "<div class='error'>";
              for($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              } 
            } else {
                  include ("add_USucursal.php");
              }
              echo "</div>";
       }
      ?>
      <p>Nombre Pais: <input type="text" name="txt_nb_pais" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Nombre Estado: <input type="text" name="txt_nb_estado" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Nombre Municipio: <input type="text" name="txt_nb_municipio" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Nombre Parroquia: <input type="text" name="txt_nb_parroquia" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Nombre Ciudad: <input type="text" name="txt_nb_ciudad" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Cedula: <input type="text" name="txt_CI" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Nombre: <input type="text" name="txt_NombPersona" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Telefono: <input type="text" name="txt_NumTlfPersona"></p>
      <p>Tipo de persona: <input type="text" name="txt_Tipo_persona" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Fecha de inicio en la empresa: <input type="text" name="txt_f_ini"></p>
      <p>Nombre Sucursal: <input type="text" name="txt_nb_sucursal" onkeyup="this.value=this.value.toUpperCase()"></p>
      <p>Activos: <input type="text" name="txt_activos"></p>
      <input type="submit" name="guardar_sucursal" value="GUARDAR SUCURSAL">    
    </form>
    <a href="sn_director.html">
        <input type="button" class="volver" value="<---VOLVER">
    </a>
    </div>
</body>
</html>