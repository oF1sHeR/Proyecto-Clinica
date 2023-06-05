<?php
    require ($_SERVER['DOCUMENT_ROOT'] ."/includes/sesion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/login.css";</style>
    <style>@import "/clinica/css/cabecera.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/pie/piePagina.css";</style>
    <script src="login.js"></script>

</head>
<body>
    <?php
        require($_SERVER['DOCUMENT_ROOT'] ."/clinica/cabecera.php");
    ?>
    <div id="capaGeneral">
        <form action="" method="post" id="form" name="form">
            <h1>Iniciar sesión</h1>
            <div class="elemento">
                <i class="fa fa-user icon"></i>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario">
            </div>
            <div class="elemento">
                <i class="fa fa-key icon"></i>
                <input type="password" name="pass" id="pass" placeholder="Contraseña">
            </div>
            <div>
                <input type="submit" value="Iniciar sesion" id="login" name="login">
            </div>
            <div id="cuadro">
                <p>
<?php
    

    if(isset($_POST['login'])){

        $user = $_POST['usuario'];
        $pass = $_POST['pass'];
        
        require ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
        //Empezamos a acceder a la base de datos.

        $buscarUsuario = "SELECT nombreUsuario,pass from usuarios WHERE nombreUsuario='$user'";
        $resultado = $bd->query($buscarUsuario);
        /* 
        $columna1 = $resultado->fetch_field();
        $columna2 = $resultado->fetch_field();

        echo $columna1->name . "----------" . $columna2->name . "<br>";
        
		//Recorremos las filas
		*/


        //Ahora, comprobamos si está activada la cuenta.

        $comprobarActivo = "SELECT Activado from usuarios WHERE nombreUsuario='$user'";
        $resultado2 = $bd->query($comprobarActivo);
        $verActivo = $resultado2->fetch_row();
        
        
        $fila = $resultado->fetch_row();
        if(isset($fila) && verificarPass($pass,$fila[1])){
            if($verActivo[0]==1){
                $_SESSION['username'] = $user;

                ?>
                    <meta http-equiv="refresh" content="0; url=/clinica/index.php">
                <?php
                //header("Location: ../index.php");
            }else{
                echo "Debes verificar primero el email." . "<br>";
            }
        }
        else{
            $_POST['mensaje'] = "Usuario incorrecto. Vuelve a intentarlo.";
            echo $_POST['mensaje'];
            }
        
        /*
		while($fila = $resultado->fetch_row()){
            if($fila != ""){
                echo "Logeado correctamente." . "<br>";
            }else{
                echo "Usuario incorrecto" . "<br>";
            }
			echo $fila[0] ."<br>";
            echo $fila[1] ."<br>"; 
		}
        */
		$bd->close();

    }

    
?>
                </p>
            </div>
            <div class="enlaces">
                <a href="/clinica/recuperacion/recuperacion.php">¿Olvidaste la contraseña?</a>
            </div>

            <div class="enlaces">
                <a href="/clinica/registro/registro.php">¿Eres nuevo?</a>
            </div>
            
        </form>
    </div>

    <!-- <video autoplay muted loop>
        <source src="/clinica/videos/production.mp4" type="video/mp4">
    </video> -->


    <!--  Pie de pagina -->
    <?php
       require ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>

</body>
</html>


<?php

function verificarPass($contra,$contraHasheada){
    $coinciden = password_verify($contra,$contraHasheada);
    return $coinciden;
}

?>