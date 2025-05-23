<?php
    // Llamada al controlador de la autenticación con CAS
    require_once("login_controller.php");
    
    //Llamada al modelo -- Intermediario entre vista y modelo !!!
    require_once("models/inicio_model.php");

    $hora_actual = date('H');
    if ($hora_actual < 12) {
        $saludo = "Buenos días";
    } elseif ($hora_actual < 18) {
        $saludo = "Buenas tardes";
    } else {
        $saludo = "Buenas noches";
    }

    $usuario = phpCAS::getUser();

    $datosUsu = datosUsu($usuario);

    // Si el usuario no existe, lo insertamos en la base de datos
    if(empty($datosUsu))
    {
        insertarUsu($usuario);
        $datosUsu = datosUsu($usuario);
    }

    $cookie_name = "usuario";
    $serializedDatos = serialize($datosUsu);
    setcookie($cookie_name, $serializedDatos, time() + (86400 * 30), "/"); // 86400 segundos = 1 día

    $actividades = actividadesUsu($datosUsu["id_usuario"]);

    //Llamada a la vista -- Intermediario entre vista y modelo !!!
    require_once("views/inicio_view.php");
?>
