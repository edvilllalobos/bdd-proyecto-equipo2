<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar cliente</title>
    <link rel="stylesheet" href="css/maquetacion2.css">
    <link rel="stylesheet" href="css/MaquetacionCC.css">
</head>
<body>
    <h3>MODIFICAR CLIENTE</h3>
    <div id="principal" class="container">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <table border="0">
     <?php 
      if (isset($_REQUEST['id'])){
          $sqlCliente = "SELECT * FROM cliente WHERE id_cliente=".$_REQUEST['id'];
      } else if (isset($_POST['id_cliente'])){
          $sqlCliente = "SELECT * FROM cliente WHERE id_cliente=".$_POST['id_cliente'];
      }
      include ("conectar.php");
      $result = mysqli_query($link, $sqlCliente) or die (mysqli_error($link));
      $row = mysqli_fetch_array($result);
      if(isset($_POST['modificar_cliente'])){
        $ape=$_POST['txt_ape'];
        $dir=$_POST['txt_dir'];
        $calle=$_POST['txt_calle'];
        $ciudad=$_POST['txt_ciudad'];
        $gen=$_POST['txt_gen'];
        $fnac=$_POST['txt_fnac'];
        $prof=$_POST['txt_prof'];
        $campos = array();
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
          if (count($campos) > 0){
              echo "<div class='error'";
              for ($i=0; $i < count($campos); $i++){
                  echo "<li>".$campos[$i];
              }
          }else {
              include ("modif_clientes.php");
          }
          echo "</div>";
      }
     ?>
    <tr height="50">
    <td>
       Apellido: <input type="text" name="txt_ape" onkeyup="this.value=this.value.toUpperCase()">
       </td>
    </tr>
    <tr height="50">
    <td>
        Direccion: <input type="text" name="txt_dir" onkeyup="this.value=this.value.toUpperCase()">
        </td>
    </tr>
    <tr height="50">
    <td>
        Calle: <input type="text" name="txt_calle">
        </td>
    </tr>
    <tr height="50">
    <td>
        Ciudad: <input type="text" name="txt_ciudad">
        </td>
    </tr>
    <tr height="50">
    <td>
        Genero: <input type="text" name="txt_gen" onkeyup="this.value=this.value.toUpperCase()">
        </td>
    </tr>
    <tr height="50">
    <td>
        Fecha de nacimiento: <input type="text" name="txt_fnac">
        </td>
    </tr>
    <tr height="50">
    <td>
        Profesion: <input type="text" name="txt_prof" onkeyup="this.value=this.value.toUpperCase()">
        </td>
    </tr>
     <input type="hidden" name="id_cliente" value="<?php 
       if(isset($_REQUEST['id'])){
           echo $_REQUEST['id'];
       }else if(isset($_POST['id_cliente'])){
           echo $_POST['id_cliente'];
       }
      ?>"
     >
   <tr height="50">
    <td>
     <input type="submit" name="modificar_cliente" value="MODIFICAR">
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