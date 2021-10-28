<?php
include('../conexion/conexion.php');
$con=conectar();

$query = " SELECT DISTINCT c.nombre_cliente, c.codigo_cliente
FROM clientes c, detalle_factura d, factura f, productos p, venta v
WHERE c.codigo_cliente = d.codigo_cliente
AND d.codigo_factura = f.codigo_factura 
AND f.codigo_factura = v.codigo_factura
AND p.codigo_producto = v.codigo_producto  ";
$result=mysqli_query($con,$query);


//header("Location:../controladores/controlador.php?task=menu")  ;

?>