<?php
    require ('sesiones.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=11">

        <title>Exámenes Médicos</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/consultas.css">
        <link rel="stylesheet" href="../web-fonts-with-css/css/fontawesome-all.css">
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
                            <li><a href="#">Externos</a></li>
                            <li><a href="#">Editar Altas</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#consultasSubmenu" data-toggle="collapse" aria-expanded="false" id="consultas">Consultas</a>
                        <ul class="collapse list-unstyled" id="consultasSubmenu">
                            <li><a href="#">Crear Consulta</a></li>
                            <li><a href="#">Editar Consulta</a></li>
                        </ul>
                    </li>
                    <li>
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
                    </li>
                    <li>
                        <a href="#reportesSubmenu" data-toggle="collapse" aria-expanded="false" id="reportes">Reportes</a>
                        <ul class="collapse list-unstyled" id="reportesSubmenu">
                            <li><a href="reportes_consultas_vista.php">Consultas</a></li>
                            <!--<li><a href="#">Incapacidades</a></li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="#">Búsqueda de Empelado</a>
                    </li>
                    <li>
                        <a href="cierre_sesion.php">Cierre de Sesión</a>
                    </li>
                </ul>
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
                            
                <p id="titulo">Exámenes Médicos</p>
                <div class="contenedor">    
                    <a href="">
                    <div class="circulos">
                      <i class="fas fa-file-medical-alt" id="reg"></i>
                       <p>Crear Examen Médico</p>
                   </div>
                   </a>
                   <a href="">
                       <div class="circulos">
                           <i class="far fa-edit" id="edit"></i>
                           <p>Editar Examen Médico</p>
                       </div>
                   </a>
                </div>
                
                <footer>
                    <img id="mahle" src="../img/mahle.png">
                    <img id="m2s" src="../img/M2SS.png">
                </footer>
                
            </div>
        </div>

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <!--Funciones del sidebar-->
         <script type="text/javascript" language="javascript" src="../js/sidebar.js"></script>
    </body>
</html>
