<?php
include('../conexion/conexion.php');
$con=conectar();

$query = " SELECT DISTINCT dc.fecha_movimiento 
FROM detalle_caja dc, devoluciones d, productos p 
WHERE dc.codigo_devolucion = d.codigo_devolucion 
AND d.codigo_producto = p.codigo_producto  ";
$result=mysqli_query($con,$query);


//header("Location:../controladores/controlador.php?task=menu")  ;

?>