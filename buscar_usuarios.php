<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Sucursal</title>
</head>
<body>
    <h3 role="alert">Coincidencias con el nombre ingresado...</h3>
    <hr>
    <?php 
      $buscar = $_POST['buscar'];
      $sql = "SELECT id_usuario, nombre_usuario, email, nombre, apellido, edad, sexo
      FROM usuario WHERE nombre_usuario LIKE '%$buscar%'
      ORDER BY id_usuario";
      include("conectar.php");
      $result = mysqli_query($link, $sql) or die ("No se pudo  completar la operacion");
      if ($buscar == ""){
          echo '<div class="alert alert-danger">Debe especificar un nombre de usuario a buscar</div>';
          echo'<p><a href="filtro_buscar_usuarios.html">Volver</a></p>';
          echo '</html></body>';
          exit;
      }
      if($row =mysqli_fetch_array($result)){
          echo "<table class='table table-striped'>";
          mysqli_field_seek($result,0);
          while ($field = mysqli_fetch_field($result)){

          }
          echo "<thead> \n";
          echo '<tr>';
          echo '<th width="15%">'."Nombre Usuario".'<hr></th>';
          echo '<th width="15%">'."Email".'<hr></th>';
          echo '<th width="15%">'."Nombre".'<hr></th>';
          echo '<th width="15%">'."Apellido".'<hr></th>';
          echo '<th width="15%">'."Edad".'<hr></th>';
          echo '<th width="15%">'."Sexo".'<hr></th>';
          echo '<th width="15%">'."Modificar".'<hr></th>';
          echo '<th width="15%">'."Borrar".'<hr></th>';
          echo '</tr>';
          echo '</tr>';
          echo"</thead> \n";
          do {
              echo '<tr>';
              echo "<td>".$row["nombre_usuario"]."<hr></td> \n";
              echo "<td>".$row["email"]."<hr></td> \n";
              echo "<td>".$row["nombre"]."<hr></td> \n";
              echo "<td>".$row["apellido"]."<hr></td> \n";
              echo "<td>".$row["edad"]."<hr></td> \n";
              echo "<td>".$row["sexo"]."<hr></td> \n";
              echo"<td align=center>".'[<a href="modificar_usuarios.php?id='.$row["id_usuario"].'">Modificar</a>]'."</td> \n";
              echo"<td align=center>".'[<a href="borrar_usuarios.php?id='.$row["id_usuario"].'">Borrar</a>]'."</td> \n";
              echo "</tr>";
          } while($row = mysqli_fetch_array($result));
          echo "</table><hr>";
          echo'<p><a href="sn_director.html">Volver</a></p>';
      } else {
          echo '<div class="alert alert-danger">No se ha encontrado ningun registro con el nombre especificado</div>';
          echo '<p><a href="sn_director.html">Volver</a></p>';
      }
    ?>  
</body>
</html>