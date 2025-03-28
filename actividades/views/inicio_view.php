<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Actividades</title>
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
                <button type="button" class="admin-button confAct" onclick="window.location.href='controllers/confAct_controller.php'">Configurar actividades</button>	
                <!-- Botones segun el rol y permisos -->
                <?php if($datosUsu["rol_id"] == 1): ?>
                    <button type="button" class="admin-button gestUsu" onclick="window.location.href='controllers/gestUsu_controller.php'">Gestionar usuarios</button>
                <?php endif; ?>
            </div>  
            <div class="activities-container">
                <?php 
                    if(empty($actividades))
                    {
                        echo "<p>Actualmente no estas implicado en ninguna actividad</p>";
                    }
                    else
                    {
                        if(count($actividades) > 1)
                            echo "<p>Tienes ". count($actividades) ." actividades</p><br>";
                        else
                            echo "<p>Tienes ". count($actividades) ." actividad</p><br>";

                        echo"<table>";
                        echo"<th>Actividad</th><th>Fecha</th><th>Hora inicio</th><th>Hora fin</th><th>Estado</th><th>Fecha reserva</th><th>Fecha autorizacion</th><th>Lugar</th><th>Comida</th><th>Comida (fuera)</th><th>Autobus</th><th>Observaciones</th><tr>";        
                        foreach($actividades as $row) {
                            echo "<td>". $row["nombre"] ."</td><td>". $row["fecha"] ."</td><td>". $row["hora_inicio"] ."</td><td>". $row["hora_fin"] ."</td><td>". $row["estado"] ."</td><td>". $row["fecha_reserva"] ."</td><td>". $row["fecha_autorizacion"] ."</td><td>". $row["lugar"] ."</td><td>". $row["comida"] ."</td><td>". $row["comida_fuera"] ."</td><td>". $row["autobus"] ."</td><td>". $row["observaciones"] ."</td><tr>";
                        }    
                        echo"</table>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>

    