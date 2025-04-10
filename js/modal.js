var modal = document.getElementById('ventana');
var cerrar = document.getElementsByClassName("cerrar")[0];
var empleado = document.getElementById("empleado");
//var externo = document.getElementById("externo");
var cancelar = document.getElementById("cancelar");

//mostrar ventana modal al cumplir la condición
modal.style.display = "block";

//redireccionar a la interfaz de alta de empleados
empleado.onclick = function(){
    window.location = "../php/altas_empleados_vista.php";
}

//cerrar ventana modal con botón x
cerrar.onclick = function() {
    modal.style.display = "none";
}

//cerrar ventana modal con botón cancelar
cancelar.onclick = function(){
    modal.style.display = "none";
}

//cerrar ventana modal al presionar afuera de la ventana
/*window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/