<?php
include('../conexion/conexion.php');
$con=conectar();

$query = " select   * from productos";
$result=mysqli_query($con,$query);


//header("Location:../controladores/controlador.php?task=menu")  ;

?>