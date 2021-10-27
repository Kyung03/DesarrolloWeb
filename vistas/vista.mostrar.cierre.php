<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     
 
</head>
<body>
<?php  require 'header.menu.php'; ?>
    
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <table class="table">
                            <tr>
                                <th>FACTURA</th>
                                <th>CLIENTE</th>
                                <th>PRODUCTO</th>
                                <th>PRECIO</th>
                                <th>CANTIDAD</th>
                                <th>FECHA</th>
                                <th>SUB TOTAL</th>
                                <th>TOTAL</th>
                            </tr>
                            <?php 
                                while($mostrar=mysqli_fetch_array($result)){
                                    echo '<tr>';
                                    
                                    if($anterior != $mostrar['codigo_factura']){ echo '<th>'.$mostrar['codigo_factura'].'</th>';  }
                                    else{ echo '<th> </th>';  }
                                    
                                    echo '<th>'.$mostrar['nombre_cliente'].'</th>'; 
                                    echo '<th>'.$mostrar['nombre_producto'].'</th>'; 
                                    echo '<th>'.$mostrar['precio'].'</th>'; 
                                    echo '<th>'.$mostrar['cantidad_venta'].'</th>'; 
                                    echo '<th>'.$mostrar['fecha'].'</th>';  
                                    echo '<th>'.$mostrar['precio']*$mostrar['cantidad_venta'].'</th>';  
                                    if($anterior_t != $mostrar['total'] || $anterior != $mostrar['codigo_factura'] )
                                    { echo '<th>'.$mostrar['total'].'</th>'; }
                                    else{ echo '<th> </th>'; } 
                                    echo '</tr>';
                                    $anterior = $mostrar['codigo_factura'];
                                    $anterior_t = $mostrar['total'];
                                } 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </header>
    <!-- Footer-->
<?php require 'footer.php'; ?>
</body>
</html>