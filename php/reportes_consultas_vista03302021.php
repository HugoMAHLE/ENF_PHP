<?php
    require ('sesiones.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=11">

        <title>Reportes de Consultas</title>
        
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
		
       	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       	<link rel="stylesheet" href="../css/jquery.timepicker.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.0/css/keyTable.bootstrap.css"/>
		
       	<link rel="stylesheet" href="../css/menu.css">
       	<link rel="stylesheet" href="../css/reportes_consultas.css">
       	<link rel="stylesheet" href="../css/modal.css">
        <link rel="stylesheet" href="../web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/soporte2.css">
 		
 		<script src="../js/ui/jquery.js"></script>
 		<script src="../js/ui/jquery-ui.js"></script>
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
 		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.0/js/dataTables.keyTable.js"></script>
       	<script src="../js/jquery.timepicker.js"></script>
        
        <script type="text/javascript" language="javascript" src="../js/sidebar.js"></script>
        <script src="../js/calendario.js"></script>
        
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
                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario" name="buscar">
                        <div class="campos">
                                                                                      
							<i class="fas fa-filter"></i><select name="tipo_empleado" id="tipo_empleado" required>
								<option value="">Tipo de Empleado *</option>
								<option value="interno">Interno (MAHLE)</option>
								<option value="externo">Externo</option>
							</select>

							<i class="fas fa-info-circle"></i><select name="descripcion" id="descripcion" required>
								<option value="">Descripción *</option>
								<option value="Enfermedad General">Enfermedad General</option>
								<option value="Optica">C-TPAT</option>
								<option value="Examen Montacargas">Examen Montacargas</option>
								<option value="Reporte Lesiones">Reporte Lesiones</option>
								<option value="Riesgo de Trayecto">Riesgo de Trayecto</option>
								<option value="C-TPAT">C-TPAT</option>
							</select>

							<i class="fas fa-user"></i><select name="responsable" id="responsable">
								<option value="">Responsable</option>
							</select>

							<i class="far fa-building"></i><select name="planta" id="planta" disabled>
								<option value="">Planta</option>
								<option value="PTC">PTC</option>
								<option value="COMPRESORES">COMPRESORES</option>
								<option value="HVAC">HVAC</option>
								<option value="R&C">R&amp;C</option>
								<option value="COMPARTIDO">COMPARTIDO</option>
							</select>

							<p class="p-fechas">Desde la fecha *</p><i class="far fa-calendar-alt icos"></i><input type="text" class="fechas" id="fecha_inicio" name="fecha_inicio" placeholder="Fecha de Inicio *" required>
							<input type="text" name="hora_inicio" id="hora_inicio" placeholder="Hora de Inicio *" required>

							<p class="p-fechas">Hasta la fecha *</p><i class="far fa-calendar-alt icos"></i><input type="text" class="fechas" id="fecha_final" name="fecha_final" placeholder="Fecha Final *" required>
							<input type="text" name="hora_final" id="hora_final" placeholder="Hora Final *" required>
                                                                   
                            <i id="buscar" class="fab fa-sistrix" onclick="filtrar()"></i>
                                                                  
                            <p id="obligatorio">Los campos marcados con * son obligatorios</p>
                                                                    
                       </div>
                       
                   </form>
                </div>
                
                <div class="contenedor2">
                	<p id="titulo_empleado"></p>
                	<table id="myTable" style="visibility: hidden" class="table table-hover"><thead></thead></table>
                </div>
                
                <div id="wndow" class="modal">
					<div class="modal-content">
						<div class="header-modal">
							<div class="error">
								<i class="fas fa-exclamation-triangle"></i>
								<p>Error</p>
							</div>
							<span class="close">&times;</span>
						</div>
						<div class="info">
							<ul class="ul-errors"></ul>
							<div class="buttons">
								<button id="ok">Aceptar</button>
							</div>
						</div>
					</div>
				</div>
               
               	<!--Cargador de página-->
        		<div class="loader"></div>
                
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
			var opc_responsables;
			
			$(document).ready(function() {
				//funcion de ventana de soporte
				$('#soporte').on('click', function(){
					$.getScript("../js/soporte.js");
				});
				
				//función de bloqueo/desbloque de las plantas
				$('#tipo_empleado').change(function() {
					if($(this).find('option:selected').val() == 'interno'){
						$('#planta').prop('disabled', false);
					}else if($(this).find('option:selected').val() == 'externo'){
						$('#planta').prop('disabled', true);
					}else{
						$('#planta').prop('disabled', true);
					}
				});
				
				$.ajax({
					url: "responsables.php",
					method: "POST",
					success: function(datos){
						//alert(datos);
						opc_responsables = JSON.parse(datos);
						var len = opc_responsables.length;
						
						for(var i = 0; i < len; i++){
							var nombres = opc_responsables[i].nombres;
							var apellidos = opc_responsables[i].apellidos;
							
							$('#responsable').append('<option value="' + nombres + ' ' + apellidos + '">' + nombres + ' ' + apellidos + '</option>');
						}
					}
				});
				
			});
			
			function filtrar(){
				$('.ul-errors').empty();
				$('#titulo_empleado').empty();
				
				//inicialización y definición de variables
				var errores = '';
				var empleado = $('#tipo_empleado').val();
				var descripcion = $('#descripcion').val();
				var fecha_inicio = $('#fecha_inicio').val();
				var fecha_final = $('#fecha_final').val();
				var hora_inicio = $('#hora_inicio').val();
				var hora_final = $('#hora_final').val();
				
				if($('#responsable').val() !== ''){
					var responsable = $('#responsable').val();
				}
				
				if($('#planta').val() !== ''){
					var planta = $('#planta').val();
				}
				
				//validación de los campos de búsqueda
				//empleado
				if(empleado == ''){
					errores += '<li>Favor de seleccionar un tipo de empleado.</li>';
					destruir_tabla();					
				}

				//descripcion
				if(descripcion == ''){
					errores += '<li>Favor de seleccionar la descripción.</li>';
					destruir_tabla();					
				}
				
				//fecha de inicio
				if((fecha_inicio == '') && (hora_inicio !== '') && (fecha_final !== '') && (hora_final !== '')){
					errores += '<li>Favor de ingresar la fecha de inicio.</li>';
					destruir_tabla();
					
				//hora inicial
				}else if((fecha_inicio !== '') && (hora_inicio == '') && (fecha_final !== '') && (hora_final !== '')){
				   	errores += '<li>Favor de ingresar la hora de inicio.</li>';
					destruir_tabla();	
					
				//fecha y hora de inicio
				}else if((fecha_inicio == '') && (hora_inicio == '') && (fecha_final !== '') && (hora_final !== '')){
				   	errores += '<li>Favor de ingresar la fecha y hora de inicio.</li>';
					destruir_tabla();	
					
				//hora final
				}else if((fecha_inicio !== '') && (hora_inicio !== '') && (fecha_final !== '') && (hora_final == '')){
				   	errores += '<li>Favor de ingresar la hora final.</li>';
					destruir_tabla();	
					
				//fecha y hora final
				}else if((fecha_inicio !== '') && (hora_inicio !== '') && (fecha_final == '') && (hora_final == '')){
				   	errores += '<li>Favor de ingresar la fecha y hora final.</li>';
					destruir_tabla();	
					
				//fecha final
				}else if((fecha_inicio !== '') && (hora_inicio !== '') && (fecha_final == '') && (hora_final !== '')){
					errores += '<li>Favor de ingresar la fecha final.</li>';
					destruir_tabla();	
					
				//fecha de inicio y hora final
				}else if((fecha_inicio == '') && (hora_inicio !== '') && (fecha_final !== '') && (hora_final == '')){
				   	errores += '<li>Favor de ingresar la fecha de inicio y hora final.</li>';
					destruir_tabla();	
					
				//fecha final y hora incial
				}else if((fecha_inicio !== '') && (hora_inicio == '') && (fecha_final == '') && (hora_final !== '')){
				   	errores += '<li>Favor de ingresar la fecha final y hora de inicio.</li>';
					destruir_tabla();	
					
				//horas
				}else if((fecha_inicio !== '') && (hora_inicio == '') && (fecha_final !== '') && (hora_final == '')){
				   	errores += '<li>Favor de ingresar las horas.</li>';
					destruir_tabla();	
					
				//fechas
				}else if((fecha_inicio == '') && (hora_inicio != '') && (fecha_final == '') && (hora_final != '')){
				   	errores += '<li>Favor de ingresar las fechas.</li>';
					destruir_tabla();	
					   
				//fechas y horas      
				}else if((fecha_inicio == '') && (hora_inicio == '') && (fecha_final == '') && (hora_final == '')){
					errores += '<li>Favor de ingresar las fechas y las horas.</li>';
					destruir_tabla();	
					
				//fechas y hora inicial
				}else if((fecha_inicio == '') && (hora_inicio == '') && (fecha_final == '') && (hora_final !== '')){
				   	errores += '<li>Favor de ingresar las fechas y hora inicial.</li>';
					destruir_tabla();	
					   
				//fechas y hora final
				}else if((fecha_inicio == '') && (hora_inicio !== '') && (fecha_final == '') && (hora_final == '')){
				   	errores += '<li>Favor de ingresar las fechas y hora final.</li>';
					destruir_tabla();	

				//horas y fecha inicial
				}else if((fecha_inicio == '') && (hora_inicio == '') && (fecha_final != '') && (hora_final == '')){
				   	errores += '<li>Favor de ingresar la fecha inicial y las horas.</li>';
					destruir_tabla();	
					
				//horas y fecha final
				}else if((fecha_inicio != '') && (hora_inicio == '') && (fecha_final == '') && (hora_final == '')){
				   	errores += '<li>Favor de ingresar la fecha final y las horas.</li>';
					destruir_tabla();		
				}
				
				if(errores == ''){
					$.ajax({
						url: "reportes_consultas.php",
						method: "POST",
						data:{
							empleado: empleado,
							descripcion: descripcion,
							fecha_inicio: fecha_inicio,
							fecha_final: fecha_final,
							hora_inicio: hora_inicio,
							hora_final: hora_final,
							responsable: responsable,
							planta: planta
						},
						dateType: "JSON",
						beforeSend: function(){
							$("#body").addClass("loading");
							$(".loader").css("display", "block");
						},
						success: function(datos){
							//alert(datos);
							var info = JSON.parse(datos);
							var len = info.length;
							
							//excepción si no hay registros
							if(info == 'nodata'){
								destruir_tabla();

								$.getScript("../js/modal2.js");
								$(".ul-errors").append("<li>No se encontró ningún registro con los datos ingresados.</li>"); 

							//cero problemas
							}else{
								//Empleados Internos
								if(empleado == 'interno'){
									$('#titulo_empleado').append("Consultas de Empleados Internos");
									$('#myTable').css("visibility", "visible");
									destruir_tabla();
									
									$("#myTable").html("<thead style='background-color: #09164d; color: white'><tr class='tr-center'><th style='font-size: 14px'>Fecha</th><th style='font-size: 14px'>Número de Reloj</th><th style='font-size: 14px'>Motivo</th><th style='font-size: 14px'>Diagnóstico</th><th style='font-size: 14px'>Tratamiento</th><th style='font-size: 14px'>Descripción</th><th style='font-size: 14px'>Responsable</th><th style='font-size: 14px'>Empresa</th><th style='font-size: 14px'>Planta</th></tr></thead>");
									
									for(var i = 0; i < len; i++){
										var fecha = info[i].fecha;
										var numreloj = info[i].numreloj;
										var motivo = info[i].motivo;
										var diagnostico = info[i].diagnostico;
										var tratamiento = info[i].tratamiento;
										var desc = info[i].descripcion;
										var resp = info[i].responsable;
										var empresa = info[i].empresa;
										var planta2 = info[i].planta;
										
										var tabla = "<tr>" + 
											"<td>" + fecha + "</td>" +
											"<td>" + numreloj + "</td>" +
											"<td>" + motivo + "</td>" +
											"<td>" + diagnostico + "</td>" +
											"<td>" + tratamiento + "</td>" +
											"<td>" + desc + "</td>" +
											"<td>" + resp + "</td>" +
											"<td>" + empresa + "</td>" +
											"<td>" + planta2 + "</td></tr>";
										
										$('#myTable').append(tabla);
									}
									
								//Empleado Externos
								}else if(empleado == 'externo'){
									$('#titulo_empleado').append("Consultas de Empleados Externos");
									$('#myTable').css("visibility", "visible");
									destruir_tabla();
									
									$("#myTable").html("<thead style='background-color: #09164d; color: white'><tr class='tr-center'><th style='font-size: 14px'>Fecha</th><th style='font-size: 14px'>Número de Reloj</th><th style='font-size: 14px'>Motivo</th><th style='font-size: 14px'>Diagnóstico</th><th style='font-size: 14px'>Tratamiento</th><th style='font-size: 14px'>Descripción</th><th style='font-size: 14px'>Responsable</th><th style='font-size: 14px'>Empresa/Universidad</th><th style='font-size: 14px'>Practicante</th></tr></thead>");
									
									for(var i = 0; i < len; i++){
										var fecha = info[i].fecha;
										var numreloj = info[i].numreloj;
										var motivo = info[i].motivo;
										var diagnostico = info[i].diagnostico;
										var tratamiento = info[i].tratamiento;
										var desc = info[i].descripcion;
										var resp = info[i].responsable;
										var empresa = info[i].empresa;
										var practicante = info[i].practicante;
										
										var tabla = "<tr>" + 
											"<td>" + fecha + "</td>" +
											"<td>" + numreloj + "</td>" +
											"<td>" + motivo + "</td>" +
											"<td>" + diagnostico + "</td>" +
											"<td>" + tratamiento + "</td>" +
											"<td>" + desc + "</td>" +
											"<td>" + resp + "</td>" +
											"<td>" + empresa + "</td>" +
											"<td>" + practicante + "</td></tr>";
										
										$('#myTable').append(tabla);
									}
								}
								
								var titulo = $('#titulo_empleado').html();
								
								$("#myTable").DataTable({
									destroy: true,
									order: [
										[0, 'desc']
									],
									ordering: true,
									columnDefs: [
										{ orderable: false, targets: [2, 3, 4]}
									],
									keys: true,
									paging: true,
									pagingType: "full_numbers",
									pageLength: 25,
									searching: true,
									scroller: true,
									scrollY: 350,
									//info: true,
									//lengthChange: true,
									lengthMenu: [10, 20, 25, 30, 50],
									language: {url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
									dom: 'lBfrtip',
									buttons: [{
											extend: 'excelHtml5',
											autoFilter: true,
											text: 'Excel <i class="far fa-file-excel"></i>',
											filename: titulo + " " + fecha_inicio + "_" + fecha_final,
											sheetName: titulo + " " + fecha_inicio + "_" + fecha_final,
											title: titulo,
											className: "excel-button"
										},
										{
											extend: 'pdfHtml5',
											text: 'PDF <i class="far fa-file-pdf"></i>',
											filename: titulo + " " + fecha_inicio + "_" + fecha_final,
											title: titulo,
											orientation: "portrait",
											pageSize: "A3",
											className: "pdf-button"
											/*messageBottom: [{image: '../img/mahle.png',
      														fit: [100, 100]}]*/
										}
									]
								});
							}
							$(".loader").css("display", "none");
						}
					});
					
				}else{
					$.getScript("../js/modal2.js");
                	$(".ul-errors").append(errores);
				}
				
			}
			
			function destruir_tabla(){
				//eliminar tabla si existe
				if($.fn.DataTable.isDataTable('#myTable')) {
					$("#myTable").DataTable().destroy();
					$("#myTable").empty();
				}
			}
		</script>
      
    </body>
</html>
