<?php 

include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conoce al Equipo</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/bootstrap-grid.css";</style>
    <style>
        @import "/clinica/css/cabecera.css";
    </style>
    <style>@import "conoceEquipo.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">

    <script src="conoceEquipo.js"></script>
    

    
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
</head>
<body>
    <!-- Cabecera -->
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>
        <div id="titulo">
            <h1>Te presentamos nuestro equipo de veterinarios</h1>
        </div>
    <!-- Contenido -->
    <div id="contenido" class="row">
        
        <?php 
        
        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

        $consulta = "SELECT * FROM medicos";
        $resultado = $bd->query($consulta);
        
        while($fila = $resultado->fetch_assoc()){
            $veterinarios[] = $fila;
        }

        for($i = 0; $i<count($veterinarios);$i++){
            ?>
            <div class="capa col-3">
                <div class="veterinario">
                    <div class="carta">
                        <div class="imagen"><img src="<?php echo "/". $veterinarios[$i]['imagen'];?>" alt=""></div>
                        <div class="nombre">
                            <p><?php echo $veterinarios[$i]['apellidos'] . ", " . $veterinarios[$i]['nombre']; ?></p>
                            <i class="verInfo fas fa-angle-down"></i>
                        </div>
                    </div>
                    <div class="datos">
                        <div class="estudios">
                            <h5>Estudios</h5>
                            <span><?php echo $veterinarios[$i]['estudios']?></span>
                            <h5>Servicio</h5>
                            <span><?php echo $veterinarios[$i]['servicio']?></span>
                        </div>
                        <h5>Conocerlo/a mejor</h5>
                        <div class="descripcion">
                            <p><?php echo $veterinarios[$i]['descripcion'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            

        }

        $bd->close();
            
        ?>
    </div>
    <!-- Pie de página  -->
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>