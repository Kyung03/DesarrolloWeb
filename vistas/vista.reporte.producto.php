<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar productos</title>
     
 
</head>
<body>
<?php  require 'header.menu.php'; ?>
    
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1>Productos</h1>
                        <table class="table">
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th> 
                                <th>Tipo</th> 
                                <th>Proveedor</th>
                            </tr>
                            <?php 
                                while($mostrar=mysqli_fetch_array($result)){
                                    echo '<tr>';
                                    echo '<th>'.$mostrar['nombre_producto'].'</th>'; 
                                    echo '<th>'.$mostrar['precio'].'</th>'; 
                                    echo '<th>'.$mostrar['cantidad'].'</th>';  
                                    echo '<th>'.$mostrar['Tipo'].'</th>';  
                                    echo '<th>'.$mostrar['nombre_proveedor'].'</th>';  
                                    echo '</tr>';
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