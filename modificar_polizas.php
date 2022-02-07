<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar polizas</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>MODIFICAR POLIZAS</h3>
    <div id="principal" class="container">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <table border="0">
     <?php 
      if (isset($_REQUEST['id'])){
          $sqlPoliza = "SELECT * FROM poliza WHERE nro_poliza=".$_REQUEST['id'];
      } else if (isset($_POST['nro_poliza'])){
          $sqlPoliza = "SELECT * FROM poliza WHERE nro_poliza=".$_POST['nro_poliza'];
      }
      include ("conectar.php");
      $result = mysqli_query($link, $sqlPoliza) or die (mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if(isset($_POST['modificar_poliza'])){
        $des_poliza = $_POST['descrip_poliza'];
        $prima = $_POST['prima'];
        $campos = array();
        if($des_poliza == ""){
            array_push($campos, "El campo Descripcion de la poliza no puede estar vacio.");
          }
        if($prima == "" || is_numeric($prima)== FALSE){
          array_push($campos, "El valor de la prima ingresado es invalido.");
        }
          if (count($campos) > 0){
              echo "<div class='error'";
              for ($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              }
          }else {
              include ("modif_polizas.php");
          }
          echo "</div>";
      }
     ?>
        <tr height="50">
          <td>
              Descripcion de Poliza: <input type="text" name="descrip_poliza" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['descrip_poliza']; ?>">
              </td>
    </tr>
        <tr height="50">
          <td>
              Prima: <input type="text" name="prima" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $row['prima']; ?>">
              </td>
    </tr>
     <input type="hidden" name="nro_poliza" value="<?php 
       if(isset($_REQUEST['id'])){
           echo $_REQUEST['id'];
       }else if(isset($_POST['nro_poliza'])){
           echo $_POST['nro_poliza'];
       }
      ?>"
     >
     <tr height="50">
          <td>
     <input type="submit" name="modificar_poliza" value="MODIFICAR">
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