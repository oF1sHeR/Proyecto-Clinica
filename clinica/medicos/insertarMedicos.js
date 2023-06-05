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