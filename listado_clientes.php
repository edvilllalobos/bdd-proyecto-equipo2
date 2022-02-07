<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
</head>
<body>
    <h3 class="alert alert-info">LISTADO  DE CLIENTES</h3>
    <div class="table-responsive">
        <?php 
          $sqlCliente = "SELECT Per.idPersona, Per.CI, Per.NombPersona, Per.NumTlfPersona, Per.Tipo_persona, Cli.apellido_cliente, Cli.Direc_Cliente, Cli.calle, Cli.ciudad, Cli.genero, Cli.fecha_nac,Cli.profesion
          FROM persona Per INNER JOIN cliente Cli ON Per.idPersona = Cli.id_cliente ";
          include("conectar.php");
          $result = mysqli_query($link, $sqlCliente) or die ("No se puede completar la operacion");
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
                  echo'<th width=15%>'."Apellido"."<hr></th>";
                  echo'<th width=15%>'."Direccion"."<hr></th>";
                  echo'<th width=15%>'."Calle"."<hr></th>";
                  echo'<th width=15%>'."Ciudad"."<hr></th>";
                  echo'<th width=15%>'."Genero"."<hr></th>";
                  echo'<th width=15%>'."Fecha de nacimiento"."<hr></th>";
                  echo'<th width=15%>'."Profesion"."<hr></th>";
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
                      echo "<td>".$row["apellido_cliente"]."<hr></td> \n";
                      echo "<td>".$row["Direc_Cliente"]."<hr></td> \n";
                      echo "<td>".$row["calle"]."<hr></td> \n";
                      echo "<td>".$row["ciudad"]."<hr></td> \n";
                      echo "<td>".$row["genero"]."<hr></td> \n";
                      echo "<td>".$row["fecha_nac"]."<hr></td> \n";
                      echo "<td>".$row["profesion"]."<hr></td> \n";
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