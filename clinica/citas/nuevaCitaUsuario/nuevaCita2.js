function validaciones() {
    var resultado = true;

    var motivo = formulario.motivo;
    var descripcion = formulario.descripcion;
    var observaciones = formulario.observaciones;

    resultado = resultado && comprobarCampo(motivo, 40);
    resultado = resultado && comprobarCampo(descripcion, 1000);
    resultado = resultado && comprobarCampo(observaciones, 1000);
    return resultado;
}



function comprobacionAlfabetico(campo) {
    var field = campo;
    var patronNombre = /^[a-zA-Z ÑÁÉÍÓÚ ñáéíóú]{3,30}$/;
    var bien = true;

    if (field.value.match(patronNombre)) {
        field.style.backgroundColor = "white";
    } else {
        bien = false;
        field.focus();
        field.style.backgroundColor = "red";
        var textoMensaje = "Solo letras mayúsculas y minúsculas. Mínimo 3 letras.\n";
        cambiarMensaje(textoMensaje);

    }

    return bien;

}

function comprobarCampo(campo, longitud) {
    var field = campo;
    var correcto = true;
    if (field.value == "") {
        field.focus();
        correcto = false;
        var textoMensaje = "Debes rellenar el campo\n";
        field.style.backgroundColor = "red";
        cambiarMensaje(textoMensaje);

    } else if (field.value.length < 5 || field.value.length > longitud) {
        correcto = false;
        var textoMensaje = ("La longitud del campo es entre 5 y " + longitud + " caracteres\n");
        field.style.backgroundColor = "red";
        cambiarMensaje(textoMensaje);

    } else {
        field.style.backgroundColor = "white";

    }
    return correcto;

}


function comprobacionEmail(campo) {
    var patronEmail;
    patronEmail = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    var field = campo;
    var bien = true;

    if (field.value.match(patronEmail)) {
        field.style.backgroundColor = "white";
    } else {
        bien = false;
        field.focus();
        field.style.backgroundColor = "red";
        var textoMensaje = "Introduce un correo válido.\n";
        cambiarMensaje(textoMensaje);


    }

    return bien;
}


function cambiarMensaje(textoMensaje) {

    var cuadro = document.getElementById("cuadro");
    var mensaje = document.createElement("p");
    var nodoTexto = document.createTextNode(textoMensaje);
    // Mientras tenga hijos borrarlos.
    while (cuadro.firstChild) {
        cuadro.removeChild(cuadro.firstChild);
    }

    mensaje.appendChild(nodoTexto);
    cuadro.appendChild(mensaje);
    cuadro.style.visibility = "visible";

}



$(document).ready(function() {


    //Averiguamos la altura de la capa general(Será todo menos el pie de página y la cabecera)
    var altura = $(window).innerHeight() - ($("#cabecera").height() + $("#pieDePagina").height());

    $(".mensaje").css({
        "height": altura
    });

    $(".mensaje div").css({
        "position": "absolute",
        "top": (altura - $(".mensaje>div").height()) / 2,
        "left": ($(".mensaje").width() - $(".mensaje>div").width()) / 2
    });

    $("#capaPadre").css({
        "height": altura
    });
});