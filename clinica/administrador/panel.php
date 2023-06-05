<?php 
    include_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administración</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "panel.css";</style>
    <script src="panel.js"></script>
</head>
<body>

    <?php 
        include_once ($_SERVER['DOCUMENT_ROOT'] ."/clinica/cabecera.php");
        if(isset($_SESSION['username']) && $_SESSION['username']='administrador'){
    ?>

        <div id="capaGeneral">
            <div><h1>Bienvenido al panel de administrador</h1></div>
            <div id="menu">
                <h3>Menú</i></h3>
                <div>
                    <ul>
                        <li><a href="/clinica/medicos/insertarMedicos.php">Dar de alta médico</a></li>
                        <li><a href="/clinica/servicios/crearServicio/crearServicio.php">Crear servicio</a></li>
                        <li><a href="/clinica/citas/nuevaCitaAdmin/nuevaCita.php">Verificar citas</a></li>
                        <li><a href="/clinica/adopcion/introducirAnimal/introducirAnimal.php">Introducir animal en adopción</a></li>
                        <li><a href=""></a></li>
                    </ul>
                    
                </div>
            </div>
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
        
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>

<?php 
    
?>