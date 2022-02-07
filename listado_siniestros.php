<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Siniestros</title>
</head>
<body>
    <h3 class="alert alert-info">LISTADO  DE SINIESTROS</h3>
    <div class="table-responsive">
        <?php 
          $sqlRSiniestro = "SELECT Si.nro_siniestro,Si.descripcion_siniestro,RSi.nro_poliza, RSi.fecha_siniestro, RSi.fecha_respuesta, RSi.id_rechazo, RSi.monto_reconocido, RSi.monto_solicitado 
          FROM siniestro Si INNER JOIN registro_siniestro RSi ON Si.nro_siniestro = RSi.nro_siniestro";
          include("conectar.php");
          $result = mysqli_query($link, $sqlRSiniestro) or die ("No se puede completar la operacion");
          if($row = mysqli_fetch_array($result)){
              echo"<table class='table table-striped'>";
              mysqli_field_seek($result,0);

              while($field=mysqli_fetch_field($result)){ 

              }
                  echo"<thead>\n";
                  echo'<tr>';
                  echo'<th width=5%>'."Numero del siniestro"."<hr></th>";
                  echo'<th width=15%>'."Descripcion del siniestro"."<hr></th>";
                  echo'<th width=15%>'."Numero de poliza"."<hr></th>";
                  echo'<th width=15%>'."Fecha del siniestro"."<hr></th>";
                  echo'<th width=15%>'."Fecha de respuesta"."<hr></th>";
                  echo'<th width=15%>'."Confirmacion de rechazo"."<hr></th>";
                  echo'<th width=15%>'."Monto reconocido"."<hr></th>";
                  echo'<th width=15%>'."Monto solicitado"."<hr></th>";
                  echo'</tr>';
                  echo'</tr>';
                  echo"</thead> \n";
                  echo"<hr>";
                  do {
                      echo'<tr>';
                      echo"<td width='5%'>".$row["nro_siniestro"]."<hr></td> \n";
                      echo "<td>".$row["descripcion_siniestro"]."<hr></td> \n";
                      echo "<td>".$row["nro_poliza"]."<hr></td> \n";
                      echo "<td>".$row["fecha_siniestro"]."<hr></td> \n";
                      echo "<td>".$row["fecha_respuesta"]."<hr></td> \n"; 
                      echo "<td>".$row["id_rechazo"]."<hr></td> \n";
                      echo "<td>".$row["monto_reconocido"]."<hr></td> \n";
                      echo "<td>".$row["monto_solicitado"]."<hr></td> \n";
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