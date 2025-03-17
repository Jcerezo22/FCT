<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Autenticacion CAS
    require_once '../config.php';
    require_once '../vendor/autoload.php';
    phpCAS::setLogger();
    phpCAS::setVerbose(true);
    phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context, $client_service_name);
    phpCAS::setNoCasServerValidation();

    phpCAS::setHTMLHeader(
        '<html>
      <head>
        <title>__TITLE__</title>
      </head>
      <body>
      <h1>__TITLE__</h1>' 
    );
    phpCAS::setHTMLFooter(
        '<hr>
        <address>
          phpCAS __PHPCAS_VERSION__,
          CAS __CAS_VERSION__ (__SERVER_BASE_URL__)</address>
      </body>
    </html>' 
    );
    
    try {
        phpCAS::forceAuthentication();
    } catch (Exception $e) {
        echo "<SCRIPT>location.href='https://reservas.maristaschamberi.com/'</SCRIPT>";
        exit();
    }
    
    // Conexion a la base de datos
    $servername = "reservas.maristaschamberi.com";
    $username = "root";
    $password = "Chamberi10$";
    $dbname = "reservas";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $usuario = phpCAS::getUser();

    // Verificar si el usuario ya esta en la base de datos y obtener rol y permisos
    $sql = "
    SELECT usuarios.rol_id 
    FROM usuarios
    WHERE usuarios.nombre = '$usuario'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $id_rol = 0;

    if ($row = $result->fetch_assoc()) {
    $id_rol = $row['rol_id'];
    } else {
    // Si el usuario no existe, insertarlo en la base de datos
    $fecha_registro = date('Y-m-d H:i:s');
    $sql_insert = "INSERT INTO usuarios (nombre, fecha_registro) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $usuario, $fecha_registro);
    $stmt_insert->execute();
    $stmt_insert->close();
    }

    $stmt->close();

    $sql = "
    SELECT usuarios.rol_id, 
           MAX(permisos_espacios.puede_autorizar) AS puede_autorizar, 
           MAX(permisos_espacios.puede_borrar) AS puede_borrar
    FROM usuarios
    INNER JOIN permisos_espacios ON permisos_espacios.id_usuario = usuarios.id_usuario
    WHERE usuarios.nombre = '$usuario'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $permiso_autorizar = false;
    $permiso_borrar = false;

    if ($row = $result->fetch_assoc()) {
        $permiso_autorizar = isset($row['puede_autorizar']) && $row['puede_autorizar'] == 1;
        $permiso_borrar = isset($row['puede_borrar']) && $row['puede_borrar'] == 1;
    } else {
        // Si el usuario no existe, insertarlo en la base de datos
        $fecha_registro = date('Y-m-d H:i:s');
        $sql_insert = "INSERT INTO usuarios (nombre, fecha_registro) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $usuario, $fecha_registro);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    $stmt->close();

    // Obtener colores de los espacios
    $sql_colores = "SELECT nombre, color, id_espacio FROM espacios";
    $result_colores = $conn->query($sql_colores);

    $espacios_colores = [];
    while ($row = $result_colores->fetch_assoc()) {
        $espacios_colores[] = $row;
    }

    $conn->close();

    $hora_actual = date('H');
    if ($hora_actual < 12) {
        $saludo = "Buenos días";
    } elseif ($hora_actual < 18) {
        $saludo = "Buenas tardes";
    } else {
        $saludo = "Buenas noches";
    }

    //Llamada a la vista -- Intermediario entre vista y modelo !!!
    require_once("views/login_view.php");
?>
