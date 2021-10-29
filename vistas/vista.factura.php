<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     
 
</head>
<body>
<?php  require 'header.menu.php'; require '../public/librerias/phpqrcode/qrlib.php';  ?>
    
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5"> 
                    <div class="d-flex justify-content-center"> 
                        <?php  echo '<h2>Factura No.'.$mostrar_factura['codigo_factura'].' </h2>';   
                        $contenido .= "  Con No de factura: ".$mostrar_factura['codigo_factura'];     ?>
                        
                    </div> 
                    <table class="table"> 
                            <?php 
                                echo '<tr>';
                                echo '<th><h3>Cliente</h3></th>';
                                echo '<th><h3>'.$mostrar_encabezado['nombre_cliente'].'</h3></th>';  
                                $contenido .= "  Para el cliente: ".$mostrar_encabezado['nombre_cliente'];  
                                echo '<th><h3>Fecha</h3></th>';
                                echo '<th><h3>'.$mostrar_encabezado['fecha'].'</h3></th>'; 
                                echo '</tr>';  
                                $contenido .= "  En fecha: ".$mostrar_encabezado['fecha'];
                            ?>
                    </table>

                        <table class="table">
                            <tr>   
                                <th>    CANTIDAD    </th> 
                                <th>    PRODUCTO    </th>
                                <th>    PRECIO      </th>
                                <th>    SUB-TOTAL   </th>  
                            </tr>
                            <?php 
                                $contenido .= "  Por la compra de: ";
                                while($mostrar=mysqli_fetch_array($result_datos)){
                                    echo '<tr>';  
                                    echo '<th>'.$mostrar['cantidad_venta'].'</th>'; 
                                    echo '<th>'.$mostrar['nombre_producto'].'</th>'; 
                                    echo '<th>'.'Q.'.$mostrar['precio'].'</th>'; 
                                    echo '<th>'.'Q.'.$mostrar['precio']*$mostrar['cantidad_venta'].'</th>';  
                                    echo '</tr>'; 
                                    $contenido .= "  ".$mostrar['precio'];
                                    $contenido .= "  ".$mostrar['nombre_producto'];
                                } 
                                echo '<tr>';  
                                echo '<th> Total </th>'; 
                                echo '<th> </th>'; 
                                echo '<th> </th>';  
                                echo '<th>'.'Q.'.$mostrar_total['total'].'</th>';  
                                echo '</tr>'; 
                                $dato 	= 	time();
                                QRcode::png($contenido,"../public/img/qr_".$dato.".png",'L',7,2); 
                                
                            ?>
                        </table> 
                        
                        <?php echo "<img src='../public/img/qr_".$dato.".png' />"; ?> 
                        <p>Codigo QR para promociones.</p><br><br>
                    </div>
                </div>
            </div>  
        </header> 
    <!-- Footer-->

</body>
<?php require 'footer.php'; ?>
</html>