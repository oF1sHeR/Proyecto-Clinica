function validaciones() {

    var resultado = true;
    var nombre = formulario.nombre;
    var tipo = formulario.tipo;
    var sexo = formulario.sexo;
    var edad = formulario.edad;
    var raza = formulario.raza;
    var descripcion = formulario.descripcion;
    var telefono = formulario.telefono;
    var ubicacion = formulario.ubicacion;

    resultado = resultado && comprobacionAlfabetico(nombre);
    resultado = resultado && comprobacionAlfabetico(tipo);
    resultado = resultado && comprobacionEdad(edad);
    resultado = resultado && comprobacionAlfabetico(raza);
    resultado = resultado && comprobarCampo(descripcion, 1000);
    resultado = resultado && comprobacionTelefono(telefono);
    resultado = resultado && comprobacionAlfabetico(ubicacion);

    return resultado;
}

function comprobacionAlfabetico(campo) {
    var field = campo;
    var patronNombre = /^[a-zA-Z ÑÁÉÍÓÚ ñáéíóú]{1,40}$/;
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

function comprobacionTelefono(campo) {
    var field = campo;
    var patronTelefono;
    var bien = true;

    patronTelefono = /^[0-9]{1,14}$/;
    if (field.value.match(patronTelefono)) {
        field.style.backgroundColor = "white";
    } else {
        bien = false;
        field.focus();
        field.style.backgroundColor = "red";
        var textoMensaje = "Introduce un teléfono válido.\n";
        cambiarMensaje(textoMensaje);
    }

    return bien;
}

function comprobacionEdad(campo) {
    var field = campo;
    var bien = true;

    if (field.value == "") {
        field.focus();
        bien = false;
        var textoMensaje = "Debes rellenar el campo\n";
        field.style.backgroundColor = "red";
        cambiarMensaje(textoMensaje);

    } else {
        if (Number.isInteger(+field.value) && +field.value >= 0 && +field.value < 100) {
            field.style.backgroundColor = "white";
        } else {
            field.focus();
            bien = false;
            var textoMensaje = "Tiene que ser un número entre 0 y 99";
            field.style.backgroundColor = "red";
            cambiarMensaje(textoMensaje);
        }
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


});