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
    <h1>Actividades</h1>
    <div class="welcome">
        <p>
            <?php echo $saludo . ", <span class='usuario-autenticado'>" . htmlspecialchars($usuario) . "</span>. ¡Bienvenido/a al sistema de actividades!"; ?>
        </p>
    </div>

    <div class="calendar-container">
        <div id="calendar"></div>
    </div>
</div>
</body>
</html>

    