<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar usuarios</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>MODIFICAR USUARIOS</h3>
    <div id="principal" class="container">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <table border="0">
     <?php 
      if (isset($_REQUEST['id'])){
          $sqlUsuario = "SELECT * FROM usuario WHERE id_usuario=".$_REQUEST['id'];
      } else if (isset($_POST['id_usuario'])){
          $sqlUsuario = "SELECT * FROM usuario WHERE id_usuario=".$_POST['id_usuario'];
      }
      include ("conectar.php");
      $result = mysqli_query($link, $sqlUsuario) or die (mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if(isset($_POST['modificar_usuario'])){
        $nom_usuario = $_POST['nombre_usuario'];
        $email = $_POST['email'];
        $contra = $_POST['contraseña'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $campos = array();
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
          if (count($campos) > 0){
              echo "<div class='error'";
              for ($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              }
          }else {
              include ("modif_usuarios.php");
          }
          echo "</div>";
      }
     ?>
        <tr height="50">
          <td>
            Nombre Usuario: <input type="text" name="nombre_usuario" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['nombre_usuario']; ?>">  
                  </td>
         </tr>
        <tr height="50">
          <td>
            Email: <input type="text" name="email" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['email']; ?>">       
             </td>
         </tr>
        <tr height="50">
          <td>
            Contraseña: <input type="text" name="contraseña" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['contraseña']; ?>"> 
                   </td>
         </tr>
        <tr height="50">
          <td>
            Nombre: <input type="text" name="nombre" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['nombre']; ?>">     
               </td>
         </tr>
        <tr height="50">
          <td>
            Apellido: <input type="text" name="apellido" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['apellido']; ?>">   
                 </td>
         </tr>
        <tr height="50">
          <td>
            Edad: <input type="text" name="edad" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['edad']; ?>">      
              </td>
         </tr>
        <tr height="50">
          <td>
            Sexo: <input type="text" name="sexo" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['sexo']; ?>">          
          </td>
         </tr>
     <input type="hidden" name="id_usuario" value="<?php 
       if(isset($_REQUEST['id'])){
           echo $_REQUEST['id'];
       }else if(isset($_POST['id_usuario'])){
           echo $_POST['id_usuario'];
       }
      ?>"
     >
  <tr height="50">
    <td>
     <input type="submit" name="modificar_usuario" value="MODIFICAR">
     </td>
    </tr>
      </table>
    </form>
    <a href="sn_director.html">
        <input type="button" class="volver" value="<---VOLVER">
    </a>
    </div>
</body>
</html>