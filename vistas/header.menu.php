<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
 
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../controladores/controlador.php?task=menu">Inicio</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav"> 
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../controladores/controlador.php?task=insertar_usuario_vista">Insertar</a></li>
            <li><a href="../controladores/controlador.php?task=usuario">Mostrar</a></li> 
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Proveedores <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../controladores/controlador.php?task=insertar_proveedor_vista">Insertar</a></li>
            <li><a href="../controladores/controlador.php?task=proveedor">Mostrar</a></li> 
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../controladores/controlador.php?task=insertar_producto_vista">Insertar</a></li>
            <li><a href="../controladores/controlador.php?task=producto">Mostrar</a></li> 
          </ul>
        </li>
        <li><a href="../controladores/controlador.php?task=venta">Despacho</a></li>
        <li><a href="#">Devoluciones</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
            <li><a href="">Cierre del día</a></li>
            <li><a href="">Devoluciones</a></li>
            <li><a href="">Clientes</a></li>
            <li><a href="">Compras</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right"> 
        <li><a href="../modelo/cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesion</a></li>
      </ul>
    </div>
  </div>
</nav>  
</header>
</body>
</html>