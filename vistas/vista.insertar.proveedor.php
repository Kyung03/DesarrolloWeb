<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso proveedores</title>
     
</head>
<body>
<?php  require 'header.menu.php'; ?>
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                    <form action="controlador.php?task=insertar_proveedor_modelo" method="POST">
                        <h2>Ingresar datos del proveedor</h2>
                        <table class="table">
                            <tr>
                                <th><input name = "nombreProveedor"   type = "text" placeholder = "Nombre"    required ></th>
                                <th><input name = "telefonoProveedor"  type = "text" placeholder = "Telefono"  required ></th>
                                <th> <input name = "direccionProveedor" type = "text" placeholder = "Direccion" required ></th>
                                <th><input name = "correoProveedor"    type = "text" placeholder = "Correo"    required ></th>
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