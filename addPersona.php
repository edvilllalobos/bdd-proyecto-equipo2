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
?>