<?php
$var;
if(isset($_GET["task"])){
    $var = $_GET["task"];
}


switch($var){

    
    case 'login':
        //require_once('index.php');
        $mensaje="";
        include_once('../vistas/login.vista.php');
    break;

    case 'menu':
        include_once('../vistas/vista.menu.php');
    break;

    case 'ingreso': 
        //echo "aaaaa";
        if(isset($_POST["usuario"]) && isset($_POST["contrasena"]) ){
        $usuario=$_POST["usuario"];
        $contrasena=$_POST["contrasena"]; 
        //echo $usuario;
        //echo $contrasena;
        require_once('../modelo/modelo.inicio.php');
        }
    break;

    case 'insertar_usuario_vista':
        include_once('../vistas/insertar.usuario.vista.php');
        
        break;

    case 'insertar_usuario_modelo':
        if(isset($_POST["nombreCliente"])){
            $nombre     =   $_POST["nombreCliente"];
            $telefono   =   $_POST["nombreTelefono"];
            $direccion  =   $_POST["nombreDireccion"];
            $correo     =   $_POST["nombreCorreo"];
            require_once('../modelo/modelo.insertar.usuario.php');
            echo '<script type="text/javascript">
            alert("Cliente ingresado.");");
            </script>';
        }
        
        break;

        case 'usuario':
            require_once('../modelo/modelo.listar.usuario.php');
            //$dato = $aaa;
            include_once('../vistas/vista.reporte.clientes.php');
        break;

        case 'insertar_proveedor_vista':
            include_once('../vistas/vista.insertar.proveedor.php');
            
        break;

        case 'insertar_proveedor_modelo':

            if(isset($_POST["nombreProveedor"])){
                $nombre     =   $_POST["nombreProveedor"];
                $telefono   =   $_POST["telefonoProveedor"];
                $direccion  =   $_POST["direccionProveedor"];
                $correo     =   $_POST["correoProveedor"];
                require_once('../modelo/modelo.insertar.proveedor.php');
                echo '<script type="text/javascript">
                alert("Cliente ingresado.");");
                </script>';
            }
        break;

        case 'proveedor':
            require_once('../modelo/modelo.listar.proveedor.php');
            //$dato = $aaa;
            include_once('../vistas/vista.reporte.proveedor.php');
        break;

        case 'insertar_producto_vista':
            require_once('../modelo/modelo.listar.proveedor.php');
            include_once('../vistas/vista.insertar.producto.php');
            
        break;

        case 'insertar_producto_modelo':

            if(isset($_POST["nombre"])){
                $nombre     =   $_POST["nombre"];
                $precio     =   $_POST["precio"];
                $cantidad   =   $_POST["cantidad"]; 
                $tipo       =   $_POST["tipo"]; 
                $proveedor  =   $_POST["proveedor"]; 
                require_once('../modelo/modelo.insertar.producto.php');
                echo '<script type="text/javascript">
                alert("Producto ingresado.");");
                </script>';
            }
        break;

        case 'producto':
            require_once('../modelo/modelo.listar.producto.php');
            //$dato = $aaa;
            include_once('../vistas/vista.reporte.producto.php');
        break;

        case 'venta':
            require_once('../modelo/modelo.listar.producto.php');  
            include_once('../vistas/vista.venta.php'); 
        break; 

        case 'factura':
            require_once('../modelo/modelo.factura.php');  
            include_once('../vistas/vista.factura.php');  
        break;  

        case 'caja_abierta':
            require_once('../modelo/modelo.abrir.caja.php');
        break;

        case 'caja_cerrada':
            require_once('../modelo/modelo.cerrar.caja.php');
        break;

        case 'devolucion':
            require_once('../modelo/modelo.listar.facturas.php'); 
            //$dato = $aaa;
            include_once('../vistas/vista.devolucion.php');
        break;

        case 'listar_venta':
            require_once('../modelo/modelo.listar.ventas.php'); 
            //$dato = $aaa;
            include_once('../vistas/vista.devolucion.ventas.php');
        break;

        case 'cierre_del_dia':
            require_once('../modelo/modelo.reporte.cierre.php');
            //$dato = $aaa;
            include_once('../vistas/vista.reporte.cierre.php');
        break;

        case 'mostrar_cierre':
            require_once('../modelo/modelo.mostrar.cierre.php'); 
            //$dato = $aaa;
            include_once('../vistas/vista.mostrar.cierre.php');
        break;

        case 'reporte_devolucion_fecha':
            require_once('../modelo/modelo.reporte.devolucion.php');
            //$dato = $aaa;
            include_once('../vistas/vista.reporte.devolucion.php');
        break;

        case 'reporte_devolucion':
            require_once('../modelo/modelo.mostrar.devolucion.php'); 
            //$dato = $aaa;
            include_once('../vistas/vista.mostrar.devolucion.php');
        break;

        case 'reporte_elegir_cliente':
            require_once('../modelo/modelo.reporte.cliente.php');
            //$dato = $aaa;
            include_once('../vistas/vista.reporte.cliente.php');
        break;

        case 'reporte_cliente':
            require_once('../modelo/modelo.mostrar.cliente.php'); 
            //$dato = $aaa;
            include_once('../vistas/vista.mostrar.cliente.php');
        break;

}
?>