<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso producto</title>
     
</head>
<body>
<?php  require 'header.menu.php'; ?>
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                    <form action="controlador.php?task=insertar_producto_modelo" method="POST">
                        <h2>Ingresar datos del producto</h2>
                        <table class="table">
                            <tr>
                                <th><input name = "nombre"   type = "text" placeholder = "Nombre"    required ></th>
                                <th><input name = "precio"   type = "text" placeholder = "Precio"    required ></th>
                                <th><input name = "cantidad" type = "text" placeholder = "Cantidad"  required > </th>
                                <th>
                                    <select name="tipo" id="tipo">
                                        <option value="Pastas">Pastas</option>
                                        <option value="Carnicos">Carnicos</option>
                                        <option value="Embutidos">Embutidos</option>
                                        <option value="Lacteos">Lacteos</option>
                                        <option value="Golosinas">Golosinas</option>
                                        <option value="Gaseosas">Gaseosas</option> 
                                        <option value="Carbonatados">Carbonatados</option>
                                    </select> 
                                </th>
                                <th>
                                    <select name="proveedor" id="proveedor" > 
                                    <?php   
                                    while($mostrar=mysqli_fetch_array($result)){
                                        echo '<option value="'.$mostrar['codigo_proveedor'].'">'.$mostrar['nombre_proveedor'].'</option>'; 
                                    }?>
                                    </select>  
                                </th>
                            </tr>
                        </table> 
                    <br>
                    <input type="submit" value="Ingresar" class="btn btn-primary" >
                    </form>
                    </div>
                </div>
            </div>
        </header>
<?php require 'footer.php'; ?>
</body>
</html>