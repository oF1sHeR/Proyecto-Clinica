$(document).ready(function() {


    //Averiguamos la altura de la capa general(Será todo menos el pie de página y la cabecera)
    var altura = $(window).innerHeight() - ($("#cabecera").height() + $("#pieDePagina").height());

    $("#capaGeneral").css({
        "height": altura - 3, // Le restamos 3 para que no aparezca la barra de desplazamiento,
        "position": "relative"
    })

    //Ajustamos el formulario en el centro.

    $("#capaTabla").css({
        "position": "absolute",
        "top": ($("#capaGeneral").height() - $("#capaTabla").outerHeight()) / 2,
        "left": ($("#capaGeneral").width() - $("#capaTabla").outerWidth()) / 2
    });

});