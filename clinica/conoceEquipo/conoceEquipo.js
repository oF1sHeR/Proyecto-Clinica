$(document).ready(function() {
    $(".nombre").on('click', function() {
        if ($(this).attr('clickeado') != 1) {
            $(this).attr('clickeado', 1);
            $(this).parent().siblings("div").fadeIn(500);
        } else {
            $(this).attr('clickeado', 0);
            $(this).parent().siblings("div").fadeOut(500);
        }

    });
});