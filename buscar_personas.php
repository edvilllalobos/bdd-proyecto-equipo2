<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
</head>
<body>
    <h3 role="alert">Coincidencias con el nombre ingresado...</h3>
    <hr>
    <?php 
      $buscar = $_POST['buscar'];
      $sql = "SELECT idPersona, CI, NombPersona, NumTlfPersona
      FROM persona WHERE NombPersona LIKE '%$buscar%'
      ORDER BY idPersona";
      include("conectar.php");
      $result = mysqli_query($link, $sql) or die ("No se pudo  completar la operacion");
      if ($buscar == ""){
          echo '<div class="alert alert-danger">Debe especificar un nombre a buscar</div>';
          echo'<p><a href="filtro_buscar_personas.html">Volver</a></p>';
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
          echo '<th width="05%">'."ID".'<hr></th>';
          echo '<th width="15%">'."CI".'<hr></th>';
          echo '<th width="15%">'."Nombre".'<hr></th>';
          echo '<th width="15%">'."Telefono".'<hr></th>';
          echo '<th width="15%">'."Modificar".'<hr></th>';
          echo '<th width="15%">'."Borrar".'<hr></th>';
          echo '</tr>';
          echo '</tr>';
          echo"</thead> \n";
          do {
              echo '<tr>';
              echo "<td>".$row["idPersona"]."<hr></td> \n";
              echo "<td>".$row["CI"]."<hr></td> \n";
              echo "<td>".$row["NombPersona"]."<hr></td> \n";
              echo "<td>".$row["NumTlfPersona"]."<hr></td> \n";
              echo"<td align=center>".'[<a href="modificar_personas.php?id='.$row["idPersona"].'">Modificar</a>]'."</td> \n";
              echo"<td align=center>".'[<a href="borrar_personas.php?id='.$row["idPersona"].'">Borrar</a>]'."</td> \n";
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