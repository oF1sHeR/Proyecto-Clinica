<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/css/fontawesome/all.min.css";</style>
    <style>@import "perro.css";</style>
    <script src="perro.js"></script>
    <style>@import "/clinica/pie/piePagina.css";</style>
    

</head>
<body onload="crearAjax();">
    <?php
        include ($_SERVER['DOCUMENT_ROOT']."/clinica/cabecera.php");
    ?>

    <!-- Capa titulo -->
    <div id="titulo">
        <h1>Posibles enfermedades del Perro</h1>
    </div>
    <div id="contenido">
        <!-- CAPA DE LA IMAGEN -->
        <div id="perro" onclick="verCoordenadas(event)" onmousemove="cambiarColor(event)">
            <img id="imagenPerro" src="/clinica/imagenes/vectorPerro2.png" alt="">
        </div>

        <!-- Capa de la información -->
        <div id="enfermedades">
            <h1>Enfermedades</h1>
            <div id="informacionPerro">
            </div>
            <div id="paginas">
                <i class="fas fa-arrow-circle-left" id="anterior"></i>
                    <span id="paginaActual">0</span>
                    <span id="divisor">/</span>
                    <span id="paginaTotal">0</span>
                <i class="fas fa-arrow-circle-right" id="siguiente"></i>
            </div>
        </div>
        
    </div>
    <?php
        include ($_SERVER['DOCUMENT_ROOT']."/clinica/pie/piePagina.php");
    ?>

    
</body>
</html>