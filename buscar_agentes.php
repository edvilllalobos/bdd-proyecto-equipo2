<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Agente</title>
</head>
<body>
    <h3 role="alert">Coincidencias con la profesion ingresada...</h3>
    <hr>
    <?php 
      $buscar = $_POST['buscar'];
      $sql = "SELECT id_agente, Direc_Agente, Tipo_agente
      FROM agente WHERE Tipo_agente LIKE '%$buscar%'
      ORDER BY id_agente";
      include("conectar.php");
      $result = mysqli_query($link, $sql) or die ("No se pudo  completar la operacion");
      if ($buscar == ""){
          echo '<div class="alert alert-danger">Debe especificar el tipo de agente a buscar</div>';
          echo'<p><a href="filtro_buscar_agentes.html">Volver</a></p>';
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
          echo'<th width=15%>'."Direc_Agente"."<hr></th>";
          echo'<th width=15%>'."Tipo_agente"."<hr></th>";
          echo '<th width="15%">'."Modificar".'<hr></th>';
          echo '<th width="15%">'."Borrar".'<hr></th>';
          echo '</tr>';
          echo '</tr>';
          echo"</thead> \n";
          do {
              echo '<tr>';
              echo "<td>".$row["Direc_Agente"]."<hr></td> \n";
              echo "<td>".$row["Tipo_agente"]."<hr></td> \n";
              echo"<td align=center>".'[<a href="modificar_agentes.php?id='.$row["id_agente"].'">Modificar</a>]'."</td> \n";
              echo"<td align=center>".'[<a href="borrar_agentes.php?id='.$row["id_agente"].'">Borrar</a>]'."</td> \n";
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