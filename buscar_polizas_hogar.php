<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Poliza</title>
</head>
<body>
    <h3 role="alert">Coincidencias con la descripcion de poliza ingresada...</h3>
    <hr>
    <?php 
      $buscar = $_POST['buscar'];
      $sql = "SELECT nro_poliza, descrip_poliza, prima
      FROM poliza WHERE descrip_poliza LIKE '%$buscar%'
      ORDER BY nro_poliza";
      include("conectar.php");
      $result = mysqli_query($link, $sql) or die ("No se pudo  completar la operacion");
      if ($buscar == ""){
          echo '<div class="alert alert-danger">Debe especificar una poliza a buscar</div>';
          echo'<p><a href="filtro_buscar_polizas.html">Volver</a></p>';
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
          echo'<th width=15%>'."Nro de Poliza"."<hr></th>";
          echo'<th width=5%>'."Descripcion de Poliza"."<hr></th>";
          echo'<th width=15%>'."Prima"."<hr></th>";
          echo '<th width="15%">'."Modificar".'<hr></th>';
          echo '<th width="15%">'."Borrar".'<hr></th>';
          echo '</tr>';
          echo '</tr>';
          echo"</thead> \n";
          do {
              echo '<tr>';
              echo"<td width='5%'>".$row["nro_poliza"]."<hr></td> \n";
              echo "<td>".$row["descrip_poliza"]."<hr></td> \n";
              echo "<td>".$row["prima"]."<hr></td> \n";
              echo"<td align=center>".'[<a href="modificar_polizas.php?id='.$row["nro_poliza"].'">Modificar</a>]'."</td> \n";
              echo"<td align=center>".'[<a href="borrar_polizas.php?id='.$row["nro_poliza"].'">Borrar</a>]'."</td> \n";
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