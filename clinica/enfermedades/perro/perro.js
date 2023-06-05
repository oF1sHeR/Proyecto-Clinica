/* Variable global para conocer la parte del cuerpo */

var parteVisible;

//Funcion para saber las coordenadas donde hemos pulsado
function verCoordenadas(manejador) {
    var dimensiones = new Array();
    var x, y;

    x = manejador.layerX;
    y = manejador.layerY;

    dimensiones.push(x);
    dimensiones.push(y);

    var parteCuerpo = escogerParte(dimensiones);
    if (parteCuerpo) {
        verInformacion(parteCuerpo);
    }


    //Devolvemos un array con 2 posiciones, la 1º posición será el eje X, y la segunda el eje Y
    return dimensiones;
}

function cambiarColor(manejador) {
    var dimensiones = new Array();
    var x, y;

    x = manejador.layerX;
    y = manejador.layerY;

    dimensiones.push(x);
    dimensiones.push(y);

    var imagen = document.getElementById("imagenPerro");
    var parteCuerpo = escogerParte(dimensiones);

    switch (parteCuerpo) {
        case "cabeza":
            imagen.src = "/clinica/imagenes/VectorPerro2_cabeza.png";
            break;
        case "tronco":
            imagen.src = "/clinica/imagenes/VectorPerro2_tronco.png";
            break;
        case "patas delanteras":
            imagen.src = "/clinica/imagenes/VectorPerro2_patas_delanteras.png";
            break;
        case "patas traseras":
            imagen.src = "/clinica/imagenes/VectorPerro2_patas_traseras.png";
            break;
        case "cola":
            imagen.src = "/clinica/imagenes/VectorPerro2_cola.png";
            break;
        default:
            imagen.src = "/clinica/imagenes/VectorPerro2.png";
            break;

    }


}

//238 200

//90 67 --> 132x132

//45 70 --> 44x93

//222,156      --> 11x41
//9,68      --> 39x36
//14,102  -->32,23

//33,125        -->12,32
//20,125 -->13,21

//220,111 -->32x42

// 102,58 --> 93x11

//253,113 -->  10x33 
// 263,120-->6x20

// 111,50-->78x7

//222,93-->21x18




function escogerParte(dimensiones) {
    var x, y, resultado;
    x = dimensiones[0];
    y = dimensiones[1];
    if ((x >= 90 && x <= 222 && y >= 67 && y <= 200) ||
        (x >= 45 && x <= 90 && y >= 70 && y <= 163) ||
        (x >= 222 && x <= 233 && y >= 156 && y <= 200) ||
        (x >= 9 && x <= 48 && y >= 68 && y <= 104) ||
        (x >= 14 && x <= 46 && y >= 102 && y <= 125) ||
        (x >= 33 && x <= 46 && y >= 125 && y <= 157) ||
        (x >= 20 && x <= 33 && y >= 125 && y <= 146) ||
        (x >= 220 && x <= 252 && y >= 111 && y <= 153) ||
        (x >= 102 && x <= 195 && y >= 58 && y <= 70) ||
        (x >= 253 && x <= 263 && y >= 113 && y <= 146) ||
        (x >= 263 && x <= 270 && y >= 120 && y <= 140) ||
        (x >= 111 && x <= 189 && y >= 50 && y <= 57) ||
        (x >= 222 && x <= 243 && y >= 93 && y <= 111)) {
        resultado = "cabeza";
    }
    /* 
        140,219  -->416x175
        556,256  -->72x139
        627,313  -->33x81
        660,337  -->10x57
        670,362  -->6x32
        627,269  -->10x44
        637,276        -->8x38
        645,295-->8x19
        555,231-->30x24
        585,237-->22x19
        100,204-->173x16
        272,209-->51x9
        157,393-->235x42
        171,435-->145x32
        393,393-->48x27
        129,219-->12,141
        133,358-->8x32
        472,394-->34x11
        112,219-->18x41
        117,258-->14x22
        104,220-->11x25
        316,435-->46x19
        392,420-->46x6
        142,393-->17x29
        440,408-->14,6
        361,436-->19,9


    */
    if ((x >= 140 && x <= 556 && y >= 219 && y <= 394) ||
        (x >= 556 && x <= 628 && y >= 256 && y <= 394) ||
        (x >= 627 && x <= 660 && y >= 313 && y <= 394) ||
        (x >= 660 && x <= 670 && y >= 337 && y <= 394) ||
        (x >= 670 && x <= 676 && y >= 362 && y <= 394) ||

        (x >= 627 && x <= 637 && y >= 269 && y <= 313) ||
        (x >= 637 && x <= 645 && y >= 276 && y <= 314) ||
        (x >= 645 && x <= 653 && y >= 295 && y <= 314) ||
        (x >= 555 && x <= 585 && y >= 231 && y <= 255) ||
        (x >= 585 && x <= 607 && y >= 362 && y <= 256) ||
        (x >= 100 && x <= 273 && y >= 204 && y <= 220) ||
        (x >= 272 && x <= 323 && y >= 209 && y <= 218) ||
        (x >= 157 && x <= 392 && y >= 393 && y <= 435) ||
        (x >= 171 && x <= 316 && y >= 435 && y <= 467) ||
        (x >= 393 && x <= 441 && y >= 393 && y <= 420) ||
        (x >= 129 && x <= 141 && y >= 219 && y <= 360) ||
        (x >= 133 && x <= 141 && y >= 358 && y <= 390) ||
        (x >= 472 && x <= 506 && y >= 394 && y <= 405) ||
        (x >= 112 && x <= 130 && y >= 219 && y <= 260) ||
        (x >= 117 && x <= 131 && y >= 258 && y <= 280) ||
        (x >= 104 && x <= 115 && y >= 220 && y <= 245) ||
        (x >= 316 && x <= 362 && y >= 435 && y <= 454) ||
        (x >= 392 && x <= 438 && y >= 420 && y <= 426) ||
        (x >= 142 && x <= 159 && y >= 393 && y <= 422) ||
        (x >= 440 && x <= 454 && y >= 408 && y <= 414) ||
        (x >= 361 && x <= 380 && y >= 436 && y <= 445)

    ) {
        resultado = "tronco";
    }


    /* 510,398 -->155x63
       684,576 -->18x144
       521,461-->72x19
       540,480-->52x30
       615,461-->50x38
       684,574-->18x145
       567,509-->36x33
       607,560-->24x70
       584,541-->35x19
       650,531-->29x18
       668,549-->16x29
       674,578-->10x48
       667,693-->18x25
       700,637-->8x82
       574,677-->38x22
       607,628-->14x32

       594,660-->25x17
       560,680-->14,19
       607,461-->9x20
       595,560-->14x26
       683,558-->14x17
       528,479-->15x18
       592,461-->15x7
       552,509-->15x19
       627,499-->15x20
       603,527-->10x16
    */
    if ((x >= 510 && x <= 662 && y >= 398 && y <= 461) ||
        (x >= 684 && x <= 702 && y >= 576 && y <= 720) ||
        (x >= 521 && x <= 593 && y >= 461 && y <= 480) ||
        (x >= 540 && x <= 592 && y >= 480 && y <= 510) ||
        (x >= 615 && x <= 665 && y >= 461 && y <= 499) ||
        (x >= 684 && x <= 702 && y >= 574 && y <= 719) ||
        (x >= 567 && x <= 603 && y >= 509 && y <= 542) ||
        (x >= 607 && x <= 631 && y >= 560 && y <= 630) ||
        (x >= 584 && x <= 619 && y >= 541 && y <= 560) ||
        (x >= 650 && x <= 679 && y >= 531 && y <= 550) ||
        (x >= 668 && x <= 684 && y >= 549 && y <= 578) ||
        (x >= 674 && x <= 684 && y >= 578 && y <= 626) ||
        (x >= 667 && x <= 684 && y >= 693 && y <= 718) ||
        (x >= 700 && x <= 708 && y >= 637 && y <= 719) ||
        (x >= 574 && x <= 612 && y >= 677 && y <= 699) ||
        (x >= 607 && x <= 621 && y >= 628 && y <= 660) ||
        (x >= 594 && x <= 619 && y >= 660 && y <= 677) ||
        (x >= 560 && x <= 574 && y >= 680 && y <= 700) ||
        (x >= 607 && x <= 616 && y >= 461 && y <= 481) ||
        (x >= 595 && x <= 611 && y >= 560 && y <= 586) ||
        (x >= 683 && x <= 697 && y >= 558 && y <= 575) ||
        (x >= 528 && x <= 543 && y >= 479 && y <= 497) ||
        (x >= 592 && x <= 607 && y >= 461 && y <= 468) ||
        (x >= 552 && x <= 567 && y >= 509 && y <= 528) ||
        (x >= 627 && x <= 642 && y >= 499 && y <= 519) ||
        (x >= 603 && x <= 613 && y >= 527 && y <= 543)
    ) {
        resultado = "patas traseras";
    }







    //COLA

    /* 
         707,424-->48x17
         670,402-->21x17
         682,419-->26x9
         694,427-->14x10
         754,420-->20x8
         690,410-->10x10
         773,409-->14x12
         786,404-->16x9
         793,395-->22x10
         764,415-->13x6
         755,428-->9x6
    */
    if ((x >= 707 && x <= 755 && y >= 424 && y <= 441) ||
        (x >= 670 && x <= 697 && y >= 402 && y <= 419) ||
        (x >= 682 && x <= 708 && y >= 419 && y <= 428) ||
        (x >= 694 && x <= 708 && y >= 427 && y <= 437) ||
        (x >= 754 && x <= 774 && y >= 420 && y <= 428) ||
        (x >= 690 && x <= 700 && y >= 410 && y <= 420) ||
        (x >= 773 && x <= 787 && y >= 409 && y <= 421) ||
        (x >= 786 && x <= 802 && y >= 404 && y <= 413) ||
        (x >= 793 && x <= 815 && y >= 395 && y <= 405) ||
        (x >= 764 && x <= 777 && y >= 415 && y <= 421) ||
        (x >= 755 && x <= 764 && y >= 428 && y <= 434)

    ) {
        resultado = "cola";
    }




    //Patas delanteras

    /* 
        188,472-->33x180
        270,472-->26x250
        221,472-->50x15
        256,486-->15x51
        246,487-->10x34
        264,537-->7x104
        296,529-->7x130
        141,698-->50x25
        172,684-->32x15
        188,652-->15x32
        184,663-->6x25
        244,706-->27x31
        271,722-->18x14
        235,716-->11x21
        263,687-->8x20
        296,529-->6x121
        180,472-->9x51
    */
    if ((x >= 188 && x <= 221 && y >= 472 && y <= 652) ||
        (x >= 270 && x <= 296 && y >= 472 && y <= 722) ||
        (x >= 221 && x <= 271 && y >= 472 && y <= 487) ||
        (x >= 256 && x <= 271 && y >= 486 && y <= 537) ||
        (x >= 246 && x <= 256 && y >= 487 && y <= 521) ||
        (x >= 264 && x <= 271 && y >= 537 && y <= 641) ||
        (x >= 296 && x <= 303 && y >= 539 && y <= 659) ||
        (x >= 141 && x <= 191 && y >= 698 && y <= 723) ||
        (x >= 172 && x <= 204 && y >= 684 && y <= 699) ||
        (x >= 188 && x <= 203 && y >= 652 && y <= 684) ||
        (x >= 184 && x <= 190 && y >= 663 && y <= 688) ||
        (x >= 244 && x <= 271 && y >= 706 && y <= 737) ||
        (x >= 271 && x <= 189 && y >= 722 && y <= 736) ||
        (x >= 235 && x <= 246 && y >= 716 && y <= 737) ||
        (x >= 263 && x <= 271 && y >= 687 && y <= 707) ||
        (x >= 296 && x <= 304 && y >= 529 && y <= 650) ||
        (x >= 180 && x <= 189 && y >= 472 && y <= 523)
    ) {
        resultado = "patas delanteras";
    }


    return resultado;
}






/* --------------------------------------------------------- PARTE DEL AJAX -------------------------------------------------------------- */

var httpRequest;

function crearAjax() {
    if (window.ActiveXObject) {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        httpRequest = new XMLHttpRequest();
    }



    httpRequest.onreadystatechange = function() {
        var objeto, resultado;
        var capaInformacion = document.getElementById("informacionPerro");

        if (httpRequest.readyState == 4 && httpRequest.status == 200) {

            resultado = httpRequest.responseText;

            objeto = JSON.parse(resultado);

            //Primero borramos todos los elementos de la capa de informacion

            while (capaInformacion.firstChild) {
                capaInformacion.removeChild(capaInformacion.firstChild);
            }

            /* Añadimos los nuevos elementos. */

            for (i = 0; i < objeto.textos.length; i++) {
                crearCapa(objeto.textos[i].titulo, objeto.textos[i].contenido);
            }

            mostrarPrimero();
            cambiarPaginaTotal(objeto.textos.length);


        }
    }
}

function crearHTTP() {
    httpRequest.open("POST", "informacion.php", true);
    httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
}

function enviarHTTP(parteCuerpo) {
    parteCuerpo = encodeURIComponent(parteCuerpo);
    httpRequest.send("parte" + "=" + parteCuerpo);
}

function verInformacion(parteCuerpo) {
    crearAjax();
    crearHTTP();
    enviarHTTP(parteCuerpo);
}



/* Creamos la capa y la mostramos. */

function crearCapa(titulo, texto) {
    var capaPadre = document.getElementById("informacionPerro");
    var nodoCapaTitulo, nodoTitulo;
    var nodoCapaTexto, nodoTitulo;
    var capa = document.createElement("div");
    /* Titulo */
    nodoCapaTitulo = document.createElement("h2");
    nodoTitulo = document.createTextNode(titulo);
    nodoCapaTitulo.appendChild(nodoTitulo);

    /* Texto */
    nodoCapaTexto = document.createElement("p");
    nodoTexto = document.createTextNode(texto);

    nodoCapaTexto.appendChild(nodoTexto);


    capa.appendChild(nodoCapaTitulo);
    capa.appendChild(nodoCapaTexto);
    capa.setAttribute("class", "InfoParteCuerpo");

    capaPadre.appendChild(capa);
}


function mostrarPrimero() {

    var primeraCapa = document.getElementById("informacionPerro").firstElementChild;
    if (primeraCapa) {
        primeraCapa.style.display = "block";
    }


    //Variable global
    parteVisible = 1;
    var paginas = document.getElementById("paginas");
    paginas.style.display = "flex";
    var capa = document.getElementById("paginaActual");
    capa.textContent = parteVisible;
}

function cambiarPaginaTotal(longitud) {
    var capa = document.getElementById("paginaTotal");
    capa.textContent = longitud;
}



function cambiarPagina() {
    var capa = document.getElementById("paginaActual");
    capa.textContent = parteVisible;
}



/* JQUERY */

$(document).ready(function() {

    var longitud;

    $("#anterior").click(function() {
        longitud = document.getElementById("paginaTotal").textContent;
        if (parteVisible > 1) {
            parteVisible--;
            cambiarPagina();
            mostrarCapa(parteVisible);
        }
    });

    $("#siguiente").click(function() {
        longitud = document.getElementById("paginaTotal").textContent;

        if (parteVisible < parseInt(longitud)) {
            parteVisible++;
            cambiarPagina();
            mostrarCapa(parteVisible);
        }
    });


    /* Alineamos la capa de las paginas en el centro */

    var ancho = ($("#enfermedades").innerWidth() - $("#paginas").innerWidth()) / 2;
    $("#paginas").css({
        "left": ancho
    });




});


function mostrarCapa(nrCapa) {
    //Primero escondemos todas las capas

    $("#informacionPerro>div").hide();

    $("#informacionPerro>div:nth-child(" + nrCapa + ")").fadeIn(500);

}