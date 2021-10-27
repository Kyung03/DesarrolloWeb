<?php
include('../conexion/conexion.php');
$con=conectar();
$fecha = $_POST['fecha'];
$anterior = '';
$anterior_t = '';

$query = " SELECT  dc.fecha_movimiento , dc.codigo_factura, p.nombre_producto, p.precio, d.cantidad
FROM detalle_caja dc, devoluciones d, productos p 
WHERE dc.codigo_devolucion = d.codigo_devolucion 
AND d.cantidad != 0 
AND d.codigo_producto = p.codigo_producto  
AND dc.fecha_movimiento  = '$fecha'   
ORDER BY `d`.`codigo_factura` ASC";
$result = mysqli_query($con,$query);  
//echo $query;
?>