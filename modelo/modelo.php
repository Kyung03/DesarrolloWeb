<?php 
include('../conexion/conexion.php');
$con=conectar();
//$q = intval($_GET['q']);
$data = json_decode($_POST['name']);
$query = " select precio from productos where codigo_producto = $data";
$result=mysqli_query($con,$query);
 echo $query;
?>