<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../public/css/menu.headers.css" rel="stylesheet">
    <style>
      *{
    margin: 0;
    padding: 0;
  }
  header{
    font-family: Helvetica;
    width: 950px; 
  }
  ul{
    list-style: none;
  }
  #menu li>a{
    background-color: rgb(44, 88, 170);
    color: white;
    padding: 10px;
    display: block;
    text-decoration: none;
    min-width: 100px;
  }
  #menu li>a:hover{
    color: #000;
    background-color: #eaeaea;
  }
  #menu>li{
    float: left;
    text-align:center
  }
  #menu>li>ul{
    display: none;
  }
  #menu>li:hover>ul {
    display:block;
  }
    </style>
</head>
<body>
<header>
    <nav>
        <ul id="menu">
        <li><a href="../controladores/controlador.php?task=menu">Inicio</a></li>
          <li> 
            <a href="">Clientes</a>
            <ul>
              <li><a href="../controladores/controlador.php?task=insertar_usuario_vista">Insertar</a></li>
              <li><a href="../controladores/controlador.php?task=usuario">Mostrar</a></li>
            </ul>
          </li>
          <li>
            <a href="">Proveedores</a>
            <ul>
              <li><a href="../controladores/controlador.php?task=insertar_proveedor_vista">Insertar</a></li>
              <li><a href="../controladores/controlador.php?task=proveedor">Mostrar</a></li>
            </ul>
          </li>
          <li>
            <a href="">Productos</a>
            <ul>
              <li><a href="../controladores/controlador.php?task=insertar_producto_vista">Insertar</a></li>
              <li><a href="../controladores/controlador.php?task=producto">Mostrar</a></li>
            </ul>
          </li>
          
          <li><a href="../controladores/controlador.php?task=venta">Despacho</a></li>
          <li><a href="">Devoluciones</a></li>
          <li><a href="">Reportes</a>
            <ul>
              <li><a href="">Cierre del día</a></li>
              <li><a href="">Devoluciones</a></li>
              <li><a href="">Clientes</a></li>
              <li><a href="">Compras</a></li>
            </ul>  
            <li><a href="../modelo/cerrar_sesion.php">Cerrar sesion</a></li>
          </li>
        </ul>
      </nav>
</header>
</body>
</html>