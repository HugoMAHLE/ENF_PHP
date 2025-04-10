<?php
    require ('sesiones.php');
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=11">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <title>Centro de Acciones</title>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/centro_act.css">
        <link rel="stylesheet" href="../web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/soporte.css">
        
        <script src="../js/ui/jquery.js"></script>
    </head>
    
    <body>
       
        <header>
            <div class="head">
              <img id="logo" src="../img/logo.png">
              <h1 id="lg">ENFERMERÍA</h1>
            </div>
        </header>
        
        <p id="titulo">Centro de Acciones</p>
        <div class="contenedor">
           <a href="usuarios.php">
				<div class="circulos">
				   <i class="fas fa-users"></i>
				   <p>Usuarios</p>
			   </div>
		   </a>
           <a href="altas.php">
               <div class="circulos">
                   <i class="far fa-address-card"></i>
                   <p>Altas</p>
               </div>
           </a>
           <a href="numreloj_consultas_vista.php">
               <div class="circulos" >
                   <i class="fas fa-user-md"></i>
                   <p>Crear Consulta</p>
               </div>
           </a>
           <!--<a href="incapacidades.php">
               <div class="circulos">
                   <i class="fas fa-wheelchair"></i>
                   documentar* <i class="fas fa-procedures"></i>
                   <p>Incapacidades</p>
               </div>
           </a>
           <a href="contrataciones.php">
               <div class="circulos">
                   <i class="fas fa-id-card-alt"></i>
                   documentar* <i class="far fa-id-badge"></i>-
                   <p>Contrataciones</p>
               </div>
           </a>
           <a href="lesiones.php">
               <div class="circulos">
                   <i class="fas fa-band-aid"></i>
                   <p>Lesiones</p>
               </div>
           </a>
           <a href="exam_med.php">
               <div class="circulos">
                   <i class="fas fa-syringe"></i>
                   <p>Exámenes Médicos</p>
               </div>
           </a>-->
		   <a href="reportes.php">
			   <div class="circulos">
				   <i class="fas fa-notes-medical"></i>
				   <p>Reportes</p>
			   </div>
		   </a>
           <!--<a href="buscar_empleado_vista.php">
               <div class="circulos">
                   <i class="fab fa-sistrix"></i>
                   <p>Búsqueda de Empleado</p>
               </div>
           </a>-->
           <a id="soporte">
               <div class="circulos">
                   <i class="fas fa-question"></i>
                   <p>Soporte</p>
               </div>
           </a>
           <a href="cierre_sesion.php">
               <div class="circulos">
                   <i class="fas fa-power-off"></i>
                   <p>Cierre de Sesión</p>
               </div>
           </a>
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
						<li><p>Adrian Sotelo</p></li>
						<li><i class="fas fa-envelope"></i></li>
						<li><p>adrian.guadalupe.sotelo@mahle.com</p></li>
						<li><i class="fas fa-mobile-alt">&nbsp;</i></li>
						<li><p>(656) 169-53-12</p></li>
					</ul>
				</div>
			</div>
		</div>
        
        <footer>
           <div class="abajo">
               <img id="mahle" src="../img/mahle.png">
                <img id="m2s" src="../img/M2SS.png">
           </div>
        </footer>
        
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