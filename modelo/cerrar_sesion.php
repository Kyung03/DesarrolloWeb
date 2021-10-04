 
 <?php
session_start();
//unset($_SESSION['idusuario']);
$_SESSION['idusuario'] = 0;
session_destroy();
header("location: ../index.php");
?>