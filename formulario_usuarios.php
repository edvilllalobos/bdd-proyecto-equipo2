<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Usuario</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>NUEVO USUARIO</h3>
    <div id="principal" class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" METHOD="POST">
        <table border="0">
      <?php
       if(isset($_POST['guardar_usuario'])){
           $nb_pais=$_POST['txt_nb_pais'];
           $nb_estado=$_POST['txt_nb_estado'];
           $nb_municipio=$_POST['txt_nb_municipio'];
           $nb_parroquia=$_POST['txt_nb_parroquia'];
           $nb_ciudad=$_POST['txt_nb_ciudad'];
           $nom_usuario=$_POST['txt_nom_usuario'];
           $email=$_POST['txt_email'];
           $contra=$_POST['txt_contra'];
           $nombre=$_POST['txt_nombre'];
           $apellido=$_POST['txt_apellido'];
           $edad=$_POST['txt_edad'];
           $sexo=$_POST['txt_sexo'];
           $nom_perfil=$_POST['txt_nombre_perfil'];
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
        if($nom_usuario == ""){
          array_push($campos, "El campo Nombre Usuario no puede estar vacio.");
      } 
      if($email == ""){
        array_push($campos, "El campo Email no puede estar vacio.");
      }
      if($contra == "" || is_numeric($contra)== FALSE){
        array_push($campos, "El campo Contraseña ingresado es invalido.");
      }
      if($nombre == ""){
        array_push($campos, "El campo Nombre no puede estar vacio.");
      }
      if($apellido == ""){
        array_push($campos, "El campo Apellido no puede estar vacio.");
      }
        if($edad == "" || is_numeric($edad)== FALSE || $edad > 100 || $edad < 1){
          array_push($campos, "El campo Edad es invalido.");
        }
        if($sexo == "" || $sexo != "M" && $sexo != "F"){
          array_push($campos, "El campo Sexo debe ser F o M.");
      } 
      if($nom_perfil == ""){
        array_push($campos, "El campo Nombre de perfil no puede estar vacio.");
      }
          if(count($campos)>0) {
              echo "<div class='error'>";
              for($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              } 
            } else {
                  include ("add_usuario.php");
              }
              echo "</div>";
       }
      ?>
      <tr height="50" align="center"><td>Nombre Pais: <input type="text" name="txt_nb_pais" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Nombre Estado: <input type="text" name="txt_nb_estado" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Nombre Municipio: <input type="text" name="txt_nb_municipio" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Nombre Parroquia: <input type="text" name="txt_nb_parroquia" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Nombre Ciudad: <input type="text" name="txt_nb_ciudad" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Nombre de usuario: <input type="text" name="txt_nom_usuario" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Email: <input type="text" name="txt_email"></td></tr>
      <tr height="50" align="center"><td>Contraseña: <input type="text" name="txt_contra"></td></tr>
      <tr height="50" align="center"><td>Nombre: <input type="text" name="txt_nombre" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Apellido: <input type="text" name="txt_apellido" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Edad: <input type="text" name="txt_edad"></td></tr>
      <tr height="50" align="center"><td>Sexo: <input type="text" name="txt_sexo" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center"><td>Nombre de Perfil: <input type="text" name="txt_nombre_perfil" onkeyup="this.value=this.value.toUpperCase()"></td></tr>
      <tr height="50" align="center">
      <td>
      <input type="submit" name="guardar_usuario" value="GUARDAR USUARIO">
      </td>
      </tr>
      </table>    
    </form>
    <tr height="50" align="right">
    <td>
    <a href="index.html">
        <input type="button" class="volver" value="<---VOLVER">
    </a>
    </td>
    </tr>
    </div>
</body>
</html>