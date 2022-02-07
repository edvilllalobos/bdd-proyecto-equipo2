<?php 

include("conectar.php");

$sqlPoliza = ("INSERT INTO `poliza` (`descrip_poliza`, `prima`) VALUES ('$des_poliza', '$prima')");

 if (mysqli_query($link, $sqlPoliza)){
     echo "<div class='correcto'>";
     echo "Poliza agregada satisfactoriamente!";
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlPoliza."<br>".mysqli_error($link);
     echo "<br>.<br>";
 }

 $nro_polizaN = mysqli_insert_id($link);

 $sqlCVehiculo = ("INSERT INTO `categoria_vehiculo` (`DescripCateg`) VALUES ('$desCategV')");

 if (mysqli_query($link, $sqlCVehiculo)){
     echo "<div class='correcto'>";
     echo "Poliza agregada satisfactoriamente!";
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlCVehiculo."<br>".mysqli_error($link);
     echo "<br>.<br>";
 }

 $idCategN = mysqli_insert_id($link);

 $sqlTCobertura = ("INSERT INTO `tipo_cobertura` (`DescripTipoCobertura`) VALUES ('$desTCober')");

 if (mysqli_query($link, $sqlTCobertura)){
    echo "<div class='correcto'>";
    echo "Tipo de cobertura agregado satisfactoriamente!";
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlTCobertura."<br>".mysqli_error($link);
    echo "<br>.<br>";
}

 $id_TCoberN = mysqli_insert_id($link);

 $sqlVehiculo = ("INSERT INTO `vehiculo` (`matricula`, `marca`, `modelo`, `annio`, `id_categoria`, `id_tipo_cobertura`) VALUES ('$matricula', '$marca', '$modelo', '$annio', $idCategN, $id_TCoberN)");

 if (mysqli_query($link, $sqlVehiculo)){
     echo "<div class='correcto'>";
     echo "Seguro de vehiculo agregado satisfactoriamente!";
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlVehiculo."<br>".mysqli_error($link);
     echo "<br>.<br>";
 }

$sqlPrestamo = ("INSERT INTO `prestamo`(`importe_prestamo`) VALUES ('$imp_prestamo')");

if (mysqli_query($link, $sqlPrestamo)){
    echo "<div class='correcto'>";
    echo "Prestamo agregado satisfactoriamente!";
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlPrestamo."<br>".mysqli_error($link);
    echo "<br>.<br>";
}

$id_prestamoN = mysqli_insert_id($link);

$sqlPago = ("INSERT INTO `pago`(`id_prestamo`, `fecha_pago`, `importe_pago`) VALUES ($id_prestamoN, '$fec_pago', '$imp_pago')");

if (mysqli_query($link, $sqlPago)){
    echo "<div class='correcto'>";
    echo "Pago agregado satisfactoriamente!";
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlPago."<br>".mysqli_error($link);
    echo "<br>.<br>";
}


$sql = ("INSERT INTO `persona` (`CI`, `NombPersona`, `NumTlfPersona`, `Tipo_persona`) VALUES ('$CI' , '$nom', '$NumTlf', '$TPer')");

if (mysqli_query($link, $sql)){
    echo "<div class='correcto'>";
    echo "Persona agregada satisfactoriamente!";
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sql."<br>".mysqli_error($link);
    echo "<br>.<br>";
}

$id_clienteN = mysqli_insert_id($link);
$idPersonaN = mysqli_insert_id($link);
$id_clienteN2 = mysqli_insert_id($link);

$sqlCliente = ("INSERT INTO `cliente` (`id_cliente`, `apellido_cliente`, `Direc_Cliente`, `calle`, `ciudad`, `genero`,`fecha_nac`,`profesion`) VALUES ($id_clienteN, '$ape', '$dir', '$calle', '$ciudad', '$gen', '$fnac', '$prof')");

if (mysqli_query($link, $sqlCliente)){
    echo "<div class='correcto'>";
    echo "Cliente agregado satisfactoriamente!";
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlCliente."<br>".mysqli_error($link);
    echo "<br>.<br>";
}

$sqlTitular = ("INSERT INTO `titular` (`id_cliente`, `nro_poliza`, `saldo_prima`, `fecha_uso_reciente`) VALUES ($id_clienteN, $nro_polizaN, '$saldo_prima', '$fec_uso_reciente')");

if (mysqli_query($link, $sqlTitular)){
    echo "<div class='correcto'>";
    echo "Titular agregado satisfactoriamente!";
} else {
    echo "<div class ='error'>";
    echo "Error: ".$sqlTitular."<br>".mysqli_error($link);
    echo "<br>.<br>";
}

$id_agente = 44;

 $sqlCVehiculo = ("INSERT INTO `contrata_vehiculo` (`id_cliente`, `id_agente`, `matricula`, `fecha_contrato`, `recargo`, `descuentos`, `estado_contrato`, `monto_comision_Ag`) VALUES ($id_clienteN2, $id_agente, '$matricula2', '$fec_contrato', '$recargo', '$descuentos', '$estado_contrato', '$monto_comision_Ag')");

 if (mysqli_query($link, $sqlCVehiculo)){
     echo "<div class='correcto'>";
     echo "Contrata vehiculo agregado satisfactoriamente!";
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlCVehiculo."<br>".mysqli_error($link);
     echo "<br>.<br>";
 }

 $id_financiadora=5;

 $sqlPrestatario = ("INSERT INTO `prestario` (`id_prestamo`, `id_cliente`, `id_financiadora`, `Tipo_interes`) VALUES ($id_prestamoN, $id_clienteN, $id_financiadora, '$TInteres')");

 if (mysqli_query($link, $sqlPrestatario)){
     echo "<div class='correcto'>";
     echo "Prestatario agregado satisfactoriamente!";
 } else {
     echo "<div class ='error'>";
     echo "Error: ".$sqlPrestatario."<br>".mysqli_error($link);
     echo "<br>.<br>";
 }

?>