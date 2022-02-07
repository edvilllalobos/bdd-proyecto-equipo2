<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Personas</title>
</head>
<body>
    <h3 class="alert alert-info">LISTADO  DE PERSONAS</h3>
    <div class="table-responsive">
        <?php 
          $sql = "SELECT idPersona, CI, NombPersona, NumTlfPersona, Tipo_persona
          FROM persona ORDER BY idPersona";
          include("conectar.php");
          $result = mysqli_query($link, $sql) or die ("No se puede completar la operacion");
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