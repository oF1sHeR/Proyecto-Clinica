<?php 
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "nuevaCita2.css";</style>
    <style>@import "/clinica/css/cabecera.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <script src="nuevaCita2.js"></script>
    <style>@import "/clinica/pie/piePagina.css";</style>

</head>
<body>
<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    
    if(isset($_SESSION['username'])){
?>  
    <div id="capaPadre">
        <!-- Formulario -->
        <form action="" method="POST" id="formulario" name="formulario" onsubmit="return validaciones();">
            
            <h1>Pedir nueva cita</h1>
            <div class="elemento">
                <label for="motivo">Motivo de la cita</label>
                <input type="text" name="motivo" id="motivo">
            </div>

            <div class="elemento">
                <label for="descripcion">Breve descripción del problema</label>
                
                <textarea name="descripcion" id="descripcion" cols="70" rows="10" placeholder="Indica una breve descripción de tu problema."></textarea>
            </div>

            <div class="elemento">
                <label for="observaciones">Observaciones</label>
                
                <textarea name="observaciones" id="observaciones" cols="70" rows="5" placeholder="Indica si tienes alguna petición a la hora de darte una cita. Horario, día en concreto, etc.."></textarea>
            </div>
            

            <div id="cuadro">
            <?php
             //
                $fechaActual = date("Y-m-d",time());
                if(isset($_POST['enviar'])){
                    if($_POST['motivo'] != "" && $_POST['descripcion'] && $_POST['observaciones']){
                        $username = $_SESSION['username'];
                        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
                        $consulta = "SELECT email FROM usuarios WHERE nombreUsuario = '$username'";
                        $resultado = $bd->query($consulta);
                        if($fila = $resultado->fetch_assoc()){
                        $email = $fila['email'];
                        }
                        else{
                            echo "No existe el email";
                        }
                        $asunto = $_POST['motivo'];
                        $descripcion = $_POST['descripcion'];
                        $observaciones =$_POST['observaciones'];
                        
                        guardarConsulta($email,$asunto,$descripcion,$observaciones,$fechaActual);
                        
                        $bd->close();
                    }
                    else{
                        echo "Asegurate de completar todos los campos. Gracias.";
                    }
                }
                ?>
            </div>


            <div>
                <input type="submit" value="Enviar cita" id="enviar" name="enviar">
            </div>


        </form>
        <!-- Capa de informacion  -->
        <div id="info">
            <h1>Información</h1>
            <div>
                <p>Bienvenido/a al sistema de Citas de nuestra clínica "Deja huella".</p>
                <p>Deberás rellenar todos los campos, y posteriormente enviar los datos. Recibirás cuanto antes  un correo con los datos de la cita concertada.</p>
                <p>Recuerda, solo envíar 1 cita. No intentes enviar más de una cita ya que se borrará la que ya enviaste. Gracias!</p>
            </div>
        </div>
    </div>   

<?php
    }else{
        ?>
        
    <div class="mensaje">
        <div>
            <p><?php echo "Debes iniciar sesión primero"; ?></p>
            <a href="/clinica/login/login.php">Pulsa aquí para loguearse</a>
        </div>
    </div>
    <?php
    }

   
    



    function guardarConsulta($emailCliente,$asunto,$descripcion,$observaciones,$fecha){
        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
        $consulta = "INSERT INTO citas_pendientes VALUES('$emailCliente','$asunto','$descripcion','$observaciones','$fecha');";
        $insertar = $bd->query($consulta);
        
        if($bd->errno==1062){
            borrarConsulta($emailCliente);
            guardarConsulta($emailCliente,$asunto,$descripcion,$observaciones);
        }else{
            echo "Se ha enviado correctamente";
        }
    }

    function borrarConsulta($email){
        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
        $consultaBorrar = "DELETE FROM citas_pendientes where email_cliente = '$email';";
        $borrar = $bd->query($consultaBorrar);
        $bd->close();
    }

    
?>

<?php 
    include($_SERVER['DOCUMENT_ROOT']. "/clinica/pie/piePagina.php");
?>
</body>
</html>