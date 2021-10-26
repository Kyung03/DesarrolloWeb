<?php
include('../conexion/conexion.php');
$con=conectar();

$query = "insert into clientes (nombre_cliente, telefono_cliente, direccion_cliente, correo_cliente, estado_cliente, fecha_creacion)
values ('$nombre', $telefono, '$direccion', '$correo', 1, sysdate())";
$result=mysqli_query($con,$query);

header("Location:../controladores/controlador.php?task=usuario")  ;

?>