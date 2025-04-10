<?php
    session_start();
    //$_SESSION = array();
    if(!isset($_SESSION['usuario'])){
        header('Location: inicio_sesion_vista.php');
    }else{
        session_destroy();
        unset($_SESSION['usuario']);
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE-11">
        <meta http-equiv="refresh" content="1"; url="inicio_sesion_vista.php" />
        
        <title>Cierre de Sesión</title>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/cierre_sesion.css">
        <link rel="stylesheet" href="../web-fonts-with-css/css/fontawesome-all.css">
        
    </head>
    
    <body>
        <div class="contenedor">
           <div class="contenido">
               <p>Cerrando Sesión ...</p>
               <div class="circulo">
                   <i class="fas fa-sign-out-alt"></i>
               </div>
           </div>
        </div>
    </body>
    
</html>