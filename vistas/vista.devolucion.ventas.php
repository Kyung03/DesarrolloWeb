<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     
 
</head>
<body onload="botonOFF()">
<?php  require 'header.menu.php'; ?>
    
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                    <div>
                         <h2>Factura.</h2> 
                         <select name="producto" id="producto"  onchange="insertar_producto()" > 
                         <option value="0">Seleccione</option>
                        <?php   
                        while($mostrar=mysqli_fetch_array($result_producto2)){
                            echo '<option value="'.$mostrar['codigo_producto'].'">'.$mostrar['nombre_producto'].'</option>'; 
                        }?>
                        </select>
                        <?php   
                        while($mostrar2=mysqli_fetch_array($result_producto3)){
                            //echo '<option value="'.$mostrar['codigo_producto'].'">'.$mostrar['nombre_producto'].'</option>';
                            echo '<input type="hidden"  id="nomb'.$mostrar2['codigo_producto'].'" value="'.$mostrar2['nombre_producto'].'">';
                            echo '<input type="hidden"  id="precio'.$mostrar2['codigo_producto'].'" value="'.$mostrar2['precio'].'">';
                            echo '<input type="hidden"  id="cant'.$mostrar2['codigo_producto'].'" value="'.$mostrar2['cantidad_venta'].'">';
                        } ?>
                        <input type="hidden" value="<?php echo $factura;  ?>" id="idf">
                        <div >
                             <table id="demo" class="table">
                                 <tr>
                                     <th>Producto</th>
                                     <th>Precio</th>
                                     <th>Cantidad</th>
                                 </tr>
                             </table>
                         </div>  
                         <?php if(isset($_SESSION['idcaja']) ){      ?>
                             
                             <button type="submit" id="button" class="btn btn-success" >Realizar Devolucion</button>
                          <?php  }else{    ?>
                             <label for="">Debe abrir la caja para realizar ventas</label><br>
                             <button type="submit" id="button" class="btn btn-success" disabled>Realizar Devolucion</button>
                          <?php   }   ?>
                         </div>
                    </div>
                </div>
            </div>
        </header>
    <!-- Footer-->
<?php require 'footer.php'; ?>
<script src="../public/js/devolucion.js"></script> 
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../public/js/btn.js"></script> 