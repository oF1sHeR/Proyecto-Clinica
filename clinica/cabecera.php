<!-- Cabecera -->
<div id="cabecera">
    <div id="primero">
        <ul>
        <?php
            if(isset($_SESSION['username'])){
                if($_SESSION['username']=='administrador'){
                    ?>
                    <li><span><a href="/clinica/administrador/panel.php"> Panel Administrador <i class="fas fa-cog"></i></a></span></li>        
                    <?php
                }
        ?>
                
                <li><span>Hola <strong><?php echo $_SESSION['username'];?></strong></span></li>
                
            <li>
                <a href="/clinica/miCuenta/accederCuenta.php">Mi cuenta</a>
            </li>
            <li>
                <a href="/clinica/cerrarSesion.php">Cerrar sesión</a>
            </li>        
        <?php
            }else{
        ?>
            <li>
                <a href="/clinica/registro/registro.php">Registrarse</a>
            </li>
            <li>
                <a href="/clinica/login/login.php">Iniciar sesión</a>
            </li>
        <?php    
            }
        ?>

        </ul>
    </div>
    <div id="segundo">
        <div id="logotipo">
            <a href="/clinica">
                <img src="/clinica/imagenes/logoBase2.png" alt="">
            </a>
        </div>
        <div id="despuesDeLogotipo">
            <ul id="secciones">
                <li class="menuDesplegable">
                    <a>Enfermedades<span class="fas fa-angle-down"></a>
                    <ul class="desplegado">
                        <li><a href="/clinica/enfermedades/perro/perro.php">Enfermedades Perro</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/clinica/adopcion/adopcion.php">Adopción</a>
                </li>
                <li class="menuDesplegable">
                    <a>Servicios<span class="fas fa-angle-down"></span></a>
                    <ul class="desplegado">   
                        <li><a href="/clinica/servicios/cirugia-y-anestesia/cirugia-y-anestesia.php">Cirugía y Anestesia</a></li>
                        <li><a href="/clinica/servicios/dermatologia/dermatologia.php">Dermatología</a></li>
                        <li><a href="/clinica/servicios/oncologia/oncologia.php">Oncología</a></li>
                        <li><a href="/clinica/servicios/cardiologia/cardiologia.php">Cardiología</a></li>
                        <li><a href="/clinica/servicios/neurologia/neurologia.php">Neurología</a></li>
                        <li><a href="/clinica/servicios/oftalmologia/oftalmologia.php">Oftalmología</a></li>
                        <li><a href="/clinica/servicios/gastroentorologia/gastroentorologia.php">Gastroentorología</a></li>
                        <li><a href="/clinica/servicios/neumologia/neumologia.php">Neumología</a></li>
                    </ul>     
                </li>

                <li class="menuDesplegable">    
                    <a>Citas<span class="fas fa-angle-down"></span></a>    
                    <ul class="desplegado">   
                        <li><a href="/clinica/citas/nuevaCitaUsuario/nuevaCita2.php">Nueva cita</a></li>
                        <li><a href="/clinica/citas/consultarCitas/consultarCitas.php">Consultar citas</a></li>
                    </ul>
                </li>

                <li>
                    <a href="/clinica/conoceEquipo/conoceEquipo.php">Conoce al equipo</a>
                </li>
                <li>
                    <a href="/clinica/contacto/contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</div>



