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

    $("#capaGeneral").css({
        "height": altura
    });



    $("#capaGeneral>div").css({
        "position": "absolute",
        "top": (altura - $("#capaGeneral>div").height()) / 2,
        "left": ($("#capaGeneral").width() - $("#capaGeneral>div").width()) / 2
    });


    /* Capa Contenido */

    $("#capaContenido").css({
        "height": altura
    });

    $("#capaContenido>div").css({
        "position": "absolute",
        "top": (altura - $("#capaContenido>div").height()) / 2,
        "left": ($("#capaContenido").width() - $("#capaContenido>div").width()) / 2,
    });
});