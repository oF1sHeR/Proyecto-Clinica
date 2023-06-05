$(document).ready(function() {
    //Averiguamos la altura de la capa general(Será todo menos el pie de página y la cabecera)
    var altura = $(window).innerHeight() - ($("#cabecera").height() + $("#pieDePagina").height());

    $("#capaGeneral").css({
        "height": altura - 3
    })

    $("#form").css({
        "position": "absolute",
        "top": ($("#capaGeneral").height() - $("#form").outerHeight()) / 2,
        "left": ($("#capaGeneral").width() - $("#form").outerWidth()) / 2
    });


    $(".mensaje").css({
        "height": altura
    });

    $(".mensaje div").css({
        "position": "absolute",
        "top": (altura - $(".mensaje>div").height()) / 2,
        "left": ($(".mensaje").width() - $(".mensaje>div").width()) / 2
    });



});