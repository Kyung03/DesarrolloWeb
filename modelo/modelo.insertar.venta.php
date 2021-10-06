<?php 
include('../conexion/conexion.php');
$con=conectar();
$data = json_decode($_POST['lista']);
foreach ($data as $val) {
    echo $val;
}
	/* SE CREA LA FACTURA */
	$query_factura = "INSERT INTO `factura`( `total`, `codigo_empleado`, `codigo_cobro` ) 
	VALUES (0, 1, 1 )";
    echo $query_factura;
	mysqli_query($con, $query_factura); 
    $last_id = $con->insert_id;
    /* INSERTAR EN VENTAS */
    foreach ($data as $val) {
        echo $val;
        $sql = "INSERT INTO `ventas`( `codigo_factura`, `codigo_producto` ) 
        VALUES ($last_id,$val )";
        echo $sql;
        mysqli_query($con, $sql);
    }
	 
	mysqli_close($con);
 
?>