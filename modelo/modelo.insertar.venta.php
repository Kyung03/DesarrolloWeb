<?php 
include('../conexion/conexion.php');
session_start();
$con=conectar();
$data = json_decode($_POST['lista']);
$data2 = json_decode($_POST['lista_precios']);
$data3 = json_decode($_POST['lista_cantidad']);
$clienteid = json_decode($_POST['clienteid']);
$mpago = json_decode($_POST['mpago']);
$total = 0;
$empleado = $_SESSION['idusuario'];
echo $clienteid;
echo $mpago;
//foreach ($data as $val) {
//    echo $val;
//}
//foreach ($data2 as $val2) {
//    $total =    intval($total) + intval($val2);
//    echo $total;
//}
//foreach ($data3 as $val3) {
    //echo $val3;
//} 
for ($x = 0; $x < count($data); $x++) {
    $total = intval($total) + intval($data2[$x])*intval($data3[$x]);
    echo $total;
  } 
	/* SE CREA LA FACTURA */
	$query_factura = "INSERT INTO `factura`( `total`, `codigo_empleado`, `codigo_cobro` ) 
	VALUES ($total, $empleado, $mpago )";
    echo $query_factura;
	mysqli_query($con, $query_factura); 
    $last_id = $con->insert_id;
    /* INSERTAR EN VENTAS */
    for($x = 0; $x < count($data); $x++){
        $sql = "INSERT INTO `ventas`( `codigo_factura`, `codigo_producto`,`cantidad_venta` ) 
        VALUES ($last_id,$data[$x],$data3[$x] )";
        echo $sql;
        mysqli_query($con, $sql);
    }
    /*  INSERTAR EN DETALLE FACTURA    */
    $query_detalle = "INSERT INTO `detalle_factura`( `fecha`, `codigo_factura`, `codigo_cliente` ) 
	VALUES (sysdate(), $last_id, $clienteid )";
    echo $query_detalle;
	mysqli_query($con, $query_detalle); 

	mysqli_close($con);
 
?>