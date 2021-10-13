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
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Correo</th>
                            </tr>
                            <?php 
                                while($mostrar=mysqli_fetch_array($result)){
                                    echo '<tr>';
                                    echo '<th>'.$mostrar['nombre_proveedor'].'</th>'; 
                                    echo '<th>'.$mostrar['telefono_proveedor'].'</th>'; 
                                    echo '<th>'.$mostrar['direccion_proveedor'].'</th>'; 
                                    echo '<th>'.$mostrar['correo_proveedor'].'</th>'; 
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