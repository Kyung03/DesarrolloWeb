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
                    <div>
                         <h2>Ingresar la factura.</h2>
                         <form action="controlador.php?task=listar_venta" method="POST">
                         <select name="factura" id="factura" > 
                        <?php   
                        while($mostrar=mysqli_fetch_array($result)){
                            echo '<option value="'.$mostrar['codigo_factura'].'">'.$mostrar['codigo_factura'].'</option>';
                            //echo '<input type="hidden" id="precio" value="'.$mostrar['precio'].'">';
                        }?>
                        </select>  
                        <input type="submit" value="Buscar">
                        </form>
                         </div>
                    </div>
                </div>
            </div>
        </header>
    <!-- Footer-->
<?php require 'footer.php'; ?>
</body>
</html>

<script>
    function datos_clientes() {
        var cod         =   document.getElementById("cliente").value; 
        document.getElementById("clienteid").value    =   cod;
        document.getElementById("nombreC").value      =   document.getElementById("nombre"+cod).value;
        document.getElementById("telefonoC").value    =   document.getElementById("telefono"+cod).value; 
    }
</script>