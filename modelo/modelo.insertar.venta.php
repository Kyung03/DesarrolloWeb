<?php 
include('../conexion/conexion.php');
session_start();
$con=conectar();
$data = json_decode($_POST['lista']);
$data2 = json_decode($_POST['lista_precios']);
$data3 = json_decode($_POST['lista_cantidad']);
$clienteid = json_decode($_POST['clienteid']);
$mpago = json_decode($_POST['mpago']);
$codigo = $_SESSION['idcaja'];
$total = 0;
$empleado = $_SESSION['idusuario'];
$verificacion = true;
//echo $clienteid;
//echo $mpago;
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
    //echo $total;
  } 
/* VERIFICAR CANTIDAD */
for($x = 0; $x < count($data); $x++){
    $query_verificar = " SELECT cantidad FROM productos WHERE codigo_producto = $data[$x]";
    $result_verificar=mysqli_query($con,$query_verificar);
    $mostrar_verificar=mysqli_fetch_array($result_verificar);
    //echo $query_verificar;
    //echo $mostrar_verificar['cantidad_producto'];
    //echo $mostrar_verificar['cantidad'];
    //echo $data3[$x];
    if($mostrar_verificar['cantidad'] < $data3[$x]){
        $verificacion = false;

    }
    //mysqli_query($con, $sql);
}
if($verificacion == false){ 
    echo "menu";
}else{
	/* SE CREA LA FACTURA */
	$query_factura = "INSERT INTO `factura`( `total`, `codigo_empleado`, `codigo_cobro` ) 
	VALUES ($total, $empleado, $mpago )";
    echo $query_factura;
	mysqli_query($con, $query_factura); 
    $last_id = $con->insert_id;
    /* INSERTAR EN detalle caja */
    $query_movimiento = "INSERT INTO `detalle_caja`( `tipo_movimiento`, `valor_movimiento`, `fecha_movimiento`, `codigo_caja`, `codigo_factura` ) 
	VALUES ('VENTA',$total, sysdate(), $codigo, $last_id )";
    //echo $query_movimiento;
	mysqli_query($con, $query_movimiento); 
    /* INSERTAR EN total factura */
    $query_tfactura = "UPDATE `caja` 
    set  total_factura = (select sum(`valor_movimiento`) from caja c, detalle_caja d where c.`codigo_caja` = d.`codigo_caja` and d.`codigo_caja` = $codigo )
    WHERE  codigo_caja =  $codigo";
    $result_tfactura=mysqli_query($con,$query_tfactura);
    /* INSERTAR EN VENTAS */
    for($x = 0; $x < count($data); $x++){
        $sql = "INSERT INTO `venta`( `codigo_factura`, `codigo_producto`,`cantidad_venta`) 
        VALUES ($last_id,$data[$x],$data3[$x])";
        //echo $sql;
        mysqli_query($con, $sql);
    }
    /*  INSERTAR EN DETALLE FACTURA    */
    $query_detalle = "INSERT INTO `detalle_factura`( `fecha`, `codigo_factura`, `codigo_cliente` ) 
	VALUES (sysdate(), $last_id, $clienteid )";
    //echo $query_detalle;
	mysqli_query($con, $query_detalle); 

	mysqli_close($con);
    echo "factura";  
}
    //echo "<script>window.loctaion.href = tupagina</script>"; 

?> 