<?php
include('../conexion/conexion.php');
$con=conectar();

$query = " SELECT DISTINCT d.fecha 
FROM factura f, detalle_factura d, venta v, clientes c, productos p 
WHERE f.codigo_factura = d.codigo_factura 
AND f.codigo_factura = v.codigo_factura 
AND d.codigo_cliente = c.codigo_cliente 
AND v.codigo_producto = p.codigo_producto   ";
$result=mysqli_query($con,$query);


//header("Location:../controladores/controlador.php?task=menu")  ;

?>