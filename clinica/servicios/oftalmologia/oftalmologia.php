<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oftalmología</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "oftalmologia.css";</style>
    <script src="oftalmologia.js"></script>
    
</head>
<body>
    <!-- Cabecera -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

    <!-- Contenido -->
    <div id="titulo">
        <h1>Servicio de Oftalmología</h1>
    </div>
    <div id="contenido">
        <div>
            <div>
                <p>La oftalmología como especialidad veterinaria abarca el diagnóstico y tratamiento de las patologías tanto del globo ocular como del sistema lacrimal y párpados, así como de la musculatura ocular de los animales.</p>
                <p>Disponemos de equipamiento para examinar las distintas estructuras oculares de tu mascota y así poder llegar a un diagnóstico certero y realizar los tratamientos médicos y/o quirúrgicos necesarios para preservar la visión y el buen estado de estos delicados órganos.</p>
                <p>Para determinar si tu mascota padece algún tipo de enfermedad ocular realizamos un examen específico haciendo uso de equipamiento especializado que nos permita detectar la patología de tu animal.</p>
                <p>El ojo es un órgano complejo compuesto por tejidos y estructuras específicas que requieren del uso de equipo técnico especializado. Gracias a ello logramos ofrecer un diagnóstico ágil y preciso que se traduzca en un tratamiento efectivo para resolver los problemas oculares de tu mascota.</p>
            </div>
            <img src="/clinica/imagenes/perroGafas.jpg" alt="">
        </div>
        <div>
            <h2>¿Qué signos nos pueden ayudar a saber que nuestro animal tiene un problema en los ojos y necesita que lo vea el veterinario?</h2>
            <div>
                <img src="/clinica/imagenes/perroGafas2.jpg" alt="">
                <ul>
                    <li>Se rasca mucho los ojos o se frota contra diferentes objetos (el sofá, nuestra pierna…).</li>
                    <li>Tiene el ojo enrojecido o azulado.</li>
                    <li>Tiene un ojo más grande o más pequeño (incluso desde cachorro).</li>
                    <li>Se despierta con muchas legañas y hay que limpiarle el ojo varias veces al día.</li>
                    <li>Le lloran mucho los ojos.</li>
                    <li>Le ha salido una manchita marrón o rosada en el ojo y parece que está creciendo.</li>
                    <li>Crees que tu animal ha perdido visión (le cuesta seguir la pelota cuando juegas con él, se choca cuando va por sitios nuevos…) de forma progresiva o repentina.</li>
                    <li>Te parece que tu mascota tiene cataratas.</li>
                    <li>Tiene fotofobia o sensibilidad a la luz</li>   
                    <li>Sufre estrabismo</li>
                </ul>
            </div>
        </div>
        <div>
            <h2>Enfermedades oculares más comunes en mascotas</h2>
            <div>
                <ul>
                    <li><strong>Conjuntivitis:</strong>Inflamación de la membrana conjuntiva que recubre la esclera (parte blanca del ojo) y se caracteriza por producir enrojecimiento y secreciones oculares.</li>
                    <li><strong>Prolapso de la glándula lacrimal del tercer párpado u “ojo cherry”:</strong> Aparición de un bulto parecido al de una cereza en el borde interno del ojo, por la salida al exterior de la glándula lacrimal debido a la debilidad del tercer párpado del paciente. Suele producirse con mayor frecuencia en cachorros y en la práctica totalidad de los casos la única alternativa existente ante ella es quirúrgica.</li>
                    <li><strong>Cataratas:</strong> Se producen por una progresiva pérdida de transparencia del cristalino que se va tornando opaco hasta producir una ceguera total en el paciente. Puede detectarse observando manchas blanquecinas o azuladas sobre la pupila de nuestra mascota.</li>
                    <li><strong>Queratitis:</strong> También conocida como nube en el ojo. Se origina por la inflamación de la córnea que provoca que esta se nuble y pierda transparencia. Se caracteriza por intenso lagrimeo, fotofobia y aparición de prolapso del tercer párpado u “ojo cherry”.</li>
                    <li><strong>Úlceras corneales:</strong>Tiene su origen en una acumulación anormal de humor acuoso (líquido transparente presenten en el interior del ojo, cuya función es la de nutrir y oxigenar a la córnea y al cristalino). Esto incrementa la presión intraocular, pudiendo producir lesiones en el nervio óptico y la retina y terminar provocando ceguera.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pie  -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT']. "/clinica/pie/piePagina.php");
    ?>
</body>
</html>