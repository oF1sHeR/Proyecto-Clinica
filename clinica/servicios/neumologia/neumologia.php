<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neumología</title>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "neumologia.css";</style>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <script src="neumologia.js"></script>
    
</head>
<body>
    <!-- Cabecera -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>

    <!-- Contenido -->
    <div id="titulo">
        
            <h1>SERVICIO DE NEUMOLOGÍA VETERINARIA</h1>
        
    </div>
    <video autoplay muted loop>
        <source src="/clinica/videos/respiracionPerro2.mp4" type="video/mp4">
    </video>

    <div id="capaFueraVideo">
    
        <div id="capaTexto">
            
            <p>
                La <strong>neumología</strong> es la  <i>especialidad médica</i>  encargada del estudio de las enfermedades del aparato respiratorio.
                El <strong>neumólogo</strong> es el médico entrenado para el diagnóstico y tratamiento de tales enfermedades respiratorias.
                Los principales signos por los que un paciente requiere revisión por problemas respiratorios son:
            </p>
            
            <ul>
                <li><i class="fas fa-paw"></i> Dificultad respiratoria</li>
                <li><i class="fas fa-paw"></i> Tos crónica</li>
                <li><i class="fas fa-paw"></i> Desmayos</li>
                <li><i class="fas fa-paw"></i> Debilidad</li>
                <li><i class="fas fa-paw"></i> Problemas para deglutir</li>
                <li><i class="fas fa-paw"></i> Preanestésica o preoperatoria</li>
            </ul>
            
        </div>
        <div id="capaVertical"></div>
        <div id="capaImagen">
            <img src="/clinica/imagenes/respiracionPerro2.jpg" alt="Doctora y perro">
        </div>
    
    </div>
    

    <!-- Pie  -->

    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>