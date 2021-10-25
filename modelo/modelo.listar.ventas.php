<?php
include('../conexion/conexion.php');
$con=conectar();
$factura = $_POST['factura'];

$query_producto = "SELECT * FROM `factura` f, venta v, productos p, detalle_factura d 
WHERE v.`codigo_factura` = f.`codigo_factura` 
and v.`codigo_producto` = p.`codigo_producto` 
and d.`codigo_factura` = f.`codigo_factura` 
and f.`codigo_factura` = $factura ";
$result_producto = mysqli_query($con,$query_producto); 
$result_producto2 = mysqli_query($con,$query_producto); 
$result_producto3 = mysqli_query($con,$query_producto); 

?>