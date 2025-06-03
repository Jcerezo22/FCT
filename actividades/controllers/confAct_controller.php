<?php    
    // Llamada al fichero que inicia la conexión a la Base de Datos
    require_once("../db/db.php");

    //Llamada al modelo -- Intermediario entre vista y modelo !!!
    require_once("../models/confAct_model.php");

     if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST))
    {
        if(isset($_POST["añadirPregunta"]))
        {     
            $titulo = limpiarDatos($_POST["name"]);
            $tipoRespuesta = limpiarDatos($_POST["tipoRespuesta"]);
            $nombreEvento = limpiarDatos($_POST["evento"]);

            if(($titulo != "") && ($tipoRespuesta != "") && ($nombreEvento != ""))
            {
                insertarPregunta($titulo, $tipoRespuesta);
                $id_pregunta = buscarMaxIdPregunta();
                insertarEvento($id_pregunta, $nombreEvento);
            }
        }

        if(isset($_POST["aplicarCambioPregunta"]))
        {     
            $nombre = limpiarDatos($_POST["name"]);
            $id_pregunta = limpiarDatos($_POST["id_pregunta"]);

            if($nombre != "")
            {
                actualizarTituloPregunta($id_pregunta, $titulo);
            }
        }

        if(isset($_POST["aplicarEliminarPregunta"]))
        {     
            $id_pregunta = limpiarDatos($_POST["id_pregunta"]);

            $id_evento = buscarEventoAsocPregunta($id_pregunta);
            eliminarEventoAccionEvento($id_evento);
            eliminarEvento($id_evento);
            eliminarPregunta($id_pregunta);
        }

        if(isset($_POST["añadirAccion"]))
        {     
            $nombre = limpiarDatos($_POST["name"]);

            if($nombre != "")
            {
                $tipo = detectarTipoAccion($nombre);
                insertarAccion($nombre, $tipo);
            }
        }

        if(isset($_POST["aplicarCambioAccion"]))
        {     
            $nombre = limpiarDatos($_POST["name"]);
            $id_accion = limpiarDatos($_POST["id_accion"]);

            if($nombre != "")
            {
                actualizarNombreAccion($id_accion, $nombre);
            }
        }

        if(isset($_POST["aplicarEliminarAccion"]))
        {     
            $id_accion = limpiarDatos($_POST["id_accion"]);

            eliminarEventoAccionAccion($id_accion);
            eliminarAccion($id_accion);
        }

        if(isset($_POST["aplicarCambioEvento"]))
        {     
            $nombre = limpiarDatos($_POST["name"]);
            $id_evento = limpiarDatos($_POST["id_evento"]);

            if($nombre != "")
            {
                actualizarNombreEvento($id_evento, $nombre);
            }
        }
    }

    //Llamada a la vista -- Intermediario entre vista y modelo !!!
    require_once("../views/confAct_view.php");
?>
