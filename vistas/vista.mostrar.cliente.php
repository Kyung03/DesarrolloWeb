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
                                <th>CODIGO</th>
                                <th>CLIENTE</th>
                                <th>FACTURA</th>
                                <th>FECHA</th>
                                <th>TOTAL</th> 
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th> 
                            </tr>
                            <?php 
                                while($mostrar=mysqli_fetch_array($result)){
                                    echo '<tr>';
                                    
                                    ///if($anterior != $mostrar['codigo_factura']){ echo '<th>'.$mostrar['codigo_factura'].'</th>';  }
                                    //else{ echo '<th> </th>';  } 
                                    echo '<th>'.$mostrar['codigo_cliente'].'</th>'; 
                                    echo '<th>'.$mostrar['nombre_cliente'].'</th>'; 
                                    echo '<th>'.$mostrar['codigo_factura'].'</th>'; 
                                    echo '<th>'.$mostrar['fecha'].'</th>';  
                                    echo '<th>'.$mostrar['total'].'</th>'; 
                                    echo '<th>'.$mostrar['nombre_producto'].'</th>'; 
                                    echo '<th>'.$mostrar['cantidad_venta'].'</th>'; 
                                    echo '</tr>';
                                    //$anterior = $mostrar['codigo_factura']; 
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