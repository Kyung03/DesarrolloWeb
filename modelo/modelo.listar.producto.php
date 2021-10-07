<?php
include('../conexion/conexion.php');
$con=conectar();

$query = "SELECT * FROM productos";
$result=mysqli_query($con,$query);
$result2=mysqli_query($con,$query);

$query_pago = "SELECT * FROM `cobro`";
$result_pago=mysqli_query($con,$query_pago); 

$query_cliente = "SELECT * FROM `clientes` ";
$result_cliente=mysqli_query($con,$query_cliente); 
$result_cliente2=mysqli_query($con,$query_cliente); 

//header("Location:../controladores/controlador.php?task=menu")  ;

?>