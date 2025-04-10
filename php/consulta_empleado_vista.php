<?php
    require ('sesiones.php');
    //$_SESSION['responsable'] = $nombre_usr;
    require ('consulta_empleado.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=11">

        <title>Consulta de Empleado</title>

		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.4.0/css/keyTable.bootstrap.min.css"/>
        
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/consulta_empleado.css">
        <link rel="stylesheet" href="../web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/soporte2.css">
        
        <script src="../js/ui/jquery.js"></script>
        <!--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.4.0/js/dataTables.keyTable.min.js"></script>
        
        <script type="text/javascript" language="javascript" src="../js/sidebar.js"></script>
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
                        <p id="titulo" class="titulo">Consulta de Empleado</p>
                        
                        <ul class="tabs">
                            <li id="tabs1"><a href="#tab1"><span>Datos del Empleado</span></a></li>
                            <li id="tabs2"><a href="#tab2"><span>Datos de Consulta</span></a></li>
                        </ul>
                        <p id="obligatorio">Los campos marcados con * son obligatorios</p>
                        <!--<hr>-->
                        <div class="divisiones">
                            <section id="tab1">
                                <div class="campos">
                                    <div class="iconos">
                                        <i class="far fa-id-card"></i><input type="text" placeholder="Número de reloj *" name="numreloj" id="numreloj" title="Número de Reloj *" value="<?php if(!$registrado && isset($numreloj)) echo $numreloj; ?>" disabled>
                                    </div>
                                   
                                    <div class="iconos">
                                       <i class="fas fa-user"></i><input type="text" placeholder="Nombre Completo *" name="nombrecomp" title="Nombre Completo" value="<?php if(!$registrado && isset($nombre)) echo $nombre; ?>" disabled> 
                                    </div>
                                    
                                    <div class="fila2">
                                        <div class="iconos">
                                            <div><p>Empresa</p></div><i class="fas fa-building"></i><input id="empresa" type="text" name="empresa" value="MAHLE" disabled>
                                        </div>
                                    </div>
                                    
                                    <div class="fila">
                                        <div class="iconos">
                                            <i class="far fa-building"></i><input type="text" name="planta" id="planta" title="Planta *" value="<?php if(!$registrado && isset($planta)) echo $planta; ?>" disabled>
                                        </div>
                                        <div class="iconos">
                                            <i class="fas fa-birthday-cake icos ico"></i><input type="text" placeholder="Edad" id="edad" name="edad" title="Edad" value="<?php if(!$registrado && isset($edad)) echo $edad; ?>" disabled>
                                        </div>
                                    </div>
                                    
                                    <div class="iconos">
                                       <i class="fas fa-pills enfer"></i><input type="text" placeholder="Enfermedades" name="enfermedades" title="Enfermedades" value="<?php if(!$registrado && isset($enfermedades)) echo $enfermedades; ?>" disabled> 
                                    </div>
                                    
                                    <div class="iconos">
                                       <i class="fas fa-allergies"></i><input type="text" placeholder="Alergias" name="alergias" title="Alergias" value="<?php if(!$registrado && isset($alergias)) echo $alergias; ?>" disabled> 
                                    </div>

                                   <div class="fila fila_chk">
                                        <div class="check">
											<p>Hipertensión</p><label class="label_check"><input type="checkbox" name="hipertension" value="Si" <?php if(!$registrado && isset($hipertension) && !empty($hipertension)) echo 'checked'; ?> disabled><span class="checkmark"></span></label>
                                        </div>
                                        <div class="check">
											<p>Diabates</p><label class="label_check"><input type="checkbox" name="diabetes" value="Si" <?php if(!$registrado && isset($diabetes) && !empty($diabetes)) echo 'checked'; ?> disabled><span class="checkmark"></span></label>
                                        </div>
                                    </div>
                                    
                                    <?php if(!empty($errores)): ?>
                                        <div class="errores">
                                            <ul>
                                                <li>Favor de corregir los errores que se encuentran en la pestaña "Datos de Consulta".</li>
                                            </ul>
                                        </div>
                                    <?php elseif($registrado): ?>
                                        <div class="registrado">
                                            <p>La consulta se guardó existosamente.</p>
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </section>
                            <section id="tab2">
                                <div class="campos">
                                    <div class="iconos">
                                        <i class="fas fa-user"></i><input type="text" placeholder="Responsable *" name="responsable" title="Responsable *" value="<?php if(!$registrado && isset($nombre_usr)) echo $nombre_usr; ?>" disabled>
                                    </div>
                                    
                                    <div class="iconos">
                                            <i class="fas fa-info-circle"></i><select name="descripcion" id="descripcion" required>
                                                <option value="">Descripción *</option>
                                                <option value="Enfermedad General" <?php if(!$registrado && isset($descripcion)){ if($descripcion == 'Enfermedad General'){ echo 'selected'; }} ?> >Enfermedad General</option>
                                                <option value="Optica" <?php if(!$registrado && isset($descripcion)){ if($descripcion == 'Optica'){ echo 'selected'; }} ?>>Optica</option>
                                                <option value="Examen Montacargas" <?php if(!$registrado && isset($descripcion)){ if($descripcion == 'Examen Montacargas'){ echo 'selected'; }} ?>>Examen Montacargas</option>
                                                <option value="Reporte Lesiones" <?php if(!$registrado && isset($descripcion)){ if($descripcion == 'Reporte Lesiones'){ echo 'selected'; }} ?>>Reporte Lesiones</option>
                                                <option value="Riesgo de Trayecto" <?php if(!$registrado && isset($descripcion)){ if($descripcion == 'Riesgo de Trayecto'){ echo 'selected'; }} ?>>Riesgo de Trayecto</option>
                                                <option value="C-TPAT" <?php if(!$registrado && isset($descripcion)){ if($descripcion == 'C-TPAT'){ echo 'selected'; }} ?>>C-TPAT</option>
                                            </select>
                                    </div>
                                    
                                    <textarea name="motivo" placeholder="Motivo de la Consulta *" required><?php if(!$registrado && isset($motivo)) echo $motivo; ?></textarea>
                                    <textarea name="exploracion" placeholder="Exploración Física"><?php if(!$registrado && isset($exploracion)) echo $exploracion; ?></textarea>
                                    <textarea name="diagnostico" placeholder="Diagnóstico *" required><?php if(!$registrado && isset($diagnostico)) echo $diagnostico; ?></textarea>
                                    <textarea name="tratamiento" placeholder="Tratamiento *" required><?php if(!$registrado && isset($tratamiento)) echo $tratamiento; ?></textarea>
                                    <textarea name="comentarios" placeholder="Comentarios"><?php if(!$registrado && isset($comentarios)) echo $comentarios; ?></textarea>
                                    
                                    <input id="boton" type="submit" name="guardar" value="Guardar">
                            
                                    <?php if(!empty($errores)): ?>
                                        <div class="errores">
                                            <ul>
                                                <?php echo $errores; ?>
                                            </ul>
                                        </div>
                                    <?php elseif($registrado): ?>
                                        <div class="registrado">
                                            <p>La consulta se guardó existosamente.</p>
                                        </div>
                                        <!--Función de redireccionamiento con JS, el header de php no funcionó-->
                                        <script language="javascript" type="text/javascript">
                                            function redireccionar(){
                                                window.location = "numreloj_consultas_vista.php";
                                            }

                                            setTimeout("redireccionar()", 1500);
                                        </script>

                                    <?php endif; ?>
                                </div>
                            </section>
                        </div>
                    
                    </form>
                    </div>
                    
                    <?php if($tabla && $tabla == 'llena'): ?>
						<div class="contenedor3">
							<h3>Historial Médico del Paciente</h3>
							<table id="myTable" class="table table-hover">
								<thead style="background-color: #09164d; color: white">
									<tr>
										<th style="border-radius: 5px 0 0 0">Fecha</th>
										<th>Padecimiento</th>
										<th class="tratamientos">Tratamiento</th>
										<th>Enfermedades</th>
										<th style="border-radius: 0 5px 0 0">Comentarios</th>
									</tr>
								</thead>
							</table>
						</div>
						
						<script>
						$(document).ready(function (){
							$.ajax({
								url: "tabla_paciente_emp.php",
								method: "POST",
								data: {
									numreloj: $("#numreloj").val()
								},
								dateType: "JSON",
								success: function(data){
									//alert(data);
									//recibir la información del php
									var info = JSON.parse(data);
									var len = info.length;

									for (var i = 0; i < len; i++) {

										//almacenar valores en variables de un arreglo asociativo 
										var fecha = info[i].fecha;
										var diagnostico = info[i].diag;
										var tratamiento = info[i].pad;
										var enfermedades = info[i].enf;
										var comentarios = info[i].com;

										var data_table = "<tr>" +
											"<td style='font-size: 14px; font-weight: 400'>" + fecha + "</td>" +
											"<td style='font-size: 14px; font-weight: 400'>" + diagnostico + "</td>" +
											"<td style='font-size: 14px; font-weight: 400'>" + tratamiento + "</td>" +
											"<td style='font-size: 14px; font-weight: 400'>" + enfermedades + "</td>" +
											"<td style='font-size: 14px; font-weight: 400'>" + comentarios + "</td>" + "</tr>";

										$("#myTable").append(data_table);
									}

									$("#myTable").DataTable({
										order: [
											[0, 'desc']
										],
										ordering: true,
										columnDefs: [
											{ orderable: false, targets: [2, 3, 4]}
										],
										keys: true,
										responsive: false,
										paging: false,
										/*paging: true,
										pagingType: "full_numbers",
										pageLength: 5,*/
										scroller: true,
										scrollY: 500,
										info: false,
										searching: false,
										lengthChange: false,
										language: {url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"}
									});
								}
							});
						});
							
						</script>
					<?php endif; ?>
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
