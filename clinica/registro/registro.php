
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/cabecera.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>
        @import "/clinica/css/registro.css";
    </style>
    <script src="registro.js"></script>
    <style>@import "/clinica/pie/piePagina.css";</style>
</head>
<body>
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>
    <div id="capaGeneral">
        <form action="" method="post" id="formulario" name="formulario" onsubmit="return validaciones();">
            <h1>Formulario de registro</h1>
            <div>
                <label for="nombreUsuario">Nombre de usuario:</label>
                <input type="text" name="nombreUsuario" id="nombreUsuario">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="ejemplo@ejemplo.com">
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
            
            <div>
                <label for="confirmarPassword">Confirmar Contraseña:</label>
                <input type="password" name="confirmarPassword" id="confirmarPassword">
            </div>
            
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos">
            </div>
            
            <div>
                <label for="dni">DNI/NIE:</label>
                <input type="text" name="dni" id="dni">
            </div>
            
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono">
            </div>
            
            
            
            <input type="submit" name="registrar"  id="registrar">
            <div id="miembro">
                <div>
                    <span>¿Ya eres miembro?</span>
                    <a href="/clinica/login/login.php">Inicia sesión</a>
                </div>
            </div>
            <div id="cuadro">
            <?php

    
if(isset($_POST['registrar'])){
    $nombreUsuario = $_POST['nombreUsuario'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $pass = $_POST['password'];
    $confirmarPassword = $_POST['confirmarPassword'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $activado = 0;
    //Codigo utilizado únicamente para validar la cuenta al registrarse.
    $hash = hash('md5',rand(1,1000));
    //header("Location:correcto.php");
    //echo $nombreUsuario . "<br>" . $email . "<br>" .$nombre . "<br>" .$apellidos . "<br>" .$pass . "<br>" . $confirmarPassword . "<br>" .$dni . "<br>" .$telefono . "<br>";

    
    

    ////////    Hasheamos la contraseña para guardarla en la base de datos. ////////
    $passHasheada =  hash_pass($pass);


    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");


    //CREACIÓN DE LA BASE DE DATOS
    /* 
    $orden = "CREATE DATABASE usuariosClinicaDB";
    if($bd->query($orden) === true){
        echo "Base de datos creada correctamente";
    }else{
        die("Error al crear la base de datos: " . $bd->error);
    }

    */

    //CREACIÓN DE LOS CAMPOS
    $bd->query("CREATE TABLE IF NOT EXISTS usuarios (nombreUsuario VARCHAR(20) PRIMARY KEY,email VARCHAR(40) UNIQUE,nombre VARCHAR(30),apellidos VARCHAR(30),pass VARCHAR(255),dni VARCHAR(10),telefono VARCHAR(15),Activado TINYINT(1),cdv VARCHAR(255));");

    $ps = $bd->prepare("insert into usuarios values(?,?,?,?,?,?,?,?,?)");
    $ps->bind_param("sssssssis",$nombreUsuario,$email,$nombre,$apellidos,$passHasheada,$dni,$telefono,$activado,$hash);
    

    //Ejecutamos el $ps
    $ps->execute();
    
    
    if($bd->error==1062){
        ?>
            <span style="visibility:visible"><?php echo "Este usuario ya existe.";?></span>
        <?php
        
    }
    $bd->close();

    //Cambiar posteriormente

    include "validacion.php";

    validarCuenta($email,$hash);
    
}
function hash_pass($contra){
    $hasheada = password_hash($contra,PASSWORD_DEFAULT);
    return $hasheada;
}


?>
            </div>
        </form>
    </div>

    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>


