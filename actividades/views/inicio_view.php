<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Actividades</title>
        <script src="./dist/index.global.js"></script>
        <script src="js/jquery-3.7.1.min.js"></script>
        <script src="js/inicio.js"></script>
        <link rel="stylesheet" href="css/inicio.css">
    </head>
    <body>
        <div class="container">
            <h1>Actividades</h1>
            <div class="welcome">
                <p>
                    <?php echo $saludo . ", <span class='usuario-autenticado'>" . htmlspecialchars($usuario) . "</span>. ¡Bienvenido/a al sistema de actividades!"; ?>
                </p>
            </div>
            <div class="admin-container">
                <button type="button" class="admin-button reservar" onclick="window.location.href='controllers/confAct_controller.php'">Configurar actividades</button>	
                <!-- Botones segun el rol y permisos -->
                <?php if($id_rol == 1): ?>
                    <button type="button" class="admin-button salas" onclick="window.location.href='controllers/gestUsu_controller.php'">Gestionar usuarios</button>
                <?php endif; ?>
            </div>  
            <div class="calendar-container">
                <?php 
                    if(!empty($actividades))
                    {
                        echo "<p>Actualmente no estas implicado en ninguna actividad</p>";
                    }
                    else
                    {
                        echo"<table>";
                        echo"<th>Actividad</th><th>Fecha</th><th>Hora inicio</th><th>Hora fin</th><th>Estado</th><th>Fecha reserva</th><th>Fecha autorizacion</th><th>Lugar</th><th>Comida</th><th>Comida (fuera)</th><th>Autobus</th><th>Observaciones</th><tr>";            
                        /*for($i=0 ; $i < count($datosReserva["aerolinea"]) ; $i++)
                        {
                            echo "<td>". $datosReserva['aerolinea'][$i]["nombre_aerolinea"] ."</td><td>". $datosReserva["origen"][$i]["origen"] ."</td><td>". $datosReserva["destino"][$i]["destino"] ."</td><td>". $datosReserva["salida"][$i]["fechahorasalida"] ."</td><td>". $datosReserva["llegada"][$i]["fechahorallegada"] ."</td><td>". $datosReserva["asientos"][$i]["num_asientos"] ."</td><tr>";
                        }*/
                        echo "<td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><tr>";
                        echo "<td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><tr>";
                        echo "<td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><tr>";
                        echo"</table>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>

    