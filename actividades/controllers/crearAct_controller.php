<?php    
    // Llamada al fichero que inicia la conexión a la Base de Datos
    require_once("../db/db.php");

    //Llamada al modelo -- Intermediario entre vista y modelo !!!
    require_once("../models/crearAct_model.php");

    //Llamada a la vista -- Intermediario entre vista y modelo !!!
    require_once("../views/crearAct_view.php");
?>
