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

            var select = document.getElementById("horas");
            while (select.firstChild) {
                select.removeChild(select.firstChild);
            }
            for (var i = 0; i < objeto.horas.length; i++) {
                select.appendChild(crearOptionSelect(objeto.horas[i]));
            }
        }
    }
}

function crearHTTP() {
    httpRequest.open("POST", "hora.php", true);
    httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
}

function enviarHTTP(servicio, fecha) {
    fecha = encodeURIComponent(fecha);
    servicio = encodeURIComponent(servicio);
    httpRequest.send("servicio" + "=" + servicio + "&fecha=" + fecha);
}

function seleccionarOpcion(select) {
    if (select = "servicios") {
        var opcion = document.getElementById("servicios").options[document.getElementById("servicios").selectedIndex].value;
        return opcion;
    }
}

function verHoras() {
    var horario = seleccionarOpcion("servicios");
    var fecha = document.getElementById("fechaSeleccionada").value;
    crearAjax();
    crearHTTP();
    enviarHTTP(horario, fecha);
}

function crearOptionSelect(valor) {
    var opcion;

    opcion = document.createElement("option");
    opcion.setAttribute("value", valor);
    var texto = document.createTextNode(valor);
    opcion.appendChild(texto);

    return opcion;
}