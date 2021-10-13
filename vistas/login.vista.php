

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inicio de sesion</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../public/css/styles.css" rel="stylesheet" />
    </head>
    <body> 
        <!-- Header-->
        <!-- Responsive navbar-->
        <?php  require 'header.php'; ?>
        <!-- Page Content-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                            <center> 
                            <h2 class=" alert-danger"><?php echo $mensaje; ?> </h2>
                            <form action="controlador.php?task=ingreso" method="POST">
                            <h1 class="display-5 fw-bold">Inicio sesión </h1>
                            <label for="usuario">Usuario:</label>
                            <input type="text" id="usuario" name="usuario" value="">
                            <br><br>
                            <label for="contrasena">Contrasena:</label>
                            <input type="password" id="contrasena" name="contrasena" value="">
                            <br><br>
                            </center>
                            <button class="btn btn-primary btn-lg" type="submit" >Ingresar</button>
                            <br><br>
                            <!--<font size=3 face="Georgia">Nuevo por aqui? </font>
                            <a href="registro.php"><font size=3 face="Georgia">Registrarse</font></a> -->
                            </form>  
                    </div>
                </div>
            </div>
        </header>
        <!-- footer-->
        <footer class="py-5 bg-dark" padding-bottom: 3rem !important>
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        </form>
    </body>
</html>
