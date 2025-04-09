<?php 
    // Llamada al controlador
    require_once("compCookieAdmin_controller.php");

    // Llamada al fichero que inicia la conexión a la Base de Datos
    require_once("../db/db.php");

    //Llamada al modelo -- Intermediario entre vista y modelo !!!
    require_once("../models/gestUsu_model.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST))
    {
        
    }

    //Llamada a la vista -- Intermediario entre vista y modelo !!!
    require_once("../views/gestUsu_view.php");
?>