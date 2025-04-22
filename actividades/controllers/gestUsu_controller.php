<?php 
    // Llamada al controlador
    require_once("compCookieAdmin_controller.php");

    // Llamada al fichero que inicia la conexión a la Base de Datos
    require_once("../db/db.php");

    //Llamada al modelo -- Intermediario entre vista y modelo !!!
    require_once("../models/gestUsu_model.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST))
    {
        if(isset($_POST["añadirGrupo"]))
        {     
            $nombre = limpiarDatos($_POST["name"]);
            insertarGrupo($nombre);
        }

        if(isset($_POST["aplicarGrupo"]))
        {     
            $grupo_id = limpiarDatos($_POST["grupo_id"]);
            $usuario = limpiarDatos($_POST["usuarios"]);
            
            if($usuario != 1)
            {
                actualizarGrupo($grupo_id, $usuario);
            }
        }

        if(isset($_POST["añadirUsuario"]))
        {     
            //Llamada al modelo -- Intermediario entre vista y modelo !!!
            require_once("../models/inicio_model.php");

            $usuario = limpiarDatos($_POST["name"]);
            insertarUsu($usuario);
        }

        if(isset($_POST["aplicarRol"]))
        {     
            $rol_id = limpiarDatos($_POST["roles"]);
            $id_usuario = limpiarDatos($_POST["id_usuario"]);
            
            actualizarRol($rol_id, $id_usuario);
        }
    }

    //Llamada a la vista -- Intermediario entre vista y modelo !!!
    require_once("../views/gestUsu_view.php");
?>