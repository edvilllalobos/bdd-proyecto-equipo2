<?php 

include("conectar.php");

$sqlPoliza = ("INSERT INTO `poliza` (`descrip_poliza`, `prima`) VALUES ('$des_poliza', '$prima')");

 if (mysqli_query($link, $sqlPoliza)){
     echo "<div class='correcto'>";
     echo "Poliza agregada satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlPoliza."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }

 $nro_polizaN = mysqli_insert_id($link);

 $sqlInmueble = ("INSERT INTO `inmueble` ( `id_inmueble`, `DirecInmueble`, `valor`, `contenido`, `riesgos_auxiliares`) VALUES ($nro_polizaN, '$dirInmueble', '$valor', '$contenido', '$riesgosAux')");

 if (mysqli_query($link, $sqlInmueble)){
    echo "<div class='correcto'>";
    echo "Inmueble agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlInmueble."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

 $id_inmuebleN = mysqli_insert_id($link);

 $id_inmuebleN2 = mysqli_insert_id($link);

 $sqlTCobertura = ("INSERT INTO `tipo_cobertura` (`DescripTipoCobertura`) VALUES ('$desTCober')");

 if (mysqli_query($link, $sqlTCobertura)){
    echo "<div class='correcto'>";
    echo "Tipo de cobertura agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlTCobertura."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

 $id_TCoberN = mysqli_insert_id($link);

$sqlPrestamo = ("INSERT INTO `prestamo`(`importe_prestamo`) VALUES ('$imp_prestamo')");

if (mysqli_query($link, $sqlPrestamo)){
    echo "<div class='correcto'>";
    echo "Prestamo agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlPrestamo."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$id_prestamoN = mysqli_insert_id($link);

$sqlPago = ("INSERT INTO `pago`(`id_prestamo`, `fecha_pago`, `importe_pago`) VALUES ($id_prestamoN, '$fec_pago', '$imp_pago')");

if (mysqli_query($link, $sqlPago)){
    echo "<div class='correcto'>";
    echo "Pago agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlPago."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$sql = ("INSERT INTO `persona` (`CI`, `NombPersona`, `NumTlfPersona`, `Tipo_persona`) VALUES ('$CI' , '$nom', '$NumTlf', '$TPer')");

if (mysqli_query($link, $sql)){
    echo "<div class='correcto'>";
    echo "Persona agregada satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sql."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$id_clienteN = mysqli_insert_id($link);
$id_clienteN2 = mysqli_insert_id($link);

$sqlCliente = ("INSERT INTO `cliente` (`id_cliente`, `apellido_cliente`, `Direc_Cliente`, `calle`, `ciudad`, `genero`,`fecha_nac`,`profesion`) VALUES ($id_clienteN, '$ape', '$dir', '$calle', '$ciudad', '$gen', '$fnac', '$prof')");

if (mysqli_query($link, $sqlCliente)){
    echo "<div class='correcto'>";
    echo "Cliente agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlCliente."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$sqlTitular = ("INSERT INTO `titular` (`id_cliente`, `nro_poliza`, `saldo_prima`, `fecha_uso_reciente`) VALUES ($id_clienteN, $nro_polizaN, '$saldo_prima', '$fec_uso_reciente')");

if (mysqli_query($link, $sqlTitular)){
    echo "<div class='correcto'>";
    echo "Titular agregado satisfactoriamente!";
    echo '<p><a href="personas.php">Volver</a></p>';
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlTitular."<br>".mysqli_error($link);
    echo "<br>.<br>";
    echo '<p><a href="personas.php">Volver</a></p>';
}

$id_agente = 48;

 $sqlCInmueble = ("INSERT INTO `contrata_inmueble` (`id_inmueble`, `id_cliente`, `id_agente`,`fecha_contrato`, `estado_contrato`, `monto_comision_Ag`) VALUES ($id_inmuebleN2, $id_clienteN2,$id_agente, '$fec_contrato', '$estado_contrato', '$monto_comision_Ag')");

 if (mysqli_query($link, $sqlCInmueble)){
     echo "<div class='correcto'>";
     echo "Contrata inmueble agregado satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlCInmueble."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }

 $id_financiadora= 3;

 $sqlPrestatario = ("INSERT INTO `prestario` (`id_prestamo`, `id_cliente`, `id_financiadora`,`Tipo_interes`) VALUES ($id_prestamoN, $id_clienteN, $id_financiadora, '$TInteres')");

 if (mysqli_query($link, $sqlPrestatario)){
     echo "<div class='correcto'>";
     echo "Prestatario agregado satisfactoriamente!";
     echo '<p><a href="personas.php">Volver</a></p>';
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlPrestatario."<br>".mysqli_error($link);
     echo "<br>.<br>";
     echo '<p><a href="personas.php">Volver</a></p>';
 }

?>