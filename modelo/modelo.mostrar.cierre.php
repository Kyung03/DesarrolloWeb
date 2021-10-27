<?php
include('../conexion/conexion.php');
$con=conectar();
$fecha = $_POST['fecha'];
$anterior = '';
$anterior_t = '';

$query = " SELECT f.codigo_factura, c.nombre_cliente, f.total, d.fecha,  p.nombre_producto, p.precio, v.cantidad_venta
FROM factura f, detalle_factura d, venta v, clientes c, productos p
WHERE f.codigo_factura = d.codigo_factura 
AND f.codigo_factura = v.codigo_factura 
AND d.codigo_cliente = c.codigo_cliente
AND v.codigo_producto = p.codigo_producto 
AND d.fecha = '$fecha'  ORDER BY `f`.`codigo_factura` ASC";
$result = mysqli_query($con,$query);  
//echo $query;
?>