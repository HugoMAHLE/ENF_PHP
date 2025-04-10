var modal = document.getElementById("wndow");
var close = document.getElementsByClassName("close")[0];
var ok = document.getElementById("ok");

//mostrar ventana modal al cumplir la condición
modal.style.display = "block";

//cerrar ventana modal con botón x
close.onclick = function() {
    modal.style.display = "none";
}

//cerrar ventana modal con botón aceptar
ok.onclick = function(){
    modal.style.display = "none";
}

//cerrar ventana modal al presionar afuera de la ventana
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}