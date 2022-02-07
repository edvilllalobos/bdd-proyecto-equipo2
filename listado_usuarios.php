<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
</head>
<body>
    <h3 class="alert alert-info">LISTADO  DE USUARIOS</h3>
    <div class="table-responsive">
        <?php 
          $sqlUSucursal = "SELECT Pa.id_pais, Pa.nb_pais, 
                                  Est.nb_estado,
                                  Mun.nb_municipio,
                                  Parr.nb_parroquia,
                                  Ciu.nb_ciudad,
                                  Usu.id_usuario, Usu.nombre_usuario, Usu.email, Usu.nombre, Usu.apellido, Usu.edad, Usu.sexo,
                                  Rol.id_perfil, Perf.nombre_perfil
                                  FROM pais Pa
                                  INNER JOIN estado Est ON Pa.id_pais = Est.id_pais
                                  INNER JOIN municipio Mun ON Est.id_estado = Mun.id_estado
                                  INNER JOIN parroquia Parr ON Mun.id_municipio = Parr.id_municipio
                                  INNER JOIN ciudad Ciu ON Mun.id_municipio = Ciu.id_municipio
                                  INNER JOIN usuario Usu ON Ciu.id_ciudad = Usu.id_ciudad 
                                  INNER JOIN rol_usuario Rol ON Usu.id_usuario = Rol.id_usuario
                                  INNER JOIN perfil Perf ON Perf.id_perfil = Rol.id_perfil";
          include("conectar.php");
          $result = mysqli_query($link, $sqlUSucursal) or die ("No se puede completar la operacion");
          if($row = mysqli_fetch_array($result)){
              echo"<table class='table table-striped'>";
              mysqli_field_seek($result,0);

              while($field=mysqli_fetch_field($result)){ 

              }
                  echo"<thead>\n";
                  echo'<tr>';
                  echo'<th width=15%>'."ID"."<hr></th>";
                  echo'<th width=5%>'."Nombre Pais"."<hr></th>";
                  echo'<th width=15%>'."Nombre Estado"."<hr></th>";
                  echo'<th width=15%>'."Nombre Municipio"."<hr></th>";
                  echo'<th width=15%>'."Nombre Parroquia"."<hr></th>";
                  echo'<th width=15%>'."Nombre Ciudad"."<hr></th>";
                  echo'<th width=15%>'."Nombre Usuario"."<hr></th>";
                  echo'<th width=15%>'."Email"."<hr></th>";
                  echo'<th width=15%>'."Nombre"."<hr></th>";
                  echo'<th width=15%>'."Apellido"."<hr></th>";
                  echo'<th width=15%>'."Edad"."<hr></th>";
                  echo'<th width=15%>'."Sexo"."<hr></th>";
                  echo'<th width=15%>'."Nombre del perfil"."<hr></th>";
                  echo'</tr>';
                  echo'</tr>';
                  echo"</thead> \n";
                  echo"<hr>";
                  do {
                      echo'<tr>';
                      echo"<td width='5%'>".$row["id_pais"]."<hr></td> \n";
                      echo "<td>".$row["nb_pais"]."<hr></td> \n";
                      echo "<td>".$row["nb_estado"]."<hr></td> \n";
                      echo "<td>".$row["nb_municipio"]."<hr></td> \n";
                      echo "<td>".$row["nb_parroquia"]."<hr></td> \n"; 
                      echo "<td>".$row["nb_ciudad"]."<hr></td> \n";
                      echo "<td>".$row["nombre_usuario"]."<hr></td> \n";
                      echo "<td>".$row["email"]."<hr></td> \n";
                      echo "<td>".$row["nombre"]."<hr></td> \n";
                      echo "<td>".$row["apellido"]."<hr></td> \n";
                      echo "<td>".$row["edad"]."<hr></td> \n";
                      echo "<td>".$row["sexo"]."<hr></td> \n";
                      echo "<td>".$row["nombre_perfil"]."<hr></td> \n";
                      echo '</tr>';
                  } while($row = mysqli_fetch_array($result));
                  echo "</table>";
                  echo"<br>";
                  echo"<hr>";
                  echo'<p><a href="sn_director.html">Volver</a></p>';
              }else {
                  echo"<p>No se ha encontrado ningun registro</p>";
                  echo'<p><a href="sn_director.html">Volver</a></p>';
              }
        ?>
    </div>
</body>
</html>