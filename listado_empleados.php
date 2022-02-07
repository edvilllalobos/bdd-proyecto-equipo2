<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
</head>
<body>
    <h3 class="alert alert-info">LISTADO  DE EMPLEADOS</h3>
    <div class="table-responsive">
        <?php 
          $sqlEmpleado = "SELECT Per.idPersona, Per.CI, Per.NombPersona, Per.NumTlfPersona, Per.Tipo_persona, Emp.fecha_inicio_empresa
          FROM persona Per INNER JOIN empleado Emp ON Per.idPersona = Emp.id_empleado ";
          include("conectar.php");
          $result = mysqli_query($link, $sqlEmpleado) or die ("No se puede completar la operacion");
          if($row = mysqli_fetch_array($result)){
              echo"<table class='table table-striped'>";
              mysqli_field_seek($result,0);

              while($field=mysqli_fetch_field($result)){ 

              }
                  echo"<thead>\n";
                  echo'<tr>';
                  echo'<th width=5%>'."ID"."<hr></th>";
                  echo'<th width=15%>'."CI"."<hr></th>";
                  echo'<th width=15%>'."Nombre"."<hr></th>";
                  echo'<th width=15%>'."Telefono"."<hr></th>";
                  echo'<th width=15%>'."Tipo de persona"."<hr></th>";
                  echo'<th width=15%>'."Fecha de inicio en la empresa"."<hr></th>";
                  echo'</tr>';
                  echo'</tr>';
                  echo"</thead> \n";
                  echo"<hr>";
                  do {
                      echo'<tr>';
                      echo"<td width='5%'>".$row["idPersona"]."<hr></td> \n";
                      echo "<td>".$row["CI"]."<hr></td> \n";
                      echo "<td>".$row["NombPersona"]."<hr></td> \n";
                      echo "<td>".$row["NumTlfPersona"]."<hr></td> \n";
                      echo "<td>".$row["Tipo_persona"]."<hr></td> \n"; 
                      echo "<td>".$row["fecha_inicio_empresa"]."<hr></td> \n";
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