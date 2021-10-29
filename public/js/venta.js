var lista = [];
    var lista_precios = [];
    var lista_cantidad = [];

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
                       alert("Venta realizada");
                       window.location.replace("../controladores/controlador.php?task=factura");
                   }
                });
            });
        });

    function insertar_producto() {
        
        var cod         =   document.getElementById("producto").value;
        var tr          =   document.createElement('tr');
        var producto    =   document.getElementById("nomb"+cod).value;
        var precio      =   document.getElementById("precio"+cod).value;
        var input       =   document.createElement("input");
        input.value="";
        input.setAttribute("id","cantidad"+cod);  
        tr.setAttribute("id","pr");  
        var options =   ' ';
        lista.push(cod);
        lista_precios.push(precio);
        //alert(precio);
        /*      input del codigo                */
        options += '<th><input name = "'    +cod+   '" type = "text" value          = "'    +producto+           '" disabled >'+' </th>';
        /*      input del precio                */
        options += '<th><input name = "'    +cod+   '" type = "text" value          = "'    +precio+        '" disabled >'+' </th>';
        /*      input de la cantidad            */
        options += '<th><input id ="cantidad'+cod+'" name=cantidad"'    +cod+   '" type="number" min="1" value  = "1"  >'+' </th>';
        options += '<td><input type="button" class="borrar" value="Eliminar" /></td>';
        options += ' ';

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
/*------------------------------------------------------------------------------------------------------------*/
    function datos_clientes() {
        var cod         =   document.getElementById("cliente").value; 
        document.getElementById("clienteid").value    =   cod;
        document.getElementById("nombreC").value      =   document.getElementById("nombre"+cod).value;
        document.getElementById("telefonoC").value    =   document.getElementById("telefono"+cod).value;
        document.getElementById("direccionC").value   =   document.getElementById("direccion"+cod).value;
        document.getElementById("correoC").value      =   document.getElementById("correo"+cod).value;
    }
/*-------------------------------------------------------------------------------------*/

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
/*-----------------------------------------------------------------------------------*/
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

