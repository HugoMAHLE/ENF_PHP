var modal = document.getElementById("window2");
var close = document.getElementsByClassName("close2")[0];

//mostrar ventana modal al cumplir la condición
modal.style.display = "block";

//cerrar ventana modal con botón x
close.onclick = function() {
    modal.style.display = "none";
}

//cerrar ventana modal al presionar afuera de la ventana
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}