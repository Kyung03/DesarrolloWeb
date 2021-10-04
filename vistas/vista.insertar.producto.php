<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso producto</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body>
<?php  require 'header.menu.php'; ?>
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                    <form action="controlador.php?task=insertar_producto_modelo" method="POST">
                        <h2>Ingresar datos del producto</h2>
                    <input name = "nombre"   type = "text" placeholder = "Nombre"    required >
                    <input name = "precio"  type = "text" placeholder = "Precio"  required >
                    <input name = "cantidad" type = "text" placeholder = "Cantidad" required > 
                    <br>
                    <input type="submit" value="Ingresar">
                    </form>
                    </div>
                </div>
            </div>
        </header>
<?php require 'footer.php'; ?>
</body>
</html>