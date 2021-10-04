<?php
include('../conexion/conexion.php');
$con=conectar();

$query = "insert into proveedores 
(nombre_proveedor, telefono_proveedor, direccion_proveedor, correo_proveedor, estado_proveedor )
values ('$nombre', $telefono, '$direccion', '$correo', 1 )";
$result=mysqli_query($con,$query);

//header("Location:../controladores/controlador.php?task=menu")  ;

?>