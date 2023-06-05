function validar() {
    var resultado = true;

    var nuevaPass = formulario.pass;
    var confirmacionNuevaPass = formulario.pass2;
    resultado = resultado && comprobacionPass(nuevaPass);
    resultado = resultado && confirmacionPass(nuevaPass, confirmacionNuevaPass);

    return resultado;
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

$(document).ready(function() {


    //Averiguamos la altura de la capa general(Será todo menos el pie de página y la cabecera)
    var altura = $(window).innerHeight() - ($("#cabecera").height() + $("#pieDePagina").height());

    $("#capaGeneral").css({
        "height": altura - 3 // Le restamos 3 para que no aparezca la barra de desplazamiento
    })

    //Ajustamos el formulario en el centro.

    $("#formulario").css({
        "position": "absolute",
        "top": ($("#capaGeneral").height() - $("#formulario").outerHeight()) / 2,
        "left": ($("#capaGeneral").width() - $("#formulario").outerWidth()) / 2
    });

});