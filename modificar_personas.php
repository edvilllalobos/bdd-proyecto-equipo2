<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar persona</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>MODIFICAR PERSONA</h3>
    <div id="principal" class="container">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <table border="0">
     <?php 
      if (isset($_REQUEST['id'])){
          $sql = "SELECT * FROM persona WHERE idPersona=".$_REQUEST['id'];
      } else if (isset($_POST['idPersona'])){
          $sql = "SELECT * FROM persona WHERE idPersona=".$_POST['idPersona'];
      }
      include ("conectar.php");
      $result = mysqli_query($link, $sql) or die (mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if(isset($_POST['modificar_persona'])){
          $CI = $_POST['CI'];
          $nom = $_POST['NombPersona'];
          $NumTlf = $_POST['NumTlfPersona'];
          $TPer = $_POST['Tipo_persona'];
          $campos = array();
          if($CI == "" || is_numeric($CI)== FALSE){
            array_push($campos, "El campo CI no puede estar vacio.");
        } 
        if($nom == ""){
          array_push($campos, "El campo Nombre no puede estar vacio.");
        }
        if($NumTlf == "" || is_numeric($NumTlf)== FALSE){
          array_push($campos, "El numero de telefono ingresado es invalido.");
        }
        if($TPer == "" || $TPer == "BENEFICIARIO" || $TPer == "CLIENTE" || $TPer == "AGENTE" || $TPer == "EMPLEADO"){
            array_push($campos, "El tipo de persona solo puede se PERSONA.");
          }
          if (count($campos) > 0){
              echo "<div class='error'";
              for ($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              }
          }else {
              include ("modif_personas.php");
          }
          echo "</div>";
      }
     ?>
     <tr height="50">
          <td>
              CI: <input type="text" name="CI" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['CI']; ?>">  
               </td>
    </tr>
        <tr height="50">
          <td>
              Nombre: <input type="text" name="NombPersona" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['NombPersona']; ?>">  
               </td>
    </tr>
        <tr height="50">
          <td>
         Telefono: <input type="text" name="NumTlfPersona" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['NumTlfPersona']; ?>">    
         </td>
    </tr>
        <tr height="50">
          <td>
         Tipo de persona: <input type="text" name="Tipo_persona" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['Tipo_persona']; ?>"> 
            </td>
    </tr>
     <input type="hidden" name="idPersona" value="<?php 
       if(isset($_REQUEST['id'])){
           echo $_REQUEST['id'];
       }else if(isset($_POST['idPersona'])){
           echo $_POST['idPersona'];
       }
      ?>"
     >
     <tr height="50">
      <td>
     <input type="submit" name="modificar_persona" value="MODIFICAR">
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