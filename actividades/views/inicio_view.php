<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Calendario de Eventos</title>
  <script src="./dist/index.global.js"></script>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/inicio.js"></script>
  <link rel="stylesheet" href="css/inicio.css">
</head>
<body>
<div class="container">
    <h1>Actividades Confirmadas</h1>
    <div class="welcome">
        <p>
            <?php echo $saludo . ", <span class='usuario-autenticado'>" . htmlspecialchars($usuario) . "</span>. ¡Bienvenido/a al sistema de reservas!"; ?>
        </p>
      </div>

      <div class="admin-container">
        <button type="button" class="admin-button reservar" onclick="window.location.href='reservar_sala.php'">Reservar Salas</button>	
        <!-- Botones segun el rol y permisos -->
        <?php if ($id_rol == 1): ?>
            <button type="button" class="admin-button salas" onclick="window.location.href='administrar_salas.php'">Administrar Salas</button>
            <button type="button" class="admin-button autorizar" onclick="window.location.href='autorizar_reservas.php'">Autorizar Reservas</button>
            <button type="button" class="admin-button usuarios" onclick="window.location.href='administrar_usuarios.php'">Administrar Usuarios</button>
            <button type="button" class="admin-button borrar" onclick="window.location.href='borrar_reserva.php'">Borrar Reserva</button>
        <?php else: ?>
            <?php if ($permiso_autorizar): ?>
                <button type="button" class="admin-button autorizar" onclick="window.location.href='autorizar_reservas.php'">Autorizar Reservas</button>
            <?php endif; ?>
            <?php if ($permiso_borrar): ?>
                <button type="button" class="admin-button borrar" onclick="window.location.href='borrar_reserva.php'">Borrar Reserva</button>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="calendar-container">
        <div id="calendar"></div>
    </div>
</div>
</body>
</html>

    