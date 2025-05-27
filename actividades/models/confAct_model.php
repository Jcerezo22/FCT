<?php
    /* Busca las preguntas que hay en la base de datos*/
    function buscarPreguntas()
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT id_pregunta, titulo FROM preguntas ORDER BY 1");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
           
            return $resultado;
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    /* Busca las acciones que hay en la base de datos*/
    function buscarAcciones()
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT id_accion, nombre FROM acciones ORDER BY 1");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
           
            return $resultado;
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    /* Busca los eventos que hay en la base de datos*/
    function buscarEventos()
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT id_evento, nombre FROM eventos ORDER BY 1");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
           
            return $resultado;
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }
?>