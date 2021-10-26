<?php
session_start();
include('../conexion/conexion.php');
$con=conectar(); 
$codigo = $_SESSION['idcaja'];

$query = "UPDATE `caja` 
SET fecha_cierre = sysdate(),
total_cierre = (SELECT `total_apertura`+`total_factura`-`total_devoluciones` FROM `caja` WHERE `codigo_caja` = $codigo ),
total_movimientos = (SELECT count(*) FROM detalle_caja WHERE `codigo_caja` = $codigo  )
WHERE  codigo_caja =  $codigo";
echo $query;
$result=mysqli_query($con,$query);

$_SESSION['idcaja'] = null;
//session_destroy();
header("Location:../controladores/controlador.php?task=menu")  ;

?>