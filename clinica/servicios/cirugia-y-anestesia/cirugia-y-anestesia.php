<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cirugía y Anestesia</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "cirugia-y-anestesia.css";</style>
    <script src="cirugia-y-anestesia.js"></script>
    
</head>
<body>
    
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

    <!-- Titulo -->

    <div id="titulo">
        <h1>Servicio de Cirugía y Anestesia</h1>
    </div>
    <!-- Contenido -->
    
    <div id="contenido">
        <div>
            <div>
                <p>
                    Contamos con unas instalaciones inmejorables para la práctica quirúrgica en condiciones de esterilidad con monitorización completa y contínua del paciente.
                    Quirófano completo con equipo de anestesia inhalatoria, respirador artificial, monitor multiparamétrio, electrobisturí, sellador vascular, laser de CO2, todo ello encaminado a realizar una CIRUGIA SIN SANGRADO Y SIN DOLOR CON TÉCNICAS DE MÍNIMA INVASIÓN.
                </p>
                <p>
                    Empleamos los analgésicos de una manera que se conoce con el nombre de analgesia multimodal, que quiere decir que se emplean muchos fármacos que actúan a distintos niveles del sistema nervioso para evitar el dolor, esto aporta grandes ventajas ya que utilizamos menos dosis de cada uno de ellos, reduciendo sus efectos secundarios y aprovechamos a la vez, que el uso de varios analgésicos potencian su acción para reducir aún más la sensación dolorosa.
                    El uso de estas combinaciones de fármacos siempre es concreta para cada paciente en función del tipo de cirugía y sobre todo del estado médico del mismo.
                </p>
                <p>
                    También utilizamos técnicas de mínima invasión que implica menos dolor y tecnología que ayuda a que la intervención sea menos traumática y por tanto menos dolorosa.
                    Realizamos dos grandes grupos de cirugías: traumatología y general o de tejidos blandos.
                </p>
            </div>
            <ul>
                <li><span><strong>Traumatología: </strong>Resolvemos las fracturas estudiando cada caso y empleando la técnica más adecuada para ese problema concreto.</span></li>
                <li><span><strong>General o de tejidos blandos: </strong> Aquí englobamos todo tipo de cirugías que no tienen que ver con el sistema locomotor. Muchas de estas técnicas están relacionadas con el aparato reproductor (esterilizaciones, cesáreas, piómetras), aunque también son muy frecuentes las intervenciones que tienen que ver con procesos tumorales, problemas intestinales como obstrucciones, con procesos en los riñones y vejiga urinaria (cálculos) o con hígado y vesícula biliar.</span></li>
            </ul>
        </div>

        <div>
            <h2>Fases de la cirugía</h2>
            <div>
                <img src="/clinica/imagenes/perro-feliz.jpg" alt="">
                <ul>
                    <li><span><strong>Fase 1: Chequeo preoperatorio.</strong>Realizamos una exploración física general y analítica sanguínea. Además, en los casos de pacientes geriátricos o de mayor riesgo completamos con radiografía y/ ecocardiografía.</span></li>
                    <li><span><strong>Fase 2: Anestesia.</strong>Monitoreamos durante toda la cirugía los diferentes niveles de presión arterial, frecuencia cardiaca y respiratoria, la temperatura corporal y el nivel de oxígeno.</span></li>
                    <li><span><strong>Fase 3: Control del dolor. </strong>Se establecen protocolos analgésicos de manera individualizada en función del tipo de cirugía. Se establece un protocolo intraoperatorio y se prescribe un plan adecuado para los días posteriores a la intervención.</span></li>
                    <li><span><strong>Fase 4: Cuidado postoperatorio.</strong>Una vez concluida la cirugía, el paciente pasa a la zona de hospitalización para que se recupere en una ambiente tranquilo, ya que después de una intervención los pacientes tienen hipersensibilidad a los estímulos lumínicos y sonoros. El personal auxiliar controla en todo momento al paciente asegurándose de que se recupera correctamente de la intervención.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pie  -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>