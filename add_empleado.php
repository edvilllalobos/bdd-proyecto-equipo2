<?php 
 include("conectar.php");

 $sql = ("INSERT INTO `persona` (`CI`, `NombPersona`, `NumTlfPersona`, `Tipo_persona`) VALUES ('$CI' , '$nom', '$NumTlf', '$TPer')");

 if (mysqli_query($link, $sql)){
     echo "<div class='correcto'>";
     echo "Persona agregada satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sql."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }

 $id_empleadoN = mysqli_insert_id($link);

 $sqlEmpleado = ("INSERT INTO `empleado` (`id_empleado`, `fecha_inicio_empresa`) VALUES ($id_empleadoN, '$f_ini')");

 if (mysqli_query($link, $sqlEmpleado)){
     echo "<div class='correcto'>";
     echo "Empleado agregado satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlEmpleado."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }
?>