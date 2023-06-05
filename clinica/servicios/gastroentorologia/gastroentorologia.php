<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastroenterología</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "gastroentorologia.css";</style>
    <script src="gastroentorologia.js"></script>
    
</head>
<body>
    <!-- Cabecera -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

   

    <div id="titulo">
        <h1>Servicio de Gastroenterología</h1>
    </div>

    <div id="contenido">
        <div>
            <div>
                <h2>¿Qué es la gastroenterología veterinaria?</h2>
                <p>Esta especialidad es la rama encargada de los problemas del aparato digestivo en animales. Más allá de los vómitos y diarreas hay que saber identificar cuándo se requiere un estudio especializado del aparato digestivo, que muchas veces incluye la toma de muestras para posterior análisis y diagnóstico del animal.</p>
                <p>En nuestro Servicio de Gastroenterología, queremos ofrecer un enfoque diagnóstico integral, muy interrelacionado con la la Medicina Interna porque a veces detrás de una sintomatología de vómitos y diarreas, no siempre hay un proceso gastroentérico, sino que se trata de una enfermedad sistémica (endocrina, renal etc..) que produce esos síntomas.</p>
                <p>Una vez confirmado, que si se trata de una patología gastroentérica, ya enfocamos el caso, con nuestros medios diagnósticos del servicio, entre los que destaca, la endoscopia, mediante la cual , de forma no invasiva, podemos llegar a un diagnóstico preciso, mediante la toma de biopsias, citologías o muestras para cultivo.</p>
            </div>
            <img src="/clinica/imagenes/gastroenterologia.jpg" alt="">
        </div>
        <div>
            <h2>Entre los procedimientos que realizamos en nuestro servicio de Gastroenterología y Endoscopia, cabe destacar los siguientes:</h2>
            <ul>
                <li><span>Esofagoscopia</span></li>
                <li><span>Gastroduodenoscopia</span></li>
                <li><span>Colonoscopia</span></li>
                <li><span>Biopsias endoscopicas</span></li>
                <li><span>Extracción de cuerpos extraños  gástricos y esofágicos.</span></li>
                <li><span>Gastrostomía endoscópica percutánea (GEP)</span></li>
                <li><span>Estudios Radiológicos de contraste.</span></li>
                <li><span>Ecografía Abdominal</span></li>
            </ul>
        </div>
    </div>

    <!-- Pie  -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>