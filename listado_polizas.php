<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Polizas</title>
</head>
<body>
    <h3 class="alert alert-info">LISTADO  DE POLIZAS</h3>
    <div class="table-responsive">
        <?php 
          $sqlPoliza = "SELECT nro_poliza, descrip_poliza, prima 
                                  FROM poliza ORDER BY nro_poliza";
          include("conectar.php");
          $result = mysqli_query($link, $sqlPoliza) or die ("No se puede completar la operacion");
          if($row = mysqli_fetch_array($result)){
              echo"<table class='table table-striped'>";
              mysqli_field_seek($result,0);

              while($field=mysqli_fetch_field($result)){ 

              }
                  echo"<thead>\n";
                  echo'<tr>';
                  echo'<th width=5%>'."Nro de Poliza"."<hr></th>";
                  echo'<th width=15%>'."Descripcion de Poliza"."<hr></th>";
                  echo'<th width=15%>'."Prima"."<hr></th>";
                  echo'</tr>';
                  echo'</tr>';
                  echo"</thead> \n";
                  echo"<hr>";
                  do {
                      echo'<tr>';
                      echo"<td width='5%'>".$row["nro_poliza"]."<hr></td> \n";
                      echo "<td>".$row["descrip_poliza"]."<hr></td> \n";
                      echo "<td>".$row["prima"]."<hr></td> \n";
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
