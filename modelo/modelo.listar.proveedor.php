<?php
include('../conexion/conexion.php');
$con=conectar();

$query = " select   nombre_proveedor, telefono_proveedor, direccion_proveedor, correo_proveedor from proveedores";
$result=mysqli_query($con,$query);


//header("Location:../controladores/controlador.php?task=menu")  ;

?>