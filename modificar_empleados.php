<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar empleado</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>MODIFICAR EMPLEADO</h3>
    <div id="principal" class="container">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <table border="0">
     <?php 
      if (isset($_REQUEST['id'])){
          $sqlEmpleado = "SELECT * FROM empleado WHERE id_empleado=".$_REQUEST['id'];
      } else if (isset($_POST['id_empleado'])){
          $sqlEmpleado = "SELECT * FROM empleado WHERE id_empleado=".$_POST['id_empleado'];
      }
      include ("conectar.php");
      $result = mysqli_query($link, $sqlEmpleado) or die (mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if(isset($_POST['modificar_empleado'])){
        $f_ini=$_POST['txt_f_ini'];
        $campos = array();
        if($f_ini == "" || is_numeric($f_ini)== FALSE){
          array_push($campos, "La fecha ingresada es invalida.");
        }
          if (count($campos) > 0){
              echo "<div class='error'";
              for ($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              }
          }else {
              include ("modif_empleados.php");
          }
          echo "</div>";
      }
     ?>
   <tr height="50">
    <td>
        Fecha de inicio en la empresa: <input type="text" name="txt_f_ini">   
      </td>
    </tr>
     <input type="hidden" name="id_empleado" value="<?php 
       if(isset($_REQUEST['id'])){
           echo $_REQUEST['id'];
       }else if(isset($_POST['id_empleado'])){
           echo $_POST['id_empleado'];
       }
      ?>"
     >
   <tr height="50">
    <td>
     <input type="submit" name="modificar_empleado" value="MODIFICAR">
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