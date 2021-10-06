<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
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
                             
                        }?>
                        </select>
                        <?php
                        while($mostrar2=mysqli_fetch_array($result)){ 
                            echo '<input name="precio" value="'.$mostrar2['precio'].'" >'; 
                        }
                        ?>
                         <div id="demo">

                         </div> 
                        <button type="submit" id="button">SAVE</button> 
                    </div>
                </div>
            </div>
        </header>
<?php require 'footer.php'; ?>
<script>
        $(document).ready(function(){
            $("#button").click(function(){
                //var name=$("#name").val();
                //var email=$("#email").val();
                $.ajax({
                    url:'../modelo/modelo.insertar.venta.php',
                    method:'POST',
                    data:{
                        'lista': JSON.stringify(lista)
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
    function insertar_producto() {
        
        var cod     =   document.getElementById("producto").value;
        var tr      =   document.createElement('tr');
        var precio = "precio";
        var options =   '<td>    ';
        lista.push(cod);
        alert(lista);
        /*      input del codigo                */
        options += '<input name = "'    +cod+   '" type = "text" value          = "'    +cod+           '" disabled >'+' </td>';
        /*      input del precio                */
        options += '<input name = "'    +cod+   '" type = "text" value          = "'    +precio+        '" disabled >'+' </td>';
        /*      input de la cantidad            */
        options += '<input name = "'    +cod+   '" type = "text" Placeholder    = "'    +"Cantidad"+    '"          >'+' </td>';

		tr.innerHTML = options;
        document.getElementById("demo").appendChild(tr);
		//tbody.appendChild(tr); 
        //var input = document.createElement("input");
        //input.setAttribute("id","yourId");  
        //input.disabled;
        //input.value = document.getElementById("producto").value;
        //document.body.appendChild(btn);
       // document.getElementById("demo").appendChild(input);
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