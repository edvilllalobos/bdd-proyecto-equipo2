<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Cliente</title>
</head>
<body>
    <h3 role="alert">Coincidencias con la profesion ingresada...</h3>
    <hr>
    <?php 
      $buscar = $_POST['buscar'];
      $sql = "SELECT id_cliente, apellido_cliente,Direc_Cliente,calle, ciudad, genero, fecha_nac, profesion
      FROM cliente WHERE profesion LIKE '%$buscar%'
      ORDER BY id_cliente";
      include("conectar.php");
      $result = mysqli_query($link, $sql) or die ("No se pudo  completar la operacion");
      if ($buscar == ""){
          echo '<div class="alert alert-danger">Debe especificar un nombre a buscar</div>';
          echo'<p><a href="filtro_buscar_clientes.html">Volver</a></p>';
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
          echo'<th width=15%>'."Apellido"."<hr></th>";
          echo'<th width=15%>'."Direccion"."<hr></th>";
          echo'<th width=15%>'."Calle"."<hr></th>";
          echo'<th width=15%>'."Ciudad"."<hr></th>";
          echo'<th width=15%>'."Genero"."<hr></th>";
          echo'<th width=15%>'."Fecha de nacimiento"."<hr></th>";
          echo'<th width=15%>'."Profesion"."<hr></th>";
          echo '<th width="15%">'."Modificar".'<hr></th>';
          echo '<th width="15%">'."Borrar".'<hr></th>';
          echo '</tr>';
          echo '</tr>';
          echo"</thead> \n";
          do {
              echo '<tr>';
              echo "<td>".$row["apellido_cliente"]."<hr></td> \n";
              echo "<td>".$row["Direc_Cliente"]."<hr></td> \n";
              echo "<td>".$row["calle"]."<hr></td> \n";
              echo "<td>".$row["ciudad"]."<hr></td> \n";
              echo "<td>".$row["genero"]."<hr></td> \n";
              echo "<td>".$row["fecha_nac"]."<hr></td> \n";
              echo "<td>".$row["profesion"]."<hr></td> \n";
              echo"<td align=center>".'[<a href="modificar_clientes.php?id='.$row["id_cliente"].'">Modificar</a>]'."</td> \n";
              echo"<td align=center>".'[<a href="borrar_clientes.php?id='.$row["id_cliente"].'">Borrar</a>]'."</td> \n";
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