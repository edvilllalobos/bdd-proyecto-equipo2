<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar sucursales</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>MODIFICAR SUCURSALES</h3>
    <div id="principal" class="container">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <table border="0">
     <?php 
      if (isset($_REQUEST['id'])){
          $sqlUSucursal = "SELECT * FROM sucursal WHERE id_sucursal=".$_REQUEST['id'];
      } else if (isset($_POST['id_sucursal'])){
          $sqlUSucursal = "SELECT * FROM sucursal WHERE id_sucursal=".$_POST['id_sucursal'];
      }
      include ("conectar.php");
      $result = mysqli_query($link, $sqlUSucursal) or die (mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if(isset($_POST['modificar_sucursal'])){
        $nb_sucursal = $_POST['nb_sucursal'];
        $activos = $_POST['activos'];
        $campos = array();
        if($nb_sucursal == ""){
            array_push($campos, "El campo Nombre Sucursal no puede estar vacio.");
          }
        if($activos == "" || is_numeric($activos)== FALSE){
          array_push($campos, "El activo ingresado es invalido.");
        }
          if (count($campos) > 0){
              echo "<div class='error'";
              for ($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              }
          }else {
              include ("modif_USucursales.php");
          }
          echo "</div>";
      }
     ?>
            <tr height="50">
             <td>
                 Nombre Sucursal: <input type="text" name="nb_sucursal" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['nb_sucursal']; ?>">             
            </td>
           </tr>
           <tr height="50">
             <td>
                 Activos: <input type="text" name="activos" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['activos']; ?>">   
              </td>
           </tr>
     <input type="hidden" name="id_sucursal" value="<?php 
       if(isset($_REQUEST['id'])){
           echo $_REQUEST['id'];
       }else if(isset($_POST['id_sucursal'])){
           echo $_POST['id_sucursal'];
       }
      ?>"
     >
     <tr height="50">
      <td>
     <input type="submit" name="modificar_sucursal" value="MODIFICAR">
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