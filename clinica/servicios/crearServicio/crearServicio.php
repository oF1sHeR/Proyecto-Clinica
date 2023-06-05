<?php
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear servicio</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css"> 
    <style>@import "crearServicio.css";</style>
    <script src="crearServicio.js"></script>
    
</head>
<body>
    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
        if(isset($_SESSION['username']) && $_SESSION['username']='administrador'){
    ?>

    <div id="capaGeneral">
        
        <form action="" method="POST" id="form" name="form">
            <div>
                <h1>Crear servicio</h1>
            </div>
            <div>
                <label for="servicio">Servicio: </label>
                <input type="text" name="servicio" id="servicio">
            </div>
            
            <div>
                <input type="submit" value="Introducir Servicio" id="introducir" name="introducir">
            </div>
            <div>
            <?php 

        if(isset($_POST['introducir'])){
        $servicio = $_POST['servicio'];

        if($servicio!=""){
            include_once "../../includes/entrarEnBD.php";

            $consulta = "INSERT INTO servicios values(DEFAULT,'$servicio')";
            if($resultado = $bd->query($consulta)){
                ?>
                <span><?php echo "Servicio introducido con éxito";?></span>
                <?php  
            }else{
                ?>
                <span><?php echo "No se ha podido introducir el servicio.";?></span>
                <?php
            }
        }

    
}
?>
            </div>
        </form>
    </div>
    <?php
        }else{
    ?>
        <div class="mensaje">
            <div>
                <h1><?php echo " Debes iniciar sesión como administrador."; ?></h1>
                <a href="/clinica/login/login.php">Aquí podrás iniciar sesión</a>
            </div>
        </div>
    <?php
        }
    ?>

    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>


