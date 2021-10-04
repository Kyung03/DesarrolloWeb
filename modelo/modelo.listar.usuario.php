<?php
include('../conexion/conexion.php');
$con=conectar();

$query = " select  nombre_cliente, telefono_cliente, direccion_cliente, correo_cliente from clientes";
$result=mysqli_query($con,$query);


//header("Location:../controladores/controlador.php?task=menu")  ;

?>