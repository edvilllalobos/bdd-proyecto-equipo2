<?php 
 include("conectar.php");

 $sqlPais = ("INSERT INTO `pais` (`nb_pais`) VALUES ('$nb_pais')");

 if (mysqli_query($link, $sqlPais)){
     echo "<div class='correcto'>";
     echo "Pais agregado satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlPais."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }

 $id_paisN = mysqli_insert_id($link);

 $sqlEstado = ("INSERT INTO `estado` ( `nb_estado`, `id_pais`) VALUES ('$nb_estado', '$id_paisN')");

 if (mysqli_query($link, $sqlEstado)){
    echo "<div class='correcto'>";
    echo "Estado agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlEstado."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

 $id_estadoN = mysqli_insert_id($link);

 $sqlMunicipio = ("INSERT INTO `municipio` (`nb_municipio`, `id_estado`) VALUES ('$nb_municipio', '$id_estadoN')");

 if (mysqli_query($link, $sqlMunicipio)){
    echo "<div class='correcto'>";
    echo "Municipio agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlMunicipio."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}


 $id_municipioN = mysqli_insert_id($link);

 $id_municipioN2 = mysqli_insert_id($link);


 $sqlParroquia =  ("INSERT INTO `parroquia` (`nb_parroquia`, `id_municipio`) VALUES ('$nb_parroquia', '$id_municipioN')");

 if (mysqli_query($link, $sqlParroquia)){
    echo "<div class='correcto'>";
    echo "Parroquia agregada satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlParroquia."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

 $sqlCiudad =  ("INSERT INTO `ciudad` (`nb_ciudad`, `id_municipio`) VALUES ('$nb_ciudad', '$id_municipioN2')");

 if (mysqli_query($link, $sqlCiudad)){
    echo "<div class='correcto'>";
    echo "Ciudad agregada satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlCiudad."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$id_ciudadN = mysqli_insert_id($link);
 
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
 $sqlSucursal =  ("INSERT INTO `sucursal` (`nb_sucursal`, `id_ciudad`, `activos`, `idDirector`) VALUES ('$nb_sucursal', $id_ciudadN, '$activos', $id_empleadoN)");

 if (mysqli_query($link, $sqlSucursal)){
     echo "<div class='correcto'>";
     echo "Sucursal agregada satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlSucursal."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }

?>

