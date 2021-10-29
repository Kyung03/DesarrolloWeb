var lista = [];
    var lista_precios = [];
    var lista_cantidad = [];
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
                   alert("Devolucion realizada.");
                   window.location.replace("../controladores/controlador.php?task=menu");
               }
            });
        });
    });
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