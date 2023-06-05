function validaciones() {
    var resultado = true;
    var nombre = formulario.nombre;
    var email = formulario.email;
    var asunto = formulario.asunto;
    var mensaje = formulario.mensaje;



    resultado = resultado && comprobacionAlfabetico(nombre);

    resultado = resultado && comprobacionEmail(email);
    resultado = resultado && comprobarCampo(asunto, 40);
    resultado = resultado && comprobarCampo(mensaje, 2000);

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


//Efectos capa

$(document).ready(function() {
    $("#capaForm").animate({
        "visibility": "visible"
    }, 2000);
});