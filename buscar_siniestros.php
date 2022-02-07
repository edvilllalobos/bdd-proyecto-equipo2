<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Registro Siniestro</title>
</head>
<body>
    <h3 role="alert">Coincidencias con el numero de registro ingresado...</h3>
    <hr>
    <?php 
      $buscar = $_POST['buscar'];
      $sql = "SELECT nro_siniestro,nro_poliza, fecha_siniestro, fecha_respuesta, id_rechazo, monto_reconocido, monto_solicitado
      FROM registro_siniestro WHERE nro_siniestro LIKE '%$buscar%'
      ORDER BY nro_poliza";
      include("conectar.php");
      $result = mysqli_query($link, $sql) or die ("No se pudo  completar la operacion");
      if ($buscar == ""){
          echo '<div class="alert alert-danger">Debe especificar un numero de siniestro a buscar</div>';
          echo'<p><a href="filtro_buscar_siniestros.html">Volver</a></p>';
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
          echo'<th width=15%>'."Numero de registro de siniestro"."<hr></th>";
          echo'<th width=15%>'."Numero de poliza"."<hr></th>";
          echo'<th width=15%>'."Fecha del siniestro"."<hr></th>";
          echo'<th width=15%>'."Fecha de respuesta"."<hr></th>";
          echo'<th width=15%>'."Confirmacion de rechazo"."<hr></th>";
          echo'<th width=15%>'."Monto reconocido"."<hr></th>";
          echo'<th width=15%>'."Monto solicitado"."<hr></th>";
          echo '<th width="15%">'."Modificar".'<hr></th>';
          echo '<th width="15%">'."Borrar".'<hr></th>';
          echo '</tr>';
          echo '</tr>';
          echo"</thead> \n";
          do {
              echo '<tr>';
              echo "<td>".$row["nro_siniestro"]."<hr></td> \n";
              echo "<td>".$row["nro_poliza"]."<hr></td> \n";
              echo "<td>".$row["fecha_siniestro"]."<hr></td> \n";
              echo "<td>".$row["fecha_respuesta"]."<hr></td> \n";
              echo "<td>".$row["id_rechazo"]."<hr></td> \n";
              echo "<td>".$row["monto_reconocido"]."<hr></td> \n";
              echo "<td>".$row["monto_solicitado"]."<hr></td> \n";
              echo"<td align=center>".'[<a href="modificar_siniestros.php?id='.$row["nro_siniestro"].'">Modificar</a>]'."</td> \n";
              echo"<td align=center>".'[<a href="borrar_siniestros.php?id='.$row["nro_siniestro"].'">Borrar</a>]'."</td> \n";
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