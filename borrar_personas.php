<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar persona</title>
</head>
<body>
    <?php 
     $sql = "delete FROM persona WHERE idPersona=".$_REQUEST['id'];
     //echo $sql;
     include("conectar.php");
     $result = mysqli_query($link, $sql) or die (mysqli_error($link));
     if (mysqli_query($link, $sql)){
         echo "<div class='alert alert-success'>";
         echo "La persona ha sido borrado correctamente!";
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