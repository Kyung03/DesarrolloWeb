<?php
include('../conexion/conexion.php');
session_start();
$con=conectar();
$data = json_decode($_POST['lista']);
$data2 = json_decode($_POST['lista_precios']);
$data3 = json_decode($_POST['lista_cantidad']);

foreach ($data as $val) {
    echo $val;
}
foreach ($data2 as $val2) { 
    echo $val2;
}
foreach ($data3 as $val3) {
    echo $val3;
}
?>