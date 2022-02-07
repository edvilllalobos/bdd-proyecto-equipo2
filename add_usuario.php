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

$sqlUsuario = ("INSERT INTO `usuario`(`nombre_usuario`, `email`, `contraseña`, `nombre`, `apellido`, `edad`, `sexo`, `id_ciudad`) VALUES ('$nom_usuario', '$email', '$contra', '$nombre', '$apellido', '$edad', '$sexo', '$id_ciudadN')");

if (mysqli_query($link, $sqlUsuario)){
    echo "<div class='correcto'>";
    echo "Usuario agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlUsuario."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$id_usuarioN = mysqli_insert_id($link);

$sqlPerfil = ("INSERT INTO `perfil`(`nombre_perfil`) VALUES ('$nom_perfil')");

if (mysqli_query($link, $sqlPerfil)){
    echo "<div class='correcto'>";
    echo "Perfil agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlPerfil."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$id_perfilN = mysqli_insert_id($link);

$sqlRolUsuario = ("INSERT INTO `rol_usuario`(`id_perfil`, `id_usuario`) VALUES ('$id_perfilN', '$id_usuarioN')");

if (mysqli_query($link, $sqlRolUsuario)){
    echo "<div class='correcto'>";
    echo "Rol del usuario agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlRolUsuario."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}


?>