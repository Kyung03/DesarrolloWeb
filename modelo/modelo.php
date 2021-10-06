<?php 
include('../conexion/conexion.php');
$con=conectar();
$q = intval($_GET['q']);
$query = " select * from productos where codigo_producto = $q";
$result=mysqli_query($con,$query);
 
?>