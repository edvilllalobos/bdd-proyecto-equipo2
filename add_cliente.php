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

 $id_clienteN = mysqli_insert_id($link);

 $sqlCliente = ("INSERT INTO `cliente` (`id_cliente`, `apellido_cliente`, `Direc_Cliente`, `calle`, `ciudad`, `genero`,`fecha_nac`,`profesion`) VALUES ($id_clienteN, '$ape', '$dir', '$calle', '$ciudad', '$gen', '$fnac', '$prof')");

 if (mysqli_query($link, $sqlCliente)){
     echo "<div class='correcto'>";
     echo "Cliente agregado satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlCliente."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }
?>