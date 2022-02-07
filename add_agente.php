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

 $id_agenteN = mysqli_insert_id($link);

 $sqlAgente = ("INSERT INTO `agente` (`id_agente`, `Direc_Agente`, `Tipo_agente`) VALUES ($id_agenteN, '$dir_agente', '$TAgente')");

 if (mysqli_query($link, $sqlAgente)){
     echo "<div class='correcto'>";
     echo "Agente agregado satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlAgente."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }
?>