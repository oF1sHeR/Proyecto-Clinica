
<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neurología</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "neurologia.css";</style>
    <script src="neurologia.js"></script>
    
</head>
<body>

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

    <!-- Contenido -->
    <div id="titulo">
        <h1>Servicio de Neurología</h1>
    </div>
    <div id="contenido">
        <div>
            <div>
                <p>
                    La neurología veterinaria se centra en curar aquellas enfermedades o problemas que afectan el sistema nervioso de perros y gatos. El sistema nervioso lo forman la médula espinal, nervios hasta las estructuras contenidas dentro del cráneo.
                </p>
                <p>Son muchas las enfermedades que afectan a nuestros peludos que pueden dañar esas zonas.</p>
                <p>
                    Contar con un especialista en neurología veterinaria que sea capaz de diferenciar el origen, seleccionar las pruebas más adecuadas y el tratamiento indicado es imprescindible para llegar a buen puerto.
                </p>
                <p>Nuestros especialistas neuro veterinarios te ayudarán a resolver cualquier problema neurológico de manera multimodal ya que estudiamos al animal como un todo y abordamos el problema desde un punto de vista médico, quirúrgico o fisioterapéutico.
                    Al ser uno de los pocos centros neurológicos veterinarios que ofrecemos este servicio de neurología nos hemos especializado para ofrecer la mejor solución a los problemas que pueda tener tu peludo.
                </p>
            </div>
            <img src="/clinica/imagenes/neurologia.jpg" alt="">
        </div>
        <div>
            <img src="/clinica/imagenes/perros.jpg" alt="">
            <div>
                <h2>¿En qué casos mi peludo necesita un neurólogo veterinario?</h2>
                <p>Como ya hemos mencionado, son muchas las enfermedades que pueden necesitar de un neurología veterinaria para poder subsanar problemas en el sistema nervioso.</p>
                <ul>
                    <li><span>Hernias de disco</span></li>
                    <li><span>Subluxaciones vertebrales</span></li>
                    <li><span>Problemas de inervación</span></li>
                    <li><span>Problemas infecciosos</span></li>
                    <li><span>Problemas vasculares</span></li>
                </ul>
                <p>Todas y cada una de ellas requerirán de un análisis previo por parte de un neurólogo especialista que evaluará a tu peludo y que decida qué tratamiento de neurología veterinaria va a necesitar. En función del diagnóstico y tratamiento abordaremos la dolencia de tu peludo para solucionar el problema y mejorar su calidad de vida.</p>
            </div>
        </div>
        
    </div>

    <!-- Pie  -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>