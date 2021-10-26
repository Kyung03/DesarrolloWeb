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
                         <h2>Factura.</h2> 
                         <select name="producto" id="producto"  onchange="insertar_producto()" > 
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
<script>
        $(document).ready(function(){
            $("#button").click(function(){
                //var name=$("#name").val(); 
                for(var i=0; i<lista.length; i++){
                // Tu fecha
                var can=document.getElementById(lista[i]).value; 
                //Lo agregas al array.
                lista_cantidad.push(can);
                } 
                var idf=$("#idf").val();
                //var mpago=$("#mpago").val();
                $.ajax({
                    url:'../modelo/modelo.insertar.devolucion.php',
                    method:'POST',
                    data:{
                        'lista': JSON.stringify(lista),
                        'lista_precios': JSON.stringify(lista_precios),
                        'lista_cantidad': JSON.stringify(lista_cantidad),
                        idf:idf
                        //mpago:mpago
                    },
                   success:function(data){
                       alert(data);
                   }
                });
            });
        });
    </script>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var lista = [];
    var lista_precios = [];
    var lista_cantidad = [];
    function insertar_producto() {
        
        var cod         =   document.getElementById("producto").value;
        var tr          =   document.createElement('tr');
        var producto    =   document.getElementById("nomb"+cod).value;
        var precio      =   document.getElementById("precio"+cod).value;
        var cantidad   =   document.getElementById("cant"+cod).value;
        var input       =   document.createElement("input");
        input.value="";
        input.setAttribute("id","cantidad"+cod);  
        var options =   '     ';
        lista.push(cod);
        lista_precios.push(precio);
        //alert(precio);
        /*      input del codigo                */
        options += '<th><input name = "'    +cod+   '" type = "text" value          = "'    +producto+           '" disabled >'+' </th>';
        /*      input del precio                */
        options += '<th><input name = "'    +cod+   '" type = "text" value          = "'    +precio+        '" disabled >'+' </th>';
        /*      input del cantidad                */
        options += '<th> <input id = "'    +cod+   '"   type="number" value          = "'    +cantidad+        '"   min="1" max="'+cantidad+'">'+'  </th>';
        options += '<td><input type="button" class="borrar" value="Eliminar" /></td>';
        /*      input de la cantidad            */
        options += '  ';

		tr.innerHTML = options;
        
        document.getElementById("demo").appendChild(tr);
        //document.getElementById("demo").appendChild(input);
        //var cantidad = getElementById(miid).value;
        //lista_cantidad.push(cantidad);alert(cantidad);
		//tbody.appendChild(tr); 
        //var input = document.createElement("input");
        //input.setAttribute("id","yourId");  
        //input.disabled;
        //input.value = document.getElementById("producto").value;
        //document.body.appendChild(btn);
       // document.getElementById("demo").appendChild(input);
    }

    function cantidad( id_input, operacion){
  var numero=$('#'+id_input).val();
  if(operacion=='1'){
    numero++;
  } else{
    numero--;
  }
  $('#'+id_input).val(numero);
}
/*-------------------------------------------------------------------------------------*/

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
/*-----------------------------------------------------------------------------------*/
</script>