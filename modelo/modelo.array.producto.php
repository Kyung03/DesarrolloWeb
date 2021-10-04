<?php
 $usuario="root";
 $contraseña="";
 $servidor="localhost";
 $base_datos="las_casas_del_escuintleco_bd";
 $con=mysqli_connect($servidor,$usuario,$contraseña,$base_datos) ;
 
global $array;
$array = array(); 
$producto     =   $_POST["producto"]; 
array_push($array, $producto);
 
    foreach ($array as $valor) {
        echo $valor;
    }
    echo elemento();
    var_dump($array);
    $query2 = " select   * from productos where codigo_producto = $valor";
    $result2=mysqli_query($con,$query2);
    while($mostrar2=mysqli_fetch_array($result2)){
        echo $mostrar2['codigo_producto'];
        echo $mostrar2['nombre_producto']; 
    } 
function elemento(){
    echo '<h1> AAA </h1>';
}
?>