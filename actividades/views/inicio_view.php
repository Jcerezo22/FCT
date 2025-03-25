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
                <?php if ($id_rol == 1): ?>
                    <button type="button" class="admin-button salas" onclick="window.location.href='controllers/gestUsu_controller.php'">Gestionar usuarios</button>
                <?php endif; ?>
            </div>  
            <div class="calendar-container">
               
            </div>
        </div>
    </body>
</html>

    