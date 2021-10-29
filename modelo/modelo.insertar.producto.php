<?php
include('../conexion/conexion.php');
$con=conectar();

$query = "insert into productos 
(nombre_producto, precio, cantidad, estado_producto, Tipo, codigo_proveedor )
values ('$nombre', $precio, '$cantidad', 1, '$tipo', $proveedor )";
$result=mysqli_query($con,$query);

header("Location:../controladores/controlador.php?task=producto")  ;

?>