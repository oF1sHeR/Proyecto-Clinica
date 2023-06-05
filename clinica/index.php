
<?php 
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>
        @import "/clinica/css/cabecera.css";
    </style>
    <style>@import "/clinica/css/index.css";</style>
    
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    
    <script src="index.js"></script>
    <style>@import "/clinica/pie/piePagina.css";</style>
    
    
</head>

<body>
    <!-- Cabecera -->
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>


    <!-- Imagenes-->
    <div id="imagenes">
       <ul class="slider">
            <li>
                <img src="/clinica/imagenes/fondo1.jpg" alt="">
                <div class="caption">
                    <h1>Conócenos mejor</h1>
                    <p>
                        En la Clínica Veterinaria «Deja Huella» contamos con un equipo de profesionales veterinarios, humanos, solidarios y amantes de los animales.
                        Nuestras instalaciones cuentan con dos entradas independientes para perros y gatos, aunque también tratamos animales exóticos.
                    </p>
                </div>
            </li>
            <li>
                <img src="/clinica/imagenes/fondo2.jpg" alt="">
                <div class="caption">
                    <h1>Nuestros logros</h1>
                    <p>Este establecimiento veterinario ha sido reconocido recientemente como «Clínica amable con los gatos».
                        Además de otros reconocimientos anteriores como «Clínica amable con los perros» y «Grandes amigos de los animales exóticos»
                    </p>
                </div>
            </li>
            <li>
                <img src="/clinica/imagenes/fondo3.jpg" alt="">
                <div class="caption">
                    <h1>Nuestras instalaciones</h1>
                    <p>
                        El centro cuenta con instalaciones totalmente equipadas con laboratorio propio, radiografía digital y ecógrafo, entre otros, para poder diagnosticar de una forma rápida y eficaz a su mascota.
                        También contamos con los medios necesarios para realizar operaciones ya que contamos con un quirófano totalmente equipado, un equipo especializado en anestesia y una estancia post operatoria donde tu compañero podrá recuperarse y recibir el tratamiento adecuado.
                        
                    </p>
                </div>
            </li>
            <li>
                <img src="/clinica/imagenes/fondo4.jpg" alt="">
                <div class="caption">
                    <h1>Clínica Deja Huella</h1>
                    <p>
                        Somos tu clínica, somos tu alivio.
                    </p>
                </div>
            </li>
       </ul>
       <ol class="paginas">

       </ol>

       <div class="izquierda">
            <span class="fa fa-chevron-left"></span>
       </div>

       <div class="derecha">
            <span class="fa fa-chevron-right"></span>
       </div>
    </div>


    <!-- Pie de página  -->
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>

</html>