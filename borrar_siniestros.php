<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar registro siniestro</title>
</head>
<body>
    <?php 
     $sqlRSiniestro = "delete FROM registro_siniestro WHERE nro_siniestro=".$_REQUEST['id'];
     //echo $sql;
     include("conectar.php");
     $result = mysqli_query($link, $sqlRSiniestro) or die (mysqli_error($link));
     if (mysqli_query($link, $sqlRSiniestro)){
         echo "<div class='alert alert-success'>";
         echo "El registro de siniestro ha sido borrado correctamente!";
         echo "</div>";
     } else {
         echo mysqli_error($link);
         exit;
         echo "Error en la modificacion del sistema";
     }
     mysqli_close($link);
     echo '<p><a href="sn_director.html">Volver</a></p>';
    ?>
</body>
</html>