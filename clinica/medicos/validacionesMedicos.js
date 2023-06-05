function validaciones() {
    var resultado = true;

    var dni = formulario.dni;
    var nombre = formulario.nombre;
    var apellidos = formulario.apellidos;

    var estudios = formulario.estudios;

    resultado = resultado && comprobacionDNI(dni);
    resultado = resultado && comprobacionAlfabetico(nombre);
    resultado = resultado && comprobacionAlfabetico(apellidos);
    resultado = resultado && comprobarCampo(estudios) && comprobarAlfanumerico(estudios);
    return resultado;

}

function comprobacionDNI(campo) {
    var field = campo;
    var patronDNI, patronNIE;
    var bien = true;
    patronDNI = /^\d{8}[a-zA-Z]$/
    patronNIE = /^[A-Za-z][0-9]{7}[A-Za-z]$/;
    if (field.value.match(patronNIE) || field.value.match(patronDNI)) {
        field.style.backgroundColor = "white";
    } else {
        bien = false;
        field.focus();
        field.style.backgroundColor = "red";
        var textoMensaje = "Introduce un DNI/NIE válido.\n";
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
        var textoMensaje = "Solo letras mayúsculas y minúsculas\n";
        cambiarMensaje(textoMensaje);

    }
    return bien;

}

function comprobarAlfanumerico(campo) {
    var field = campo;
    var caracteres = "abcdefghijklmnopqrstuvwxyz0123456789 áéíóú ";
    var caracter;
    var bien = true;
    var i;

    for (i = 0; i < field.value.length; i++) {
        caracter = field.value.charAt(i).toLowerCase();
        if (caracteres.indexOf(caracter) == -1) {
            bien = false;
        }
    }
    if (!bien) {
        field.focus();
        field.style.backgroundColor = "red";
        var textoMensaje = "Solo caracteres alfanumericos\n";
        cambiarMensaje(textoMensaje);
    } else {
        field.style.backgroundColor = "white";
    }

    return bien;
}

function comprobarCampo(campo) {
    var field = campo;
    var correcto = true;
    if (field.value == "") {
        field.focus();
        correcto = false;
        var textoMensaje = "Debes rellenar el campo\n";
        field.style.backgroundColor = "red";
        cambiarMensaje(textoMensaje);

    } else if (field.value.length < 5 || field.value.length > 100) {
        correcto = false;
        var textoMensaje = ("La longitud del campo es entre 5 y 100 caracteres\n");
        field.focus();
        field.style.backgroundColor = "red";
        cambiarMensaje(textoMensaje);

    } else {
        field.style.backgroundColor = "white";

    }
    return correcto;

}