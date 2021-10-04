<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                    <div class="m-4 m-lg-5">
                        <h2>Ingresar datos para la venta</h2>
                         
                        <select name="producto[]" id="producto"> 
                        <?php   
                        while($mostrar=mysqli_fetch_array($result)){
                            echo '<option value="'.$mostrar['nombre_producto'].'">'.$mostrar['nombre_producto'].'</option>'; 
                        }?>
                        </select>
                        <table id="tabla">
                        <thead>
                            <tr>
                                <th>Select</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        <button type="button" onClick="AddItem();">Agregar Producto.</button>
                        <input type="button" value="Delete" onclick="deleteRow(this)"/></td>
                         

                        <form action="controlador.php?task=insertar_producto_modelo" method="POST"> 

                        <input name = "nombre"      type = "text" placeholder = "Nombre"    required >
                        <input name = "precio"      type = "text" placeholder = "Precio"    required >
                        <input name = "cantidad"    type = "text" placeholder = "Cantidad"  required > 
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

<script>
     

     var ruits = [];
     
     $("[name='producto[]'] option").each(function() {
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