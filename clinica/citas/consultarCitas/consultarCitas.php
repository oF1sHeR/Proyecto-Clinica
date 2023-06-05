<?php
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar citas</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "consultarCitas.css";</style>
    <script src="consultarCitas.js"></script>
</head>
<body>
    

<?php 
include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php")   ;

//Segundos de 1 dia -->86400
const SEGUNDOS_DIA = 86400;



//Abrimos la base de datos.
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

    //Creamos la consulta

    $consulta = "SELECT C.servicio,C.medico,C.fecha,C.hora FROM citas C, usuarios U  WHERE U.email = C.correoCliente AND U.nombreUsuario = '$username'";
    $resultado = $bd->query($consulta);
    if($bd->errno!=0){
            echo $bd->errno . " -- " . $bd->error . "<br>";
    }
    
    $campos = $resultado->fetch_fields();
    

    //Contador de las filas
    $contador = 0;

    
    
    if($resultado->num_rows>0){
        ?>
        <div id="capaContenido">
            <div id="capaTabla">
                <table>
                    <caption>Consulta tus Citas</caption>
                    <thead>
                        <tr>
                        <?php
                            
                            foreach($campos as $valor){
                                ?>
                                    <th><?php echo strtoupper($valor->name);?>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($fila = $resultado->fetch_array()){
                            $fechaCita = $fila['fecha'];
                            if(consultarCaducidad($fechaCita)<SEGUNDOS_DIA){
                            ?>
                                <tr>
                                    <td><?php echo $fila['servicio']?></td>
                                    <td><?php echo $fila['medico']?></td>
                                    <td><?php echo $fila['fecha']?></td>
                                    <td><?php echo $fila['hora']?></td>
                                </tr>
                            <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>

                <div id="nota">
                    <p>* Solo figuran las citas que todavía no han sido atendidas.</p>
                </div>
            </div>
        </div>
        <?php
        
    
    }else{
        ?>
        <div id="capaGeneral">
            <div>
                <h1><?php echo "No tienes ninguna cita creada"; ?></h1>
            </div>
        </div>
        <?php
    }

$bd->close();
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
    include($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
?>
</body>
</html>

<?php 

    function consultarCaducidad($fecha){ // Devuelve el array de la fecha 

        
        
        $ahora = getdate();
        //Segundos de la fecha actual desde 1 Enero 1970
        $ahoraSegundos = $ahora[0];
        
        //Segundos de la fecha pasada por parametros desde 1 Enero 1970
        $segundos = strtotime($fecha);
        
        
        
        $resultado = $ahoraSegundos - ($segundos);


        return $resultado;
        
    }
    
    
    
?>