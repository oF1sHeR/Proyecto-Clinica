$(document).ready(function() {


    //Averiguamos la altura de la capa general(Será todo menos el pie de página y la cabecera)
    var altura = $(window).innerHeight() - ($("#cabecera").height() + $("#pieDePagina").height());

    $("#mensajeInformativo").css({
        "height": altura - 3 // Le restamos 3 para que no aparezca la barra de desplazamiento
    })

    //Ajustamos el formulario en el centro.

    $("#mensajeInformativo h1").css({
        "position": "absolute",
        "top": ($("#mensajeInformativo").height() - $("#mensajeInformativo h1").outerHeight()) / 2,
        "left": ($("#mensajeInformativo").width() - $("#mensajeInformativo h1").outerWidth()) / 2,
    });


});