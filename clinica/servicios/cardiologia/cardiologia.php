<?php 
    include($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardiología</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "cardiologia.css";</style>
    <script src="cardiologia.js"></script>
    
</head>
<body>
    <!-- Cabecera -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

    <!-- Contenido -->

    <div>
        <div id="titulo">
            <h1>Servicio de Cardiología</h1>
        </div>
        <div id="contenido">
            <div>
                <div>
                    <p>Los problemas del corazón en perros y gatos a veces se manifiestan con cansancio, pasividad, intolerancia al ejercicio, jadeo y en algunos casos tos. Donde más se diagnostican es en animales adultos. Muchas de estas enfermedades son degenerativas, es decir, que van a ir progresando sin que podamos curarla y por lo tanto nuestro objetivo en estos pacientes es tratar que esta progresión hacia el empeoramiento sea lo más lenta posible y podamos proporcionar al animal una calidad de vida satisfactoria durante el mayor tiempo posible.</p>
                    <p>En la clínica veterinaria Zarpa ponemos a su alcance los conocimientos y los medios para diagnosticar y tratar la mayoría de las patologías del corazón para lo cual realizamos distintas pruebas.</p>
                </div>
                <img src="/clinica/imagenes/cardiologia.jpg" alt="">
            </div>
            <div id="capaLista">
                <ul>
                    <li><strong>Auscultación:</strong> es una prueba que pone de manifiesto muchos procesos cardiacos, aunque el diagnóstico debe ser siempre confirmado por otros métodos para aplicar el tratamiento adecuado.</li>
                    <li><strong>Electrocardiograma:</strong> evalúa la actividad eléctrica del corazón y con él podemos diagnosticar y tratar arritmias cardiacas.</li>
                    <li><strong>Radiografías de tórax:</strong> con ellas valoramos el grado de deformación o agrandamiento que padece el corazón cuando está enfermo y nos sirven para hacer seguimientos periódicos de esta evolución.</li>
                    <li><strong>Ecocardiografía:</strong> es una técnica muy sensible que nos permite ver el corazón y el flujo de la sangre a través de sus cámaras y grandes vasos, pudiendo además medir factores muy importantes que reflejan el tamaño de las cámaras, la calidad de la contracción, la velocidad de la sangre en algunos puntos concretos, la forma y el estado de funcionamiento de las válvulas y otros datos de interés que hacen que nuestro diagnóstico sea certero y podamos aplicar el mejor tratamiento para ese corazón.</li>
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