<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar cliente</title>
</head>
<body>
    <?php 
     $sqlCliente = "delete FROM cliente WHERE id_cliente=".$_REQUEST['id'];
     //echo $sql;
     include("conectar.php");
     $result = mysqli_query($link, $sqlCliente) or die (mysqli_error($link));
     if (mysqli_query($link, $sqlCliente)){
         echo "<div class='alert alert-success'>";
         echo "El cliente ha sido borrado correctamente!";
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