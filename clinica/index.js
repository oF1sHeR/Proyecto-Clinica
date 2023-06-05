$(document).ready(function() {

    //Obtenemos la cantidad de elementos que tiene el slider
    var numElementos = $(".slider li").length;

    var imgPos = 1;
    for (var i = 0; i < numElementos; i++) {
        $(".paginas").append('<li><span class = "fas fa-circle">');
    }

    //Mostramos solo el primer li.
    $(".slider li ").hide();
    $(".slider li:first-child").show();

    //Damos color al primer punto

    $(".paginas li:first").css({ 'color': '#444' });


    //AUTOMATIZACIÓN DE LA FUNCION NEXT
    setInterval(function() {
        siguienteImagen()
    }, 10000);


    //Funciones
    $('.paginas li').click(paginar);
    $('.derecha').click(siguienteImagen);
    $('.izquierda').click(anteriorImagen);

    function paginar() {
        var posicion = $(this).index() + 1;
        $(".slider li").hide();

        $(".slider li:nth-child(" + posicion + ")").fadeIn();
        $(".paginas li").css({
            'color': 'grey'
        });

        /* Controlamos el efecto de :hover en js */

        $(this).css({
            'color': '#444'
        });

        imgPos = posicion;
    }

    function siguienteImagen() {
        imgPos++;
        if (imgPos > numElementos) {
            imgPos = 1;
        }


        $(".slider li").hide();

        $(".slider li:nth-child(" + imgPos + ")").fadeIn();
        $(".paginas li").css({
            'color': 'grey'
        });
        $(".paginas li:nth-child(" + imgPos + ")").css({
            'color': '#444'
        });

    }

    function anteriorImagen() {
        imgPos--;
        if (imgPos < 1) {
            imgPos = numElementos;
        }

        $(".slider li").hide();

        $(".slider li:nth-child(" + imgPos + ")").fadeIn();
        $(".paginas li").css({
            'color': 'grey'
        });
        $(".paginas li:nth-child(" + imgPos + ")").css({
            'color': '#444'
        });
    }
});