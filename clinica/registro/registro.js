function validaciones() {

    var resultado = true;
    var nombreUsuario = formulario.nombreUsuario;
    var nombre = formulario.nombre;
    var apellidos = formulario.apellidos;
    var email = formulario.email;
    var password = formulario.password;
    var confirmarPassword = formulario.confirmarPassword;
    var dni = formulario.dni;
    var telefono = formulario.telefono;
    var dia = formulario.dia;
    var mes = formulario.mes;
    var year = formulario.year;


    resultado = resultado && comprobarCampo(nombreUsuario) && comprobarAlfanumerico(nombreUsuario);
    //comprobarAlfanumerico(nombreUsuario);
    resultado = resultado && comprobacionEmail(email);
    resultado = resultado && comprobacionPass(password);
    resultado = resultado && confirmacionPass(password, confirmarPassword);
    resultado = resultado && comprobacionAlfabetico(nombre);
    resultado = resultado && comprobacionAlfabetico(apellidos);
    resultado = resultado && comprobacionDNI(dni);
    resultado = resultado && comprobacionTelefono(telefono);


    //fecha(dia, mes, year);

    /*MENSAJE
     var textoNodo = document.createTextNode(textoMensaje);
     mensaje.appendChild(textoNodo);
     document.formulario.appendChild(mensaje);
      */

    return resultado;
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

    } else if (field.value.length < 5 || field.value.length > 20) {
        correcto = false;
        var textoMensaje = ("La longitud del campo es entre 5 y 20 caracteres\n");
        field.style.backgroundColor = "red";
        cambiarMensaje(textoMensaje);

    } else {
        field.style.backgroundColor = "white";

    }
    return correcto;

}

function comprobacionAlfabetico(campo) {
    var field = campo;
    var patronNombre = /^[a-zA-Z ÑÁÉÍÓÚ ñáéíóú]{1,30}$/;
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
    var caracteres = "abcdefghijklmnopqrstuvwxyz0123456789 áéíóú";
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

function comprobacionPass(campo) {
    //Para hacer la contraseña, deberá cumplir las siguientes condiciones: 8-20 caracteres, que tenga una mayuscula,un numero, y un simbolo de manera obligatoria.
    var field = campo;

    var patronPass, patronMayuscula, patronNumero, patronCarEspecial;
    var bien = true;

    patronPass = /^[a-zA-Z0-9!@#$%^&()=\[\]{};':"\|,.<>\/?+-]{8,20}$/;
    patronMayuscula = /[A-Z]/;
    patronNumero = /[0-9]/;
    patronCarEspecial = /[!@#$%^&()=\[\]{};':"\|,.<>\/?+-]/;

    if (field.value.match(patronNumero) && field.value.match(patronPass) && field.value.match(patronMayuscula) && field.value.match(patronCarEspecial)) {
        field.style.backgroundColor = "white";

    } else {
        bien = false;
        field.focus();
        field.style.backgroundColor = "red";
        var textoMensaje = "La contraseña debe contener:\n 1 Maýuscula\n 1 Número \Un caracter especial. Ej: # % $ ^\n";
        cambiarMensaje(textoMensaje);
    }

    return bien;

}

function confirmacionPass(campo, campo2) {
    var field = campo;
    var field2 = campo2;
    var bien = true;

    if (field.value == field2.value) {
        field2.style.backgroundColor = "white";
    } else {
        field2.style.backgroundColor = "red";
        bien = false;
        field2.focus();
        var textoMensaje = "Las contraseñas deben coincidir\n";
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

/*
    CENTRAR EN MEDIO
*/

$(document).ready(function() {
    //Ajustamos el formulario en el centro.

    $(document).ready(function() {

        $("#capaGeneral").css({
            "height": $("#formulario").height() + 50 // Añadimos 50 para que quede bien cuadrado.
        })

        //Ajustamos el formulario en el centro.

        $("#formulario").css({
            "position": "absolute",
            "top": ($("#capaGeneral").height() - $("#formulario").outerHeight()) / 2,
            "left": ($("#capaGeneral").width() - $("#formulario").outerWidth()) / 2
        });

    });

});