<?php 
    include ($_SERVER['DOCUMENT_ROOT'] ."/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopciones</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <script src="/clinica/adopcion/adopcion.js"></script>
    
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/adopcion/adopcion.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    
    
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
</head>
<body>
    <!-- Cabecera -->
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>


    <div id="entrada">
        <img src="/clinica/imagenes/KidDog2.jpg" alt="">
            <h1>Recuerda, adoptar significa salvar una vida. ¡Conviértete en un héroe!</h1>
    </div>
    <!-- Introducimos la base de datos de los animales -->
    
    <?php
        
            
            $animales = cantidadFilas();
            
            //Por página irán 10 animales.
            //Averiguamos el numero de páginas que serán necesarias.

            $paginasTotales = ceil($animales/10);
            
         
    ?>
    <input type="hidden" name="pagTotal" id="pagTotal" value="<?php echo $paginasTotales; ?>">
    <div id="titulo">
        <h1>Adopción</h1>
    </div>
    <div id="pagina">
        <?php 
            include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
            $resultados = imprimirAnimales();
            
            if(!isset($_GET['pagina'])){
                $_GET['pagina']=1;
            }
            for($i=($_GET['pagina']-1)*10;$i<($_GET['pagina']*10);$i++){
                if(isset($resultados[$i])){
                ?>

        <div class="animal">
            <div class="imagen"><img src="<?php echo $resultados[$i]['Imagen']; ?>" alt=""></div>
            <div class="texto">
                <div class="info1">
                    <h2><?php echo $resultados[$i]['Nombre']; ?> </h2>
                    <h3>Tipo: </h3>
                    <span><?php echo $resultados[$i]['Tipo']; ?> </span>
                    <h3>Sexo:</h3>
                    <span><?php echo ucfirst($resultados[$i]['Sexo']);?></span>
                    <h3>Edad:</h3>
                    <span>
                    <?php 
                        if($resultados[$i]['Edad'] == "1"){
                            $cadena = "año";
                        }else{
                            $cadena = "años";
                        }
                        echo $resultados[$i]['Edad'] . " ". $cadena;
                    ?></span>
                    <h3>Raza:</h3>
                    <span><?php echo $resultados[$i]['raza']; ?></span>
                </div>
                <div class="info2">
                    <h3>Teléfono:</h3>
                    <span><?php echo $resultados[$i]['telefono'];  ?> </span>
                    <h3>Ubicación:</h3>
                    <span><?php echo $resultados[$i]['Ubicacion']; ?></span>
                    
                    <p><?php echo $resultados[$i]['DESCRIPCION'];?></p>
                </div>
                <div>
                    <a class="vermas" value="<?php echo $resultados[$i]['ID_Animal'] ?>" onclick="enviarAnimal(this)">Ver más</a> 
                </div>
                
            </div>
             
        </div>
            
                <?php
                }
            }
        ?>
    </div>

    <div id="menuPaginas">
        <ul id="paginas">
            <li id="anterior"><a href="<?php echo "/clinica/adopcion/adopcion.php?pagina=" .$_GET['pagina'] - 1;?>">Anterior</a></li>
    <?php
        for($i=1; $i<=$paginasTotales;$i++){
    ?>
            <li class="numPagina"><a href="<?php echo "/clinica/adopcion/adopcion.php?pagina=" . $i?>"  value="<?php echo $_GET['pagina'];?>"><?php echo $i;?></a></li>

    <?php
        }
        $bd->close();
    ?>
            <li id="siguiente"><a href="<?php echo "/clinica/adopcion/adopcion.php?pagina=" .$_GET['pagina'] + 1;?>">Siguiente</a></li>
        </ul>
    </div>

    <!-- Pie de página  -->
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>


<?php

function cantidadFilas(){
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
    $consulta2 = "SELECT COUNT(*) as total FROM animales";
    $resultado2 = $bd->query($consulta2);
    $cantidad = $resultado2->fetch_assoc();
    return $cantidad['total'];
}


function imprimirAnimales(){
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
        $consulta ="SELECT * FROM animales";
        $resultado = $bd->query($consulta);
        $resultados = array();
        while($fila = $resultado->fetch_assoc()){
            $resultados[] = $fila;
        }
    return $resultados;
}



?>
