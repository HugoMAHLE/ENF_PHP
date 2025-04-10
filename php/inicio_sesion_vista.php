<?php
    require ('inicio_sesion.php');
?>


<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=11">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <title>Login</title>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/inicio_sesion.css">
    </head>
    
    <body>
        <header>
            <div class="head">
              <img id="logo" src="../img/logo.png">
              <h1 id="lg">ENFERMERÍA</h1>
            </div>
        </header>
        
        <main>
            <div class="contenedor">
               <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <div class="formulario">
                        <div class="usrc">
                            <img src="../img/logo.png" id="usr">
                        </div>
                        
                        <h2>Inicio de Sesión</h2>

                        <div class="campos">
                            <p>Usuario</p>
                            <input class="inputs" type="text" placeholder="User_1234" name="usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>

                            <p>Contraseña</p>
                            <input class="inputs" type="password" placeholder="●●●●●●●●" name="pass" required>

                        </div>

                        <div class="btn">
                            <input id="boton" type="submit" name="entrar" value="Entrar">
                        </div>

                        <?php if(!empty($errores)): ?>
                            <div class="errores">
                                <ul>
                                    <?php echo $errores; ?>
                                </ul>
                            </div>
                        <?php endif; ?>  
                        
                    </div>
                </form>
            </div>
            
            <footer>
               <div class="abajo">
                   <img id="mahle" src="../img/mahle.png">
                   <p id="desarrollador"></p>
                    <img id="m2s" src="../img/M2SS.png">
               </div>
            </footer>
        </main>
    </body>
    
</html>