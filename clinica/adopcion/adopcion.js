function recogerPagina() {

    //Sacamos la parte de variables de la url.
    const queryString = window.location.search;

    //Creamos el objeto de parametros
    const urlParams = new URLSearchParams(queryString);

    //Sacamos la variable pagina con el método get.
    const pagina = urlParams.get('pagina');


    return pagina;
}

function paginasTotales() {
    const pagTotales = +document.getElementById("pagTotal").value;
    return pagTotales;
}




//Constante de la página actual.



$(document).ready(function() {
    var pagTotales = paginasTotales();
    var paginaActual = recogerPagina();
    var anterior = document.getElementById("anterior");
    var siguiente = document.getElementById("siguiente");
    if (paginaActual == 1 || paginaActual === null) {
        anterior.className = "disabled";
    }

    if (paginaActual == pagTotales || pagTotales == 1) {
        siguiente.className = "disabled";
    }
    //Cuando pulsamos sobre cualquier numPagina, volvemos a calcular el numPagina

    $(".numPagina").click(function() {
        var pagTotales = paginasTotales();
        var paginaActual = recogerPagina();
        if (paginaActual == 1) {
            asignarDisabled(anterior);
        } else {
            asignarClase(anterior);
        }

        if (paginaActual >= pagTotales) {
            asignarDisabled(siguiente);
        } else {
            asignarClase(siguiente);
        }

    });

    $("#siguiente").click(function() {
        siguiente();
    });

    $("#anterior").click(function() {
        anterior();
    });


    //Cambiamos de color la pagina actual

    $("#paginas a").each(function() {
        if ($(this).text() == paginaActual) {
            $(this).css({
                "background-color": "#05807d",
                "color": "white",
                "border": "1px solid white"
            });
        }
    });

    //Si acabamos de entrar en adopción, ponemos la primera pagina como marcada
    if (paginaActual === null) {
        $("#paginas a").each(function() {
            if ($(this).text() == "1") {
                $(this).css({
                    "background-color": "#05807d",
                    "color": "white",
                    "border": "1px solid white"
                });
            }
        })
    }


    //Hacemos que aparezca la capa.



});


function asignarDisabled(elemento) {
    elemento.className = "disabled";
}

function asignarClase(elemento) {
    elemento.className = "numPagina";
}

function siguiente() {
    paginaActual = recogerPagina() + 1;
}

function anterior() {
    paginaActual = recogerPagina() - 1;
}





/* AJAX */
var httpRequest;

function crearAjax() {
    if (window.ActiveXObject) {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        httpRequest = new XMLHttpRequest();
    }



    httpRequest.onreadystatechange = function() {
        var objeto, resultado;
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {

            resultado = httpRequest.responseText;
            objeto = JSON.parse(resultado);

            //Lo que queremos que realice. /////////////////////////////////////////////////////
            crearCapa(objeto.Nombre, objeto.Tipo, objeto.Sexo, objeto.Edad, objeto.raza, objeto.Ubicacion, objeto.telefono, objeto.DESCRIPCION, objeto.Imagen);

            ////////////////////////////////////////////////////////////////////////////////////
        }
    }
}

function crearHTTP() {
    httpRequest.open("POST", "datosAnimal.php", true);
    httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
}

function enviarHTTP(animal) {
    animal = encodeURIComponent(animal);
    httpRequest.send("animal=" + animal);
}



function enviarAnimal(elemento) {
    var animal = elemento.getAttribute("value");
    crearAjax();
    crearHTTP();
    enviarHTTP(animal);
}


// , tipo, sexo, edad, raza, descripcion, imagen, ubicacion, telefono

function crearCapa(nombre, tipo, sexo, edad, raza, ubicacion, telefono, descripcion, imagen) {
    /* Capa general que contiene toda la informacion */
    var capaGeneral = document.createElement("div");
    capaGeneral.setAttribute("id", "Informacion");

    /* Capa dentro de información que contendrá parte de la información */
    var capaPadre = document.createElement("div");
    capaPadre.setAttribute("id", "contenido");

    /* Titulo y contenido de la información. Irán en pareja dentro de una capa. */
    var capaPareja;

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    var titulo, contenido;



    var capaImagen = document.createElement("div");
    var capaTexto = document.createElement("div");
    capaTexto.setAttribute("id", "capaTexto");

    //////////////////////////// Nombre ////////////////////////////
    titulo = document.createElement("h4");
    contenido = document.createElement("span");

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    titulo.textContent = "Nombre:";
    contenido.textContent = nombre;

    capaPareja.appendChild(titulo);
    capaPareja.appendChild(contenido);
    capaTexto.appendChild(capaPareja);

    ////////////////////////////    Tipo     ////////////////////////////
    titulo = document.createElement("h4");
    contenido = document.createElement("span");

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    titulo.textContent = "Tipo:";
    contenido.textContent = tipo;

    capaPareja.appendChild(titulo);
    capaPareja.appendChild(contenido);
    capaTexto.appendChild(capaPareja);


    ////////////////////////////  Sexo    ////////////////////////////
    titulo = document.createElement("h4");
    contenido = document.createElement("span");

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    titulo.textContent = "Sexo:";
    contenido.textContent = sexo;

    capaPareja.appendChild(titulo);
    capaPareja.appendChild(contenido);
    capaTexto.appendChild(capaPareja);



    ////////////////////////////     Edad   ////////////////////////////
    titulo = document.createElement("h4");
    contenido = document.createElement("span");

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    titulo.textContent = "Edad:";
    contenido.textContent = edad;

    capaPareja.appendChild(titulo);
    capaPareja.appendChild(contenido);
    capaTexto.appendChild(capaPareja);



    ////////////////////////////    Raza    ////////////////////////////

    titulo = document.createElement("h4");
    contenido = document.createElement("span");

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    titulo.textContent = "Raza:";
    contenido.textContent = raza;



    capaPareja.appendChild(titulo);
    capaPareja.appendChild(contenido);
    capaTexto.appendChild(capaPareja);


    ////////////////////////////    Ubicacion    ////////////////////////////
    titulo = document.createElement("h4");
    contenido = document.createElement("span");

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    titulo.textContent = "Ubicación:";
    contenido.textContent = ubicacion;


    capaPareja.appendChild(titulo);
    capaPareja.appendChild(contenido);
    capaTexto.appendChild(capaPareja);



    ////////////////////////////    Telefono    ////////////////////////////
    titulo = document.createElement("h4");
    contenido = document.createElement("span");

    capaPareja = document.createElement("div");
    capaPareja.className = "pareja";

    titulo.textContent = "Teléfono:";
    contenido.textContent = telefono;


    capaPareja.appendChild(titulo);
    capaPareja.appendChild(contenido);
    capaTexto.appendChild(capaPareja);


    ////////////////////////////        ////////////////////////////

    var foto = document.createElement("img");
    foto.src = imagen;

    capaImagen.appendChild(foto);

    capaPadre.appendChild(capaImagen);
    capaPadre.appendChild(capaTexto);
    //////////////////////////////////////////////////// Boton Salida //////////////////////////////////////////////////////
    var botonSalida = crearBotonSalida();

    capaPadre.appendChild(botonSalida);

    capaPadre.style.display = "none";

    $(capaPadre).fadeIn(500);


    capaGeneral.appendChild(capaPadre);
    document.body.appendChild(capaGeneral);



    ////////////////////////////    Descripcion    ////////////////////////////
    var capaDescripcion = document.createElement("div");

    titulo = document.createElement("h4");
    contenido = document.createElement("p");
    contenido.className = "descript";
    titulo.textContent = "Descripción:";
    contenido.textContent = descripcion;

    capaDescripcion.appendChild(titulo);
    capaDescripcion.appendChild(contenido);
    capaDescripcion.className = "capaDescripcion";

    capaGeneral.appendChild(capaDescripcion);
    ////////////////////////////////////////////////////////////////////////////////////
    centrarCapa();

}

function centrarCapa() {
    var capa = document.getElementById("Informacion");

    var anchura = $("#Informacion").width();

    capa.style.left = (window.innerWidth / 2) - (anchura) / 2 + "px";
}

function crearBotonSalida() {
    var salida = document.createElement("button");
    salida.setAttribute("id", "salida");
    salida.textContent = "X";

    salida.addEventListener("click", eliminarCapaAnimal);

    return salida;
}


function eliminarCapaAnimal() {

    var capaAEliminar = document.getElementById("Informacion");

    document.body.removeChild(capaAEliminar);
}