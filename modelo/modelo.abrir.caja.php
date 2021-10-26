<?php
include('../conexion/conexion.php');
$con=conectar();
session_start();

$query_cierre = "SELECT max(`codigo_caja`) 
FROM `caja` ";
$result_cierre=mysqli_query($con,$query_cierre);
$mostrar=mysqli_fetch_array($result_cierre);
$caja_anterior = $mostrar['max(`codigo_caja`)'];

$query_total = "SELECT `total_cierre` FROM `caja` where `codigo_caja` = $caja_anterior";
$result_total=mysqli_query($con,$query_total);
$mostrar_total=mysqli_fetch_array($result_total);
$total = $mostrar_total['total_cierre'];

$query = "insert into `caja` (fecha_apertura,total_apertura,total_cierre,total_factura,total_movimientos,total_devoluciones )
values ( sysdate(), $total,0,0,0,0 )";
$result=mysqli_query($con,$query);

$last_id = $con->insert_id;

$_SESSION['idcaja']=$last_id;

$sql_datos=" SELECT total_apertura,fecha_apertura FROM `caja` where `codigo_caja` = $last_id";
$result_datos=mysqli_query($con,$sql_datos);
$mostrar_datos=mysqli_fetch_array($result_datos);

$_SESSION['total_apertura'] = $mostrar_datos['total_apertura'];
$_SESSION['fecha_apertura'] = $mostrar_datos['fecha_apertura'];

header("Location:../controladores/controlador.php?task=menu")  ;

?>