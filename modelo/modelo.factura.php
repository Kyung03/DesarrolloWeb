<?php
include('../conexion/conexion.php');
$con=conectar();
$contenido = "La compra realizada ";
$query = " SELECT max(`codigo_factura`) FROM factura ";
$result=mysqli_query($con,$query);  
$num = rand(1,5);

while($mostrar_=mysqli_fetch_array($result)){
    $codigo = $mostrar_['max(`codigo_factura`)']; 
 }

 $query_datos = " SELECT d.codigo_cliente, c.nombre_cliente, d.codigo_factura, d.fecha, f.total,
 p.nombre_producto, v.cantidad_venta, p.precio
 FROM clientes c, detalle_factura d, factura f, productos p, venta v
 WHERE c.codigo_cliente = d.codigo_cliente
 AND d.codigo_factura = f.codigo_factura 
 AND f.codigo_factura = v.codigo_factura
 AND p.codigo_producto = v.codigo_producto
 and d.codigo_factura = $codigo 
 ORDER BY `d`.`codigo_factura` ASC "; 
 $result_datos = mysqli_query($con,$query_datos);  
 $result_encabezado = mysqli_query($con,$query_datos);  
 $mostrar_encabezado=mysqli_fetch_array($result_encabezado);
 $result_factura = mysqli_query($con,$query_datos);  
 $mostrar_factura=mysqli_fetch_array($result_factura); 
 $result_total = mysqli_query($con,$query_datos);  
 $mostrar_total=mysqli_fetch_array($result_total);

 $query_prom = " SELECT * FROM `promociones` WHERE `codigo_promocion` =  $num "; 
 $result_prom = mysqli_query($con,$query_prom);   
 $mostrar_prom=mysqli_fetch_array($result_prom);
?>