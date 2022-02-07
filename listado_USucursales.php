<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Sucursales</title>
</head>
<body>
    <h3 class="alert alert-info">LISTADO  DE SUCURSALES</h3>
    <div class="table-responsive">
        <?php 
          $sqlUSucursal = "SELECT Pa.id_pais, Pa.nb_pais, 
                                  Est.nb_estado,
                                  Mun.nb_municipio,
                                  Parr.nb_parroquia,
                                  Ciu.nb_ciudad,
                                  Suc.nb_sucursal, Suc.activos
                                  FROM pais Pa
                                  INNER JOIN estado Est ON Pa.id_pais = Est.id_pais
                                  INNER JOIN municipio Mun ON Est.id_estado = Mun.id_estado
                                  INNER JOIN parroquia Parr ON Mun.id_municipio = Parr.id_municipio
                                  INNER JOIN ciudad Ciu ON Mun.id_municipio = Ciu.id_municipio
                                  INNER JOIN sucursal Suc ON Ciu.id_ciudad = Suc.id_ciudad";
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
                  echo'<th width=15%>'."Nombre Sucursal"."<hr></th>";
                  echo'<th width=15%>'."Activos"."<hr></th>";
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

                      echo "<td>".$row["nb_sucursal"]."<hr></td> \n";
                      echo "<td>".$row["activos"]."<hr></td> \n";
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