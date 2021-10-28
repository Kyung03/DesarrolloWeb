<?php
include('../conexion/conexion.php');
$con=conectar();
$codigo = $_POST['codigo'];
$anterior = '';
$anterior_t = '';

$query = " SELECT d.codigo_cliente, c.nombre_cliente, d.codigo_factura, d.fecha, f.total,
p.nombre_producto, v.cantidad_venta
FROM clientes c, detalle_factura d, factura f, productos p, venta v
WHERE c.codigo_cliente = d.codigo_cliente
AND d.codigo_factura = f.codigo_factura 
AND f.codigo_factura = v.codigo_factura
AND p.codigo_producto = v.codigo_producto
and d.codigo_cliente = $codigo 
ORDER BY `d`.`codigo_factura` ASC ";
$result = mysqli_query($con,$query);  
//echo $query;
?>