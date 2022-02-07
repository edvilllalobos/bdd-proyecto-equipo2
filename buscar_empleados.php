<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Empleado</title>
</head>
<body>
    <h3 role="alert">Coincidencias con la profesion ingresada...</h3>
    <hr>
    <?php 
      $buscar = $_POST['buscar'];
      $sql = "SELECT id_empleado, fecha_inicio_empresa
      FROM empleado WHERE fecha_inicio_empresa LIKE '%$buscar%'
      ORDER BY id_empleado";
      include("conectar.php");
      $result = mysqli_query($link, $sql) or die ("No se pudo  completar la operacion");
      if ($buscar == ""){
          echo '<div class="alert alert-danger">Debe especificar una fecha a buscar</div>';
          echo'<p><a href="filtro_buscar_empleados.html">Volver</a></p>';
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
          echo'<th width=15%>'."Fecha de inicio en la empresa"."<hr></th>";
          echo '<th width="15%">'."Modificar".'<hr></th>';
          echo '<th width="15%">'."Borrar".'<hr></th>';
          echo '</tr>';
          echo '</tr>';
          echo"</thead> \n";
          do {
              echo '<tr>';
              echo "<td>".$row["fecha_inicio_empresa"]."<hr></td> \n";
              echo"<td align=center>".'[<a href="modificar_empleados.php?id='.$row["id_empleado"].'">Modificar</a>]'."</td> \n";
              echo"<td align=center>".'[<a href="borrar_empleados.php?id='.$row["id_empleado"].'">Borrar</a>]'."</td> \n";
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