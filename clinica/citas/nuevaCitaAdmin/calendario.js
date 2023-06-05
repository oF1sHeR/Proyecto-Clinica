//Array de los meses.
var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

//Variables globales. Utilizadas para identificar la fecha;

var fechaHoy = new Date();
var diaHoy = fechaHoy.getDate();
var mesHoy = fechaHoy.getMonth();
var anioHoy = fechaHoy.getFullYear();

var fechaGlobal = new Date();
var dia = fechaGlobal.getDate();
var mes = fechaGlobal.getMonth();
var anio = fechaGlobal.getFullYear();



function cargarFecha() {

    /*Variables para identificar en el DOM los elementos*/
    var month = document.getElementById("month");
    var year = document.getElementById("year");

    /*Variable utilizada para añadir el texto a los DIVS*/



    /*Añadimos el año y el mes actual*/
    /* En el caso del mes, recogemos en el array el numero del més que tendrá un valor String, que será el que introduzcamos en el DOM */

    year.textContent = anio.toString();
    month.textContent = meses[mes];
    escribirMes();

    escogerDia();


}

/* Función utilizada para conocer si el año introducido por parámetro es bisiesto o no. */
function esBisiesto(anio) {
    if ((anio % 4 == 0) && (anio % 100 != 0) || (anio % 400 == 0)) {
        return true;
    } else {
        return false;
    }
}

/* Función utilizada para conocer que día de la semana es el día 1 */

function diaUno() {
    var month = mes;
    var year = anio;

    var diaUno = new Date(year, month, 1);


    //Al ser un calendario Anglosajon, debemos tener en cuenta de que 0 es domingo y 1 lunes. Por lo que tenemos que modificar eso.
    if (diaUno.getDay() - 1 == -1) {
        return 6;
    } else {
        return (diaUno.getDay() - 1);
    }

}

/* FUnción que nos devolverá el día posterior al último. */
function ultimoDia() {
    var month = mes;
    var year = anio;

    var ultimoDia = new Date(year, month + 1, 0);


    return ultimoDia.getDay();
}

/* Función que nos indicará el mes anterior al actual. Hay que tener en cuenta si el mes es Enero, para que el anterior sea diciembre y restemos un año */
function mesAnterior() {
    var month = mes;
    var year = anio;


    if (month != 0) {
        month--;
    } else {
        month = 11;
        year--;
    }

    nuevaFecha(month, year);
    escogerDia();
}

/* Función que nos indicará el mes siguiente al actual. Hay que tener en cuenta si el mes es Diciembre, para que el siguiente sea Enero y sumemos un año. */
function mesSiguiente() {
    var month = mes;
    var year = anio;

    if (month != 11) {
        month++;
    } else {
        month = 0;
        year++;
    }
    nuevaFecha(month, year);
    escogerDia();
}


/* Función utilizada para cargar la nueva fecha en el calendario al desplazarnos. */
function nuevaFecha(m, y) {
    var month = document.getElementById("month");
    var year = document.getElementById("year");

    fechaGlobal.setFullYear(y, m, dia);
    year.textContent = y;
    month.textContent = meses[m];

    anio = y;
    mes = m;
    borrarMes();
    escribirMes();
}
/* Función empleada para sacar los días de cada mes, teniendo en cuenta los años bisiestos. */
function totalDias(mes) {
    if (mes == 0 || mes == 2 || mes == 4 || mes == 6 || mes == 7 || mes == 9 || mes == 11 || mes == -1) {
        return 31;
    } else if (mes == 3 || mes == 5 || mes == 8 || mes == 10) {
        return 30;
    } else {
        if (esBisiesto(anio)) {
            return 29;
        } else {
            return 28;
        }
    }
}

/* Función empleada para rellenar el calendario */
function escribirMes() {
    var texto;
    var elemento;
    var i;

    var dias = document.getElementById("dias");

    for (i = diaUno(); i > 0; i--) {
        elemento = document.createElement("div");
        texto = document.createTextNode(totalDias(mes - 1) - (i - 1));
        elemento.setAttribute("class", "dayPrevMonth");
        elemento.appendChild(texto);
        dias.appendChild(elemento);

    }
    for (i = 1; i <= totalDias(mes); i++) {
        elemento = document.createElement("div");
        texto = document.createTextNode(i);
        if (i == diaHoy && mes == mesHoy && anio == anioHoy && !verDiaFinde(i, mes, anio)) {
            elemento.setAttribute("class", "today");
        } else if ((i < diaHoy && mes <= mesHoy && anio <= anioHoy) || (mes < mesHoy && anio <= anioHoy) || (anio < anioHoy)) {
            elemento.setAttribute("class", "diasAnteriores");
        } else {
            if (verDiaFinde(i, mes, anio)) {
                elemento.setAttribute("class", "diaFinde");
            } else {
                elemento.setAttribute("class", "day");
            }
        }
        elemento.appendChild(texto);
        dias.appendChild(elemento);
    }

    if (ultimoDia() != 0) {
        for (i = 1; i < 7 - ultimoDia() + 1; i++) {
            elemento = document.createElement("div");
            elemento.setAttribute("class", "dayPrevMonth");
            texto = document.createTextNode(i);
            elemento.appendChild(texto);
            dias.appendChild(elemento);
        }
    }
}
/* Función empleada para limpiar el calendario. Se utiliza para poder cambiar de mes. */
function borrarMes() {
    var dias = document.getElementById("dias");
    while (dias.firstChild) {
        dias.removeChild(dias.firstChild);
    }
}


function verContenido(objeto) {
    var contenido = objeto.textContent;
    if (+contenido < 10) {
        contenido = "0" + contenido;
    }

    var year = anio;
    var month = mes + 1;
    if (+month < 10) {
        month = "0" + month;
    }
    document.getElementById("fechaSeleccionada").value = year + "-" + month + "-" + contenido;
    var fechaDefinitiva = document.getElementById("fechaSeleccionada").value;
    return fechaDefinitiva;
}




function escogerDia() {
    var nodos = document.getElementsByClassName("day");
    var diaActual = document.getElementsByClassName("today");


    for (var j = 0; j < nodos.length; j++) {
        nodos[j].addEventListener("click", function() {
            verContenido(this);
        }, false);
    }
    if (diaActual.length > 0) {
        diaActual[0].addEventListener("click", function() {
            verContenido(this);
        }, false);
    }
}

function verDiaFinde(day, month, year) {
    var esFinde = false;

    var fechaFinde = new Date(year, month, day);

    if (fechaFinde.getDay() == 0 || fechaFinde.getDay() == 6) {
        esFinde = true;
    } else {
        esFinde = false;
    }

    return esFinde;
}











//Añadimos el evento click para seleccionar el dia
/*
$(document).ready(function() {
    $(".day").on('click', function() {
        alert($(this).text());
    });
});
*/