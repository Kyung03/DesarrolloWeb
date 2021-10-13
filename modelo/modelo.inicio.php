<?php
session_start();
include('../conexion/conexion.php');
$con=conectar(); 
//function inicio_sesion(){
    if(!empty($usuario) && !empty($contrasena)){

        $sql=" CALL `proc_sesion`('$usuario','$contrasena') ";
        $result=mysqli_query($con,$sql);
        $mostrar=mysqli_fetch_array($result);
        if(isset($mostrar['contraseña_usuario']) ){
            if($contrasena==$mostrar['contraseña_usuario']){
    
                $_SESSION['idusuario']=$mostrar['codigo_empleado'];
                $_SESSION['nombre_de_usuario']=$mostrar['nombre_usuario'];
                $_SESSION['nombre_de_empleado']=$mostrar['nombre_empleado'];
                $_SESSION['rol']=$mostrar['rol_usuario']; 
                $cod = $mostrar['codigo_empleado'];
                $us = $mostrar['nombre_usuario'];
                $rol = $mostrar['rol_usuario'];
                //echo $_SESSION['idusuario'];
                //echo $_SESSION['nombre_de_usuario'];
                //mysqli_query($con,"CALL `procedimiento_accesos`('$cod','$us','$rol','Ingreso')");
                
                header("Location:../vistas/vista.menu.php")  ;
                }
        }else{
        //echo 'usuario o contrasena incorrecta'; 
        $mensaje="usuario o contrasena incorrecta";
        include_once('../vistas/login.vista.php');
        }
    }else{
        //echo'campo vacio';
        $mensaje="campo vacio";
        include_once('../vistas/login.vista.php');
    }
    
//}

?>