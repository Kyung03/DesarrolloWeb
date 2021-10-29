<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    
</head>
<body>
<?php  require 'header.menu.php'; ?>
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5" id="dv">
                        <h2>Seleccionar producto para la venta</h2>
                         
                        <select name="producto" id="producto" onchange="insertar_producto()" > 
                        <?php   
                        while($mostrar=mysqli_fetch_array($result)){
                            echo '<option value="'.$mostrar['codigo_producto'].'">'.$mostrar['nombre_producto'].'</option>';
                            //echo '<input type="hidden" id="precio" value="'.$mostrar['precio'].'">';
                        }?>
                        </select>
                        <?php   
                        while($mostrar2=mysqli_fetch_array($result2)){
                            //echo '<option value="'.$mostrar['codigo_producto'].'">'.$mostrar['nombre_producto'].'</option>';
                            echo '<input type="hidden"  id="nomb'.$mostrar2['codigo_producto'].'" value="'.$mostrar2['nombre_producto'].'">';
                            echo '<input type="hidden"  id="precio'.$mostrar2['codigo_producto'].'" value="'.$mostrar2['precio'].'">';
                        } 
                        ?>
                         <div >
                            <table class="table">
                                 <tr>
                                     <th>Producto</th>
                                     <th>Precio</th>
                                     <th>Cantidad</th>
                                 </tr>
                             </table>
                             <table id="demo" class="table"> 
                             </table>
                         </div> 
                         <div>
                         <h2>Ingresar el metodo de pago.</h2>
                         <select name="mpago" id="mpago" > 
                        <?php   
                        while($mostrar_pago=mysqli_fetch_array($result_pago)){
                            echo '<option value="'.$mostrar_pago['codigo_cobro'].'">'.$mostrar_pago['tipo_cobro'].'</option>';
                            //echo '<input type="hidden" id="precio" value="'.$mostrar['precio'].'">';
                        }?>
                        </select>
                         </div>
                         <div>
                         <h2>Ingresar cliente.</h2>
                         <select name="cliente" id="cliente" onchange="datos_clientes()" > 
                        <?php   
                        while($mostrar_cliente=mysqli_fetch_array($result_cliente)){
                            echo '<option value="'.$mostrar_cliente['codigo_cliente'].'">'.$mostrar_cliente['nombre_cliente'].'</option>';
                            //echo '<input type="hidden" id="precio" value="'.$mostrar['precio'].'">';
                        }?>
                        </select>
                        <table id="tcliente" class="table">
                            <tr>
                                <th>Cliente</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Correo</th>
                            </tr>
                            <tr>
                                <th><input type="text" id="nombreC" disabled></th>
                                <th><input type="text" id="telefonoC" disabled></th>
                                <th><input type="text" id="direccionC" disabled></th>
                                <th><input type="text" id="correoC" disabled></th>
                            </tr>
                        </table>
                        <input type="hidden" id="clienteid" disabled>
                        <?php   
                        while($mostrar_cliente2=mysqli_fetch_array($result_cliente2)){
                            //echo '<option value="'.$mostrar['codigo_producto'].'">'.$mostrar['nombre_producto'].'</option>';
                            echo '<input type="hidden"  id="nombre'.$mostrar_cliente2['codigo_cliente'].'" value="'.$mostrar_cliente2['nombre_cliente'].'">';
                            echo '<input type="hidden"  id="telefono'.$mostrar_cliente2['codigo_cliente'].'" value="'.$mostrar_cliente2['telefono_cliente'].'">';
                            echo '<input type="hidden"  id="direccion'.$mostrar_cliente2['codigo_cliente'].'" value="'.$mostrar_cliente2['direccion_cliente'].'">';
                            echo '<input type="hidden"  id="correo'.$mostrar_cliente2['codigo_cliente'].'" value="'.$mostrar_cliente2['correo_cliente'].'">';
                        } 
                        ?>
                         </div>
                         <br><br>
                         <?php if(isset($_SESSION['idcaja']) ){      ?>
                             
                            <button type="submit" id="button" class="btn btn-success" >Realizar venta</button>
                         <?php  }else{    ?>
                            <label for="">Debe abrir la caja para realizar ventas</label><br>
                            <button type="submit" id="button" class="btn btn-success" disabled>Realizar venta</button>
                         <?php   }   ?>
                    </div>
                </div>
            </div>
        </header>
<?php require 'footer.php'; ?> 
         
</body>
</html>
<script src="../public/js/venta.js"></script> 
