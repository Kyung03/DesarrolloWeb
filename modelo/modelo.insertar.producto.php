<?php
include('../conexion/conexion.php');
$con=conectar();

$query = "insert into productos 
(nombre_producto, precio, cantidad, estado_producto )
values ('$nombre', $precio, '$cantidad', 1 )";
$result=mysqli_query($con,$query);

header("Location:../controladores/controlador.php?task=producto")  ;

?>