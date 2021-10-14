<?php
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Menu</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        
    </head>
    <body>
        <!-- Responsive navbar-->
        
        <?php  //require 'header.menu.php'; 
        include_once('header.menu.php');?>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold"> <?php echo $_SESSION['nombre_de_usuario']; ?> </h1>
                        <?php
                        if(isset($_SESSION['idcaja']) ){ 
                        ?>
                        <form action="controlador.php?task=caja_cerrada" method="POST">  
                        <table>
                            <tr> 
                                <th>La caja se ha abierto con: Q. <?php  echo $_SESSION['total_apertura']; ?> </th>
                                
                            </tr>
                            <tr>
                                <th>En fehca: <?php  echo $_SESSION['fecha_apertura']; ?></th>
                            </tr>
                        </table>
                        <input type="submit" value="Cerrar Caja" class="btn btn-primary" >
                        </form>
                        <?php
                        }else{
                        ?>
                        <form action="../controladores/controlador.php?task=caja_abierta" method="POST"> 
                        <p class="fs-4">
                            Bootstrap utility classes are used to create this jumbotron since the old component has been removed from the framework. Why create custom CSS when you can use utilities?
                        </p>
                        <input type="submit" value="Abrir Caja" class="btn btn-primary" >
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        <section class="pt-4"> 
            
        </section>
        <!-- Footer-->
        <?php 
        //require 'footer.php'; 
        include_once('footer.php');?> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../public/js/scripts.js"></script>
    </body>
</html>
