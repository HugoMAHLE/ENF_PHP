<?php
    require ('sesion_u_admin.php');
    require ('crear_usuario.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=11">

        <title>Registrar Usuario</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/crear_usuario.css">
        <link rel="stylesheet" href="../web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/soporte2.css">
        
        <script src="../js/ui/jquery.js"></script>
    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="active">
                <div class="sidebar-header">
                    <h3>Menú</h3>
                </div>

                <ul class="list-unstyled components">
                    <p><b>Nombre de Usuario:</b><br><?php echo $nombre_usr; ?></p>
                    <li>
                        <a href="centro_act.php">Inicio</a>
                    </li>
                    <li>
                        <a href="#usuariosSubmenu" data-toggle="collapse" aria-expanded="false" id="usuarios">Usuarios</a>
                        <ul class="collapse list-unstyled" id="usuariosSubmenu">
                           	<?php if($cuenta == 'enfermera'): ?>
                            	<li><a href="cambio_contra_vista.php">Cambiar Contraseña</a></li>
                       		<?php else: ?>
                          		<li><a href="crear_usuario_vista.php">Crear Usuario</a></li>
                            	<li><a href="cambio_contra_vista.php">Cambiar Contraseña</a></li>
                           	<?php endif; ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#altasSubmenu" data-toggle="collapse" aria-expanded="false" id="altas">Altas</a>
                        <ul class="collapse list-unstyled" id="altasSubmenu">
                            <li><a href="altas_empleados_vista.php">Empleados</a></li>
                            <li><a href="altas_externos_vista.php">Externos</a></li>
                            <!--<li><a href="#">Editar Altas</a></li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="numreloj_consultas_vista.php">Crear Consulta</a>
                    </li>
                    <!--<li>
                        <a href="#incapacidadesSubmenu" data-toggle="collapse" aria-expanded="false" id="incapacidades">Incapacidades</a>
                        <ul class="collapse list-unstyled" id="incapacidadesSubmenu">
                            <li><a href="#">Crear Registro de Incapacidad</a></li>
                            <li><a href="#">Editar Incapacidad</a></li>
                        </ul>
                    <li>
                        <a href="#contratacionesSubmenu" data-toggle="collapse" aria-expanded="false" id="contrataciones">Contrataciones</a>
                        <ul class="collapse list-unstyled" id="contratacionesSubmenu">
                            <li><a href="#">Crear Registro de Contratación</a></li>
                            <li><a href="#">Editar Contratación</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#lesionesSubmenu" data-toggle="collapse" aria-expanded="false" id="lesiones">Lesiones</a>
                        <ul class="collapse list-unstyled" id="lesionesSubmenu">
                            <li><a href="#">Crear Registro de Lesión</a></li>
                            <li><a href="#">Editar Lesión</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#examenesSubmenu" data-toggle="collapse" aria-expanded="false" id="exam_med">Exámenes Médicos</a>
                        <ul class="collapse list-unstyled" id="examenesSubmenu">
                            <li><a href="#">Crear Examen Médico</a></li>
                            <li><a href="#">Editar Examen Médico</a></li>
                        </ul>
                    </li>-->
                    <li>
                        <a href="#reportesSubmenu" data-toggle="collapse" aria-expanded="false" id="reportes">Reportes</a>
						<ul class="collapse list-unstyled" id="reportesSubmenu">
							<li><a href="reportes_consultas_vista.php">Consultas</a></li>
							<!--<li><a href="#">Incapacidades</a></li>-->
						</ul>
                    </li>
                    <!--<li>
                        <a href="#">Búsqueda de Empelado</a>
                    </li>-->
                    <li>
                        <a id="soporte">Soporte</a>
                    </li>
                    <li>
                        <a href="cierre_sesion.php">Cierre de Sesión</a>
                    </li>
                </ul>
                
                <div class="sidebar-footer">
                	<p>Desarrollado por Julio Aguilar</p>
                </div>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default bla">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            
                            <div class="position">
                               <div class="head">									
									<div id="img_logo">
                              			<img id="logo" src="../img/logo.png">
                              		</div>
                              		<h1 id="lg">ENFERMERÍA</h1>
                               </div>
                            </div>
                        </div>
                       
                    </div>
                </nav>
                            
                <div class="contenedor">
                   <div class="contenedor2">    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario">
                        <p id="titulo" class="titulo">Registro de Usuarios</p>
                        <hr>
                        <p id="obligatorio">Los campos marcados con * son obligatorios</p>
                        
                        <div class="campos">
                            <div class="iconos">
                                <i class="fas fa-user"></i><input type="text" placeholder="Nombre de Usuario *" name="user_name" value="<?php if(!$registrado && isset($nombre_usuario)) echo $nombre_usuario; ?>" required>
                            </div>
                            <div class="iconos">
                                <i class="fas fa-key"></i><input type="password" placeholder="Contraseña *" name="password" required>
                            </div>
                            <div class="iconos">
                                <i class="fas fa-key"></i><input type="password" placeholder="Confirmar Contraseña *" name="password2" required>
                            </div>
                            <div class="iconos">
                               <i class="fas fa-user"></i><input type="text" placeholder="Nombre(s) *" name="nombres" value="<?php if(!$registrado && isset($nombres)) echo $nombres; ?>" required> 
                            </div>
                            <div class="iconos">
                                <i class="fas fa-user"></i><input type="text" placeholder="Apellido(s) *" name="apellidos" value="<?php if(!$registrado && isset($apellidos)) echo $apellidos; ?>" required>
                            </div>
                            
                            <div class="fila">
                                <div class="iconos">
                                    <i class="fas fa-lock candado"></i><select name="tipo_cuenta" class="opciones" required>
                                        <option value="">Tipo de Cuenta *</option>
                                        <option value="medico" <?php if(!$registrado && isset($tipo_cuenta)){ if($tipo_cuenta == 'medico'){ echo 'selected'; }} ?> >Médico</option>
                                        <option value="enfermera" <?php if(!$registrado && isset($tipo_cuenta)){ if($tipo_cuenta == 'enfermera'){ echo 'selected'; }} ?>>Enfermera</option>
                                        <option value="rh" <?php if(!$registrado && isset($tipo_cuenta)){ if($tipo_cuenta == 'rh'){ echo 'selected'; }} ?>>Recursos Humanos</option>
                                    </select>
                                </div>
                            
                                <input id="boton" type="submit" name="registrar" value="Registrar">
                            </div>
                            
                            <?php if(!empty($errores)): ?>
                                <div class="errores">
                                    <ul>
                                        <?php echo $errores; ?>
                                    </ul>
                                </div>
                            <?php elseif($registrado): ?>
                                <div class="registrado">
                                    <p>El usuario ha sido registrado existosamente.</p>
                                </div>
                                <!--Función de redireccionamiento con JS, el header de php no funcionó-->
                                <script language="javascript" type="text/javascript">
                                    function redireccionar(){
                                        window.location = "crear_usuario_vista.php";
                                    }
                                    
                                    setTimeout("redireccionar()", 1250);
                                </script>
                                
                            <?php endif; ?>
                            
                        </div>
                    </form>
                    </div>
                </div>
                
                <footer>
                    <img id="mahle" src="../img/mahle.png">
                    <img id="m2s" src="../img/M2SS.png">
                </footer>
                
            </div>
        </div>
         
         <!--Ventana emergente de soporte-->
		<div id="window2" class="modal2">
			<div class="modal-content2">
				<div class="header-modal2">
					<div class="support">
						<i class="fas fa-question-circle"></i>
						<p>Soporte</p>
					</div>
					<span class="close2">&times;</span>
				</div>
				<div class="info2">
					<h3>Información de Contacto</h3>
					<ul>
						<li><i class="fas fa-user-circle"></i></li>
						<li><p>Julio Aguilar</p></li>
						<li><i class="fas fa-envelope"></i></li>
						<li><p>julioc.mahle@gmail.com</p></li>
						<li><i class="fas fa-mobile-alt">&nbsp;</i><i class="fab fa-whatsapp"></i></li>
						<li><p>(656) 337-70-80</p></li>
					</ul>
				</div>
			</div>
		</div>

         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <!--Funciones del sidebar-->
         <script type="text/javascript" language="javascript" src="../js/sidebar.js"></script>
         
         <script>
			$(document).ready(function() {
				//funcion de ventana de soporte
				$('#soporte').on('click', function(){
					$.getScript("../js/soporte.js");
				});
			});
		</script>
    </body>
</html>
