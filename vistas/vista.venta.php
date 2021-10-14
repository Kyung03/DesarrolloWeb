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
                             <table id="demo" class="table">
                                 <tr>
                                     <th>Producto</th>
                                     <th>Precio</th>
                                     <th>Cantidad</th>
                                 </tr>
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
<script>
        $(document).ready(function(){
            $("#button").click(function(){
                //var name=$("#name").val(); 
                for(var i=0; i<lista.length; i++){
                // Tu fecha
                var can=document.getElementById("cantidad"+lista[i]).value; 
                //Lo agregas al array.
                lista_cantidad.push(can);
                } 
                var clienteid=$("#clienteid").val();
                var mpago=$("#mpago").val();
                $.ajax({
                    url:'../modelo/modelo.insertar.venta.php',
                    method:'POST',
                    data:{
                        'lista': JSON.stringify(lista),
                        'lista_precios': JSON.stringify(lista_precios),
                        'lista_cantidad': JSON.stringify(lista_cantidad),
                        clienteid:clienteid,
                        mpago:mpago
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

<script>
    var lista = [];
    var lista_precios = [];
    var lista_cantidad = [];
    function insertar_producto() {
        
        var cod         =   document.getElementById("producto").value;
        var tr          =   document.createElement('tr');
        var producto    =   document.getElementById("nomb"+cod).value;
        var precio      =   document.getElementById("precio"+cod).value;
        var input       =   document.createElement("input");
        input.value="";
        input.setAttribute("id","cantidad"+cod);  
        var options =   '<td>    ';
        lista.push(cod);
        lista_precios.push(precio);
        //alert(precio);
        /*      input del codigo                */
        options += '<input name = "'    +cod+   '" type = "text" value          = "'    +producto+           '" disabled >'+' </td>';
        /*      input del precio                */
        options += '<input name = "'    +cod+   '" type = "text" value          = "'    +precio+        '" disabled >'+' </td>';
        /*      input de la cantidad            */
        options += ' </td>';

		tr.innerHTML = options;
        
        document.getElementById("demo").appendChild(tr);
        document.getElementById("demo").appendChild(input);
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
/*------------------------------------------------------------------------------------------------------------*/
    function datos_clientes() {
        var cod         =   document.getElementById("cliente").value; 
        document.getElementById("clienteid").value    =   cod;
        document.getElementById("nombreC").value      =   document.getElementById("nombre"+cod).value;
        document.getElementById("telefonoC").value    =   document.getElementById("telefono"+cod).value;
        document.getElementById("direccionC").value   =   document.getElementById("direccion"+cod).value;
        document.getElementById("correoC").value      =   document.getElementById("correo"+cod).value;
    }

    function showUser(str) {
     
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
        return this.responseText;
        }
    }
    xmlhttp.open("GET","../modelo/modelo.php?q="+str,true);
    xmlhttp.send();
    }

     function buscar(numero_empleado) { 
    var xhttp = new XMLHttpRequest();               
    var numero = "numero="+numero_empleado;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("nombreE").value = this.responseText;
        }       
    };
    xhttp.open("POST", "../modelo/modelo.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    xhttp.send(numero);
    }

     var ruits = [];
     
     $("[name='producto'] option").each(function() {
        ruits.push($(this).val());
    }); 
     

    //console.log(data);
     //var ruits = ["Banana", "Orange", "Apple", "Mango"]; nombre_producto

function AddItem() {
	var tbody = null;
	var tabla = document.getElementById("tabla");
	var nodes = tabla.childNodes;
	for (var x = 0; x<nodes.length;x++) {
		if (nodes[x].nodeName == 'TBODY') {
			tbody = nodes[x];
			break;
		}
	}
	if (tbody != null) {
        
		var tr = document.createElement('tr');
        var options = '<td>    <select>';
        ruits.forEach(function(item,index) {
                     options += '<option>' + item + '</option>';
                });
        options += '</select>   </td>';
		tr.innerHTML = options;
		tbody.appendChild(tr);
	}
}

function deleteRow(btn){
      var d = row.parentNode.parentNode.rowIndex;
      document.getElementById('tabla').deleteRow(d);
   }


</script>