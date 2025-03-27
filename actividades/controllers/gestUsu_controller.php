<?php    
    // Llamada al fichero que inicia la conexión a la Base de Datos
    require_once("../db/db.php");

    //Llamada al modelo -- Intermediario entre vista y modelo !!!
    require_once("../models/gestUsu_model.php");

    //Llamada a la vista -- Intermediario entre vista y modelo !!!
    require_once("../views/gestUsu_view.php");
?>