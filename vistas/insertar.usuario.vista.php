<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<body>
<?php  require 'header.menu.php'; ?>
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                    <form action="controlador.php?task=insertar_usuario_modelo" method="POST">
                        <h2>Ingresar datos del cliente</h2>
                    <input name = "nombreCliente"   type = "text" placeholder = "Nombre"    required >
                    <input name = "nombreTelefono"  type = "text" placeholder = "Telefono"  required >
                    <input name = "nombreDireccion" type = "text" placeholder = "Direccion" required >
                    <input name = "nombreCorreo"    type = "text" placeholder = "Correo"    required >
                    <br>
                    <input type="submit" value="Siguiente">
                    </form>
                    </div>
                </div>
            </div>
        </header>
<?php require 'footer.php'; ?>
</body>
</html>