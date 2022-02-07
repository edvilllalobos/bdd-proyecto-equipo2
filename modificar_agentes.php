<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar agente</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>MODIFICAR AGENTE</h3>
    <div id="principal" class="container">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <table border="0">
     <?php 
      if (isset($_REQUEST['id'])){
          $sqlAgente = "SELECT * FROM agente WHERE id_agente=".$_REQUEST['id'];
      } else if (isset($_POST['id_agente'])){
          $sqlAgente = "SELECT * FROM agente WHERE id_agente=".$_POST['id_agente'];
      }
      include ("conectar.php");
      $result = mysqli_query($link, $sqlAgente) or die (mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if(isset($_POST['modificar_agente'])){
        $dir_agente=$_POST['txt_Direc_Agente'];
        $TAgente=$_POST['txt_Tipo_agente'];
        $campos = array();
        if($dir_agente == ""){
          array_push($campos, "Direccion del agente no puede ser vacio.");
        }
        if($TAgente == ""){
            array_push($campos, "Tipo de agente no puede ser vacio");
          }
          if (count($campos) > 0){
              echo "<div class='error'";
              for ($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              }
          }else {
              include ("modif_agentes.php");
          }
          echo "</div>";
      }
     ?>
   <tr height="50">
    <td>
          Direccion del agente: <input type="text" name="txt_Direc_Agente">
          </td>
    </tr>
    <tr height="50">
    <td>
          Tipo de agente: <input type="text" name="txt_Tipo_agente">
          </td>
    </tr>
     <input type="hidden" name="id_agente" value="<?php 
       if(isset($_REQUEST['id'])){
           echo $_REQUEST['id'];
       }else if(isset($_POST['id_agente'])){
           echo $_POST['id_agente'];
       }
      ?>"
     >
    <tr height="50">
    <td>
     <input type="submit" name="modificar_agente" value="MODIFICAR">
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