$(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
         $(this).toggleClass('active');
     });

     /*$$('html').on('click', function () {
         $('#sidebar').removeClass('active');
     });*/

     //Funcion de interfaces de menu individuales
     $('#usuarios').dblclick(function (){
         window.location.href = "../php/usuarios.php";
     });
     $('#altas').dblclick(function (){
         window.location.href = "../php/altas.php";
     });
     /*$('#consultas').dblclick(function (){
         window.location.href = "../php/consultas.php";
     });
     $('#incapacidades').dblclick(function (){
         window.location.href = "../php/incapacidades.php";
     });
     $('#contrataciones').dblclick(function (){
         window.location.href = "../php/contrataciones.php";
     });
     $('#lesiones').dblclick(function (){
         window.location.href = "../php/lesiones.php";
     });
     $('#exam_med').dblclick(function (){
         window.location.href = "../php/exam_med.php";
     });*/
     $('#reportes').dblclick(function (){
         window.location.href = "../php/reportes.php";
     });

 });