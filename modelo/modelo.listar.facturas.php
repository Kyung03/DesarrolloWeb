<?php
include('../conexion/conexion.php');
$con=conectar();

$query = " SELECT DISTINCT f.`codigo_factura` FROM `factura` f, venta v, detalle_factura d WHERE f.`codigo_factura` = v.`codigo_factura` and f.`codigo_factura` = d.`codigo_factura`  ";
$result=mysqli_query($con,$query);
  
?>