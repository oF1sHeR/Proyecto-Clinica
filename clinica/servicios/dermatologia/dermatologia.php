<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dermatología</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "dermatologia.css";</style>
    <script src="dermatologia.js"></script>
    
</head>
<body>
    
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

    <!-- Contenido -->
    <div id="titulo">
        <h1>Servicio de Dermatología</h1>
    </div>
    <div id="contenido">
        
        <div>
            <p>
            Los problemas dermatológicos en perros y gatos son una de las causas más frecuentes de consultas veterinarias, especialmente cuando las lesiones no desaparecen o recidivan (vuelven posteriormente) alterando la calidad de vida del paciente y del propietario.
             Existen situaciones donde los diagnósticos resultan desafiantes e incluso algunos problemas dermatológicos pueden ser la manifestación de otros problemas que involucran especialidades como la medicina interna, la oncología, la cirugía o el diagnóstico por imagen. El carácter multidisciplinar del centro permite brindar al paciente y al veterinario remisor un servicio integral.
            </p>
            <img src="/clinica/imagenes/dermatologiaPerro.jpg" alt="">
        </div>
        <div>
            <h2> Pruebas diagnósticas en dermatología</h2>
            <ul>
                <li><span><strong>Tricograma:</strong> nos da información para el diagnóstico de enfermedades como la demodicosis, dermatofitosis, infestaciones parasitarias, alopecias autoinfringidas…</span></li>
                <li><span><strong>Raspado cutáneo superficial:</strong> se utiliza en perros y gatos para buscar parásitos como Sarcoptes scabei en perros y Demodex gatoi en gatos.</span></li>
                <li><span><strong>Raspado cutáneo profundo:</strong> se utiliza para descartar la presencia de parásitos como Demodex injaii en perros y Demodex cati en gatos.</span></li>
                <li><span><strong>Cinta adhesiva con tinción:</strong> en pacientes con dermatitis descamativa para descartar o confirmar Cheyletiella y también como método para obtener una citología.</span></li>
                <li><span><strong>Citología:</strong> nos sirve para describir si una lesión (pústulas, erosiones, úlceras, fístulas, escamas,costras,tumores,etc…) es inflamatoria, neoplásica o ninguna de las dos.</span></li>
                <li><span><strong>Cultivo de dermatofitos:</strong> se utilizan ante la sospecha de una lesión provocada por hongos dermatofitos.</span></li>
                <li><span><strong>Cultivo de bacterias:</strong> en casos de piodermas u otitis externas, cuando las infecciones son recurrentes o cuando aparecen resistencias a los antibióticos más utilizados.</span></li>
                <li><span><strong>Test de alergias e hiposensibilización:</strong> Se utilizan en animales con alergias ambientales o atopias, cuyo signo principal es el picor.</span></li>
            </ul>
        </div>
    </div>
    <video autoplay muted loop>
        <source src="/clinica/videos/dermatologiaPerro.mp4" type="video/mp4">
    </video>

    <!-- Pie  -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>