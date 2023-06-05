<?php 
    include ($_SERVER['DOCUMENT_ROOT'] ."/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <script src="calendario.js"></script>
    <script src="hora.js"></script>
    <style>@import "/clinica/css/bootstrap-grid.css";</style>
    <style>@import "citas.css";</style>
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";"</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <script src="nuevaCita.js"></script>
    
    
    
</head>
<body onload="cargarFecha()">
<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    
    if(isset($_SESSION['username']) && $_SESSION['username']=="administrador"){
?>

<!-- Antes de cualquier acción, al acceder a esta página, automáticamente se actualizarán si la fecha ya se ha pasado -->

<?php 
    include $_SERVER['DOCUMENT_ROOT']. "/clinica/citas/actualizarCitas.php";
?>

<!--  -->
<div id="capaGeneral" class="row">
    <div id="informacionCita" class="col-5">
        <div id="titulo">
            <h2>Información de la cita</h2>
        </div>
        <?php 
        
            $primeraFila = seleccionarPrimeraFila();
            if($primeraFila){
                foreach($primeraFila as $indice=>$valor){
                    ?>
                        <h4><?php echo ucfirst($indice);?></h4>
                        <p><?php echo $valor;?></p>
                    <?php
                }
            }

        ?>
    </div>
    <div id="administrarCita" class="col-5">
        <form action="" method="post">
            
        <!-- Calendario  -->
            <div class="calendario">
                <div class="info">
                    <div id="anterior" onclick="mesAnterior()">&#9664;</div>
                    <div id="month"></div>
                    <div id="year"></div>
                    <div id="siguiente" onclick="mesSiguiente()">&#9654;</div>
                </div>
                <div class="semana">
                    <div class="dayWeek">Lun</div>
                    <div class="dayWeek">Mar</div>
                    <div class="dayWeek">Mie</div>
                    <div class="dayWeek">Jue</div>
                    <div class="dayWeek">Vie</div>
                    <div class="dayWeek">Sab</div>
                    <div class="dayWeek">Dom</div>
                </div>
                <div id="dias"></div>
            </div>

            

            <div>
                <label for="fechaSeleccionada" id="label">Fecha seleccionada:</label>
                <input type="text" name="fechaSeleccionada" id="fechaSeleccionada" >
            </div>
            <div>
                <label for="servicios">Selecciona el servicio:</label>
                    <select name="servicios" id="servicios" onchange="verHoras()">
                        <option value="0" selected></option>
                        <?php 
                            include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
                            $consulta = "SELECT servicio FROM servicios";
                            $resultado = $bd->query($consulta);
                            while($fila = $resultado->fetch_row()){
                                 ?>
                        <option value=<?php echo $fila[0]; ?>><?php echo $fila[0]; ?></option>
                                 <?php
                            }
                            
                            $bd->close();
                        ?>
                        
                    </select>
            </div>
            
            <div>
                <label for="horas">Escoge una hora:</label>
                <select name="horas" id="horas"></select>
            </div>

            <div>
                <input type="submit" value="Nueva cita" name="nuevaCita" id="nuevaCita">
                <input type="submit" value="Borrar cita" name="borrarCita" id="borrarCita">
            </div>

            <div id="cuadro">
             <?php 
                    if(isset($_POST['nuevaCita'])){
                        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
                        $usuario = $_SESSION['username'];
                
                        /*PRIMERO, COMPROBAMOS SI HAY MAS DE 5 CITAS, SI ES ASÍ, EL USUARIO NO TENDRÁ PERMISO A TENER MÁS CITAS*/
                        $consulta = "SELECT C.servicio,C.medico,C.fecha,C.hora FROM citas C, usuarios U  WHERE U.email = C.correoCliente AND U.nombreUsuario = '$usuario'";
                
                        $resultado = $bd->query($consulta);
                        if(isset($primeraFila['email_cliente'])){
                            if($resultado->num_rows<5){
                                $fecha = $_POST['fechaSeleccionada'];
                                $servicio = $_POST['servicios'];
                                $hora = $_POST['horas'];
                                
                                $email = $primeraFila['email_cliente'];
                                $medico = obtenerMedico($servicio);
                                
                            
                        
                                if($usuario != "" && $fecha != "" && $servicio != "" && $hora != "" && $email !="" && $medico !=""){
                                    $consulta = "INSERT INTO citas VALUES(DEFAULT,'$email','$servicio','$medico','$fecha','$hora','confirmada')";
                                    $bd->query($consulta);
                                    if($bd->errno!=0){
                                        echo $bd->errno . " -- " . $bd->error . "<br>";
                                    }else{
                                        echo "Se ha creado correctamente";
                                        borrarPrimeraFila($email);
                                        enviarEmail($fecha,$servicio,$email,$hora,$medico);
                                        
                                    }
                                }
                            }else{
                                echo "Ya has alcanzado el número máximo de citas. Para pedir otra cita, debes ponerte en contacto con nuestro servicio.";
                            }
                            
                            // Primero sacamos la información necesaria para la cita, en este caso, el email.
                        }else{
                            echo "No hay ninguna cita seleccionada.";
                        }
                       
                        
                        $bd->close();
                       
                    }

                    if(isset($_POST['borrarCita'])){
                        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
                        $usuario = $_SESSION['username'];
                
                        /*PRIMERO, COMPROBAMOS SI HAY MAS DE 5 CITAS, SI ES ASÍ, EL USUARIO NO TENDRÁ PERMISO A TENER MÁS CITAS*/
                        $consulta = "SELECT C.servicio,C.medico,C.fecha,C.hora FROM citas C, usuarios U  WHERE U.email = C.correoCliente AND U.nombreUsuario = '$usuario'";
                
                        $resultado = $bd->query($consulta);
                        if(isset($primeraFila['email_cliente'])){
                            $email = $primeraFila['email_cliente'];
                            borrarPrimeraFila($email);
                            ?><meta http-equiv="refresh" content="0" />
                            <?php
                        }
                        
                    }
             ?>
            </div>
        </form>

        
    </div>
    
</div>
<?php 
       include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
?>
</body>
</html>

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

    



    function borrarPrimeraFila($email){ // AUNQUE BORRE TODAS LAS FILAS, LA FUNCIÓN SOLO BORRARÁ UNA FILA, YA QUE ES EL EMAIL QUE FIGURA EN LA CITA, Y SOLAMENTE PUEDE HABER UNA CITA CON EL MISMO CORREO.
        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

        $consultaBorrar = "DELETE FROM citas_pendientes WHERE email_cliente = '$email';";
        $resultado = $bd->query($consultaBorrar);
        if($bd->errno!=0){
            echo $bd->errno . " -- " . $bd->error . "<br>";
        }else{
            echo "Se ha borrado correctamente la fila.";
        }
    }

    function seleccionarPrimeraFila(){
        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
        
        $consulta = "SELECT * FROM citas_pendientes ORDER BY DATE(fecha)";
        $resultado = $bd->query($consulta);
        $citasPendientes = array();
        while($fila = $resultado->fetch_assoc()){
            $citasPendientes[] = $fila;
        }
        if(isset($citasPendientes[0])){
            return $citasPendientes[0];
        }else{
            echo "No existen más citas para validar.";
        } 
    }

    function enviarEmail($fecha,$servicio,$email,$hora,$medico){
        $from = "raresvsabau@gmail.com";
        $to = $email;
        $asunto = "Confirmación Cita";

    
        $mensaje = "Le informamos de que su cita a la clínica ~~ Deja tu Huella ~~ ha sido confirmada";
        $mensaje .= "<br>" . "Este es el resumen de la cita:";
        $mensaje .= "<br>" . "Día: " . $fecha;
        $mensaje .= "<br>" . "Hora: " . $hora;
        $mensaje .= "<br>" . "Servicio solicitado: " . $servicio;
        $mensaje .= "<br>" . "El médico que le atenderá será: " . $medico;
        

        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/class.phpmailer.php");
        
        $mail = new phpmailer();
        $mail->CharSet = 'UTF-8';

        //Indicamos donde está el plugin.

        $mail->PluginDir = "../../../includes/";

        //Escogemos de donde enviamos el correo.

        $mail->host = "localhost";
        $mail->isHTML(true);
        //Añadimos el destinatario
        $mail->From = "xualosoy@gmail.com";
        $mail->FromName = "Rares Vasile";

        $mail->Subject = $asunto;
        $mail->Body = $mensaje; 
        $mail->AddAddress($to);

        if($mail->Send()){
            echo "Mensaje enviado.";
        }else{
            echo "No se ha enviado el correo" . $mail->ErrorInfo();
        }
    }

    function obtenerMedico($servicio){
        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
        $consulta = "SELECT apellidos,nombre FROM medicos WHERE servicio = '$servicio'";
        $resultado = $bd->query($consulta);
        if($fila = $resultado->fetch_row()){
            return  $fila[0] . ", " . $fila[1];
        }
        else{
            return "Médico Desconocido";
        }
        
    }

?>