<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oncología</title>
    <style>@import "/clinica/css/bootstrap-grid.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "oncologia.css";</style>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <script src="oncologia.js"></script>
    
</head>
<body>
    <!-- Cabecera -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

    <!-- Contenido -->

    
    <div id="titulo">
        
            <h1>SERVICIO DE ONCOLOGÍA VETERINARIA</h1>
        
    </div>
    

    <div id="capa1">
        <div id="capaVertical"></div>
        <div id="capaTexto">
            
            <p>
                Por desgracia el cáncer también afecta a nuestros animales de compañía, para lo que es fundamental el diagnóstico precoz, un buen tratamiento quirúrgico y quimioterapia si fuera necesaria.
            </p>
            <p>
                La citología es una técnica rápida, sencilla y no invasiva que en muchas ocasiones es suficiente para diagnosticar nódulos o masas, lo que nos resulta muy útil para un diagnóstico rápido. Consiste en una punción para obtener células que luego extenderemos para poder observarlas al microscopio.
            </p>
            <p>
                Existen protocolos de quimioterapia adaptados a animales, pero a pesar de haber ciertos efectos secundarios, nunca son tan marcados como en humanos ya que se ajustan las dosis para conseguir una buena calidad de vida mientras dura el tratamiento.
            </p>
            
            
            
        </div>
        
        <div id="capaImagen">
            <img src="/clinica/imagenes/oncologia.jpg" alt="Doctora y perro">
        </div>
    
    </div>
    <div id="capa2" class="container">
        <div class="row">
            <div class="col-4">
                <h2>Diagnóstico</h2>
                <p>Cada tumor es diferente y único. Lo primero que debemos hacer es ponerle un nombre a ese tumor. Esto solo es posible mediante una citología o una biopsia.</p>
                <p>Citología: se trata de una técnica muy poco invasiva sin apenas molestia para el paciente. Solo en algunos casos en los que los tumores están en zonas de difícil acceso se necesita una ligera sedación del mismo. La cantidad de muestra obtenida mediante esta técnica en ocasiones no es suficiente para llegar a un diagnóstico definitivo.</p>
                <p>Biopsia: en aquellos casos en los que la citología no es suficiente para alcanzar un diagnóstico definitivo necesitaremos una mayor cantidad de muestra, obtenida mediante biopsia. Esta técnica requiere una ligera anestesia del paciente en muchos de los casos.</p>
                <p>Una vez obtenida la muestra podemos determinar a qué tipo de tumor nos enfrentamos y enfocar el estadiaje (hasta donde se ha diseminado el tumor) y tratamiento más adecuado para cada caso.</p>
            </div>
            <div class="col-4">
                <h2>Preguntas que surgen cuando han diagnosticado a mi mascota de cáncer</h2>
                <ul>
                    <li>¿Qué tipo de tumor tiene mi mascota?</li>
                    <li>¿Se trata de un tumor benigno o maligno?</li>
                    <li>¿Con qué frecuencia metastatiza este tumor?</li>
                    <li>Si no lo trato, ¿qué evolución espero en mi mascota?</li>
                    <li>¿Qué pruebas diagnósticas necesitamos para determinar localización y extensión del tumor?</li>
                    <li>¿Cuáles son todas las opciones terapéuticas? ¿Qué ventajas e inconvenientes presenta cada una de las opciones? ¿Qué coste tienen? ¿Tienen efectos secundarios?</li>
                    <li>¿Tiene dolor mi mascota? ¿Cómo lo tratamos frente a ese dolor?</li>
                    <li>¿Cuándo debemos emplear estimulantes del apetito?</li>
                </ul>
                <p>En <strong>Deja Huella</strong> contestamos a todas estas preguntas y te explicamos que esperar del proceso en cada momento.</p>
            </div>
            <div class="col-4">   
                <h2>Nuestros objetivos</h2>
                <p>Tratamos esta enfermedad con todas las opciones posibles que tengamos a nuestra disposición, dando prioridad a mejorar la calidad de vida del paciente.</p>
                <p>Tratamos todas las necesidades del paciente, no solo el cáncer.</p>
                <p>Necesitamos y queremos una participación activa de los propietarios de nuestros pacientes, tanto en el proceso del diagnóstico como del tratamiento. Tú eres uno más de nuestro equipo.</p>
            </div>
        </div>
    </div>
    

    <!-- Pie  -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>