var modal = document.getElementById('ventana2');
var cerrar = document.getElementsByClassName("cerrar2")[0];
var externo = document.getElementById("externo");
var cancelar = document.getElementById("cancelar2");

//mostrar ventana modal al cumplir la condición
modal.style.display = "block";

//redireccionar a la interfaz de alta de externos
externo.onclick = function(){
    window.location = "../php/altas_externos_vista.php";
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