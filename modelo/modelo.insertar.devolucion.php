<?php
include('../conexion/conexion.php');
session_start();
$con=conectar();
$lista_productos = json_decode($_POST['lista']);
$lista_precios = json_decode($_POST['lista_precios']);
$lista_cantidad = json_decode($_POST['lista_cantidad']);
$id = json_decode($_POST['idf']);
$total = 0;
$codigo = $_SESSION['idcaja'];
/*
echo $id;
foreach ($data as $val) {
    echo $val;
}
foreach ($data2 as $val2) { 
    echo $val2;
}
foreach ($data3 as $val3) {
    echo $val3;
}*/
for ($x = 0; $x < count($lista_productos); $x++) { 
    $sub = 0;
    $total = intval($total) + intval($lista_precios[$x])*intval($lista_cantidad[$x]);
    $sub = intval($sub) + intval($lista_precios[$x])*intval($lista_cantidad[$x]);
    //echo $total;

    /* SE CREA LA Devolucion */
    $query_factura = " INSERT INTO `devoluciones`(`codigo_factura`, `total`, codigo_producto, cantidad ) 
    VALUES ($id,$sub, $lista_productos[$x], $lista_cantidad[$x] ) ";
    //echo $query_factura;
    mysqli_query($con, $query_factura); 
    $last_id = $con->insert_id;

    /* INSERTAR EN detalle caja */
    $query_movimiento = "INSERT INTO `detalle_caja`( `tipo_movimiento`, `valor_movimiento`, `fecha_movimiento`, `codigo_caja`, `codigo_factura`, `codigo_devolucion` ) 
    VALUES ('DEVOLUCION',$total, sysdate(), $codigo, $id, $last_id )";
    //echo $query_movimiento;
	mysqli_query($con, $query_movimiento); 

    /* Actualizar EN caja */
    $query_tfactura = "UPDATE `caja` 
    set  total_devoluciones = (select sum(`valor_movimiento`) from caja c, detalle_caja d where c.`codigo_caja` = d.`codigo_caja` and d.`codigo_caja` = $codigo )
    WHERE  codigo_caja =  $codigo";
    $result_tfactura=mysqli_query($con,$query_tfactura);

    /* Actualizar EN VENTAS */ 
    $sql = "UPDATE `venta` SET cantidad_venta = cantidad_venta-$lista_cantidad[$x]
    WHERE codigo_producto = $lista_productos[$x]
    and codigo_factura = $id ";
    //echo $sql;
    mysqli_query($con, $sql); 
}
  
/*  Actualizar EN FACTURA    */
$query_detalle = " UPDATE `factura` SET total = total-$total
WHERE codigo_factura = $id ";
//echo $query_detalle;
mysqli_query($con, $query_detalle); 

mysqli_close($con);
?>