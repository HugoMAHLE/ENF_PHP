<?php
    require ('sesiones.php');
    require ('altas_externos.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=11">

        <title>Alta de Externos</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/altas_externos.css">
        <link rel="stylesheet" href="../web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <link rel="stylesheet" href="../css/soporte2.css">
        
		<script src="../js/ui/jquery.js"></script>
		<script src="../js/ui/jquery-ui.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>-->
        <script  src="../js/tabs.js" language="javascript" type="text/javascript"></script>
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
                        <p id="titulo" class="titulo">Registro de Externos</p>
                        
                        <ul class="tabs">
                            <li id="tabs1"><a href="#tab1"><span>Datos Personales</span></a></li>
                            <li id="tabs2"><a href="#tab2"><span>Datos del Externo</span></a></li>
                        </ul>
                        <p id="obligatorio">Los campos marcados con * son obligatorios</p>
                        <!--<hr>-->
                        <div class="divisiones">
                            <section id="tab1">
                                <div class="campos">
                                    <div class="iconos">
                                       <i class="fas fa-user"></i><input type="text" placeholder="Nombre(s) *" name="nombres" value="<?php if(!$registrado && isset($nombres)) echo $nombres; ?>" required> 
                                    </div>
                                    
                                    <div class="iconos">
                                        <i class="fas fa-user"></i><input type="text" placeholder="Apellido(s) *" name="apellidos" value="<?php if(!$registrado && isset($apellidos)) echo $apellidos; ?>" required>
                                    </div>
                                    
                                    <div class="fila2">
                                        <div class="iconos">
                                            <div><p>Fecha de Nacimiento *</p></div><i class="fas fa-birthday-cake icos ico"></i><input type="text" id="fecha_nac" name="fecha_nac" placeholder="YYYY-MM-DD" value="<?php if(!$registrado && isset($fecha_nac)) echo $fecha_nac; ?>" required>
                                        </div>
                                    </div>

                                    <div class="iconos">
                                        <i class="fas fa-venus-mars icos ico icon"></i><select name="sexo" id="sexo" required>
                                            <option value="">Sexo *</option>
                                            <option value="Masculino" <?php if(!$registrado && isset($sexo)){ if($sexo == 'Masculino'){ echo 'selected'; }} ?> >Masculino</option>
                                            <option value="Femenino" <?php if(!$registrado && isset($sexo)){ if($sexo == 'Femenino'){ echo 'selected'; }} ?>>Femenino</option>
                                        </select>
                                    </div>
                                    <!--<div class="iconos">
                                        <i class="fas fa-birthday-cake icos ico"></i><input type="number" placeholder="Edad" name="edad" min="20" max="80" pattern="[^\s]{2}" maxlength="2">
                                    </div>-->
                                    
                                    <div class="iconos">
                                       <i class="fas fa-pills enfer"></i><input type="text" placeholder="Enfermedades" name="enfermedades" value="<?php if(!$registrado && isset($enfermedades)) echo $enfermedades; ?>"> 
                                    </div>
                                    
                                    <div class="iconos">
                                       <i class="fas fa-allergies"></i><input type="text" placeholder="Alergias" name="alergias" value="<?php if(!$registrado && isset($alergias)) echo $alergias; ?>"> 
                                    </div>

                                   <div class="fila">
                                        <div class="check">
											<p>Hipertensión</p><label class="label_check"><input type="checkbox" name="hipertension" value="Si" <?php if(!$registrado && isset($hipertension) && !empty($hipertension)) echo 'checked'; ?>><span class="checkmark"></span></label>
                                        </div>
                                        <div class="check">
											<p>Diabetes</p><label class="label_check"><input type="checkbox" name="diabetes" value="Si" <?php if(!$registrado && isset($diabetes) && !empty($diabetes)) echo 'checked'; ?>><span class="checkmark"></span></label>
                                        </div>
                                    </div>
                                    
                                    <?php if(!empty($errores)): ?>
                                        <div class="errores">
                                            <ul>
                                                <?php echo $errores; ?>
                                            </ul>
                                        </div>
                                    <?php elseif(empty($errores) && !empty($errores2)): ?>
                                        <div class="errores">
                                            <ul>
                                                <li>Favor de corregir los errores que se encuentran en la pestaña "Datos del Externo".</li>
                                            </ul>
                                        </div>
                                    <?php elseif($registrado): ?>
                                        <div class="registrado">
                                            <p>El empleado fue dado de alta existosamente.</p>
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </section>
                            
                            <!--remover area, planta, y anexar checkbox de practicante-->
                            <section id="tab2">
                                <div class="campos">
                                    <div class="iconos">
                                        <i class="far fa-id-card"></i><input type="text" placeholder="Número de reloj *" name="numreloj" value="<?php if(!$registrado && isset($numreloj)) echo $numreloj; ?>" required>
                                    </div>
                                    
                                    <div class="iconos">
                                        <i class="fas fa-building"></i><input type="text" placeholder="Empresa o Universidad *" name="empresa" value="<?php if(!$registrado && isset($empresa)) echo $empresa; ?>" required>
                                    </div>
                                    
                                    <div class="fila3">
                                        <div class="check">
											<p>Practicante</p><label class="label_check"><input type="checkbox" name="practicante" value="Si" <?php if(!$registrado && isset($practicante) && !empty($practicante)) echo 'checked'; ?>><span class="checkmark" id="chk"></span></label>
                                        </div>
                                        <div class="iconos">
                                            <i class="far fa-clock"></i><select name="turno" id="turno">
                                                <option value="">Turno</option>
                                                <option value="A" <?php if(!$registrado && isset($turno)){ if($turno == 'A'){ echo 'selected'; }} ?> >A</option>
                                                <option value="B" <?php if(!$registrado && isset($turno)){ if($turno == 'B'){ echo 'selected'; }} ?>>B</option>
                                                <option value="C" <?php if(!$registrado && isset($turno)){ if($turno == 'C'){ echo 'selected'; }} ?>>C</option>
                                                <option value="3A" <?php if(!$registrado && isset($turno)){ if($turno == '3A'){ echo 'selected'; }} ?>>3A</option>
                                                <option value="3C" <?php if(!$registrado && isset($turno)){ if($turno == '3C'){ echo 'selected'; }} ?> >3C</option>
                                                <option value="4B" <?php if(!$registrado && isset($turno)){ if($turno == '4B'){ echo 'selected'; }} ?>>4B</option>
                                                <option value="4D" <?php if(!$registrado && isset($turno)){ if($turno == '4D'){ echo 'selected'; }} ?>>4D</option>
                                                <option value="6A" <?php if(!$registrado && isset($turno)){ if($turno == '6A'){ echo 'selected'; }} ?>>6A</option>
                                                <option value="6B" <?php if(!$registrado && isset($turno)){ if($turno == '6B'){ echo 'selected'; }} ?>>6B</option>
                                            </select>
                                        </div>
                                    </div>
                                                                            
                                    <div class="fila2">
                                        <div class="iconos">
                                            <div><p>Fecha de Ingreso *</p></div><i class="far fa-calendar-alt icos"></i><input type="text" id="fecha" name="fecha" placeholder="YYYY-MM-DD" value="<?php if(!$registrado && isset($fecha)) echo $fecha; ?>" required>
                                        </div>
                                    </div>
                                    
                                    <input id="boton" type="submit" name="registrar" value="Registrar">
                            
                                    <?php if(!empty($errores2)): ?>
                                        <div class="errores">
                                            <ul>
                                                <?php echo $errores2; ?>
                                            </ul>
                                        </div>
                                    <?php elseif($registrado): ?>
                                        <div class="registrado">
                                            <p>El empleado fue dado de alta existosamente.</p>
                                        </div>
                                        
                                        <?php $_SESSION['numreloj'] = $numreloj; ?>
                                        <!--Función de redireccionamiento con JS, el header de php no funcionó-->
                                        <script language="javascript" type="text/javascript">
                                            function redireccionar(){
                                                //window.location = "numreloj_consultas_vista.php";
                                                window.location = "consulta_externo_vista.php";
                                            }

                                            setTimeout("redireccionar()", 1000);
                                        </script>

                                    <?php endif; ?>
                                </div>
                            </section>
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
			 $(document).ready(function(){
				$("#fecha_nac").datepicker({
					dateFormat: "yy-mm-dd",
					changeMonth: true,
					changeYear: true,
					yearRange: "1940:"+ new Date()
				});

				$("#fecha").datepicker({
					dateFormat: "yy-mm-dd",
					changeMonth: true,
					changeYear: true,
					yearRange: "1970:"+ new Date()
				});
				 
				 //funcion de ventana de soporte
				$('#soporte').on('click', function(){
					$.getScript("../js/soporte.js");
				});
			 });
		 </script>
    </body>
</html>
