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

    /* Muestra como opciones las acciones que no estan asociadas al evento pasado por parametro */
    function mostrarAccionesAñadir($id_evento)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.nombre, a.id_accion FROM acciones a WHERE NOT EXISTS (SELECT 1 FROM eventos_acciones ea WHERE ea.id_accion = a.id_accion AND ea.id_evento = :id_evento)");
            $stmt->bindParam(':id_evento', $id_evento);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            if(!empty($resultado))
            {
                foreach($resultado as $row) {
                    echo "<option value='". $row["id_accion"] ."'>" . $row["nombre"] ."</option><br>";
                }
            }
            else
            {
                echo "<option value='0'>Todas las acciones están asociadas a este evento</option><br>";
            }
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    /* Muestra como opciones las acciones que estan asociadas al evento pasado por parametro */
    function mostrarAccionesEliminar($id_evento)
    {
       $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.nombre, a.id_accion FROM acciones a WHERE EXISTS (SELECT 1 FROM eventos_acciones ea WHERE ea.id_accion = a.id_accion AND ea.id_evento = :id_evento)");
            $stmt->bindParam(':id_evento', $id_evento);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            if(!empty($resultado))
            {
                foreach($resultado as $row) {
                    echo "<option value='". $row["id_accion"] ."'>" . $row["nombre"] ."</option><br>";
                }
            }
            else
            {
                echo "<option value='0'>No hay ninguna accion asociada a este evento</option><br>";
            }
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Inserta una nueva pregunta en la base de datos 
    function insertarPregunta($titulo, $tipoRespuesta)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO preguntas (titulo,tipoRespuesta) VALUES (:titulo,:tipoRespuesta)");
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':tipoRespuesta', $tipoRespuesta);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    /* Busca el último id_pregunta de la base de datos*/
    function buscarMaxIdPregunta()
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT MAX(id_pregunta) id_pregunta FROM preguntas");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetch();
           
            return $resultado["id_pregunta"];
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Inserta un evento pregunta en la base de datos 
    function insertarEvento($id_pregunta, $nombre)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO eventos (id_pregunta,nombre) VALUES (:id_pregunta,:nombre)");
            $stmt->bindParam(':id_pregunta', $id_pregunta);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Detecta si en el nombre aparece la palabra email o correo
    function detectarTipoAccion($nombre)
    {
        $tipo = "otro";
        $nombre = strtolower($nombre);
        $nombre = explode(' ', $nombre);

        $claves = ['email', 'correo'];
        
        foreach ($nombre as $palabras) {
            if(in_array(trim($palabras), $claves)) 
                $tipo = "email";
        }

        return $tipo;
    }

    //Inserta una nueva acción en la base de datos 
    function insertarAccion($nombre, $tipo)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO acciones (nombre,tipo) VALUES (:nombre,:tipo)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Actualiza el titulo de la pregunta indicada
    function actualizarTituloPregunta($id_pregunta, $titulo)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE preguntas SET titulo = :titulo WHERE id_pregunta = :id_pregunta");
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':id_pregunta', $id_pregunta);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Actualiza el nombre de la acción indicada
    function actualizarNombreAccion($id_accion, $nombre)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE acciones SET nombre = :nombre WHERE id_accion = :id_accion");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':id_accion', $id_accion);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Actualiza el nombre del evento indicado
    function actualizarNombreEvento($id_evento, $nombre)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE eventos SET nombre = :nombre WHERE id_evento = :id_evento");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':id_evento', $id_evento);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    /* Busca el evento asociado a la pregunta*/
    function buscarEventoAsocPregunta($id_pregunta)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT id_evento FROM eventos WHERE id_pregunta = :id_pregunta");
            $stmt->bindParam(':id_pregunta', $id_pregunta);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetch();
           
            return $resultado["id_evento"];
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Elimina de la base de datos la relacion del evento asociado a la pregunta indicada con las acciones
    function eliminarEventoAccionEvento($id_evento)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM eventos_acciones WHERE id_evento = :id_evento");
            $stmt->bindParam(':id_evento', $id_evento);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Elimina de la base de datos el evento asociado a la pregunta indicada
    function eliminarEvento($id_evento)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM eventos WHERE id_evento = :id_evento");
            $stmt->bindParam(':id_evento', $id_evento);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Elimina de la base de datos la pregunta indicada
    function eliminarPregunta($id_pregunta)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM preguntas WHERE id_pregunta = :id_pregunta");
            $stmt->bindParam(':id_pregunta', $id_pregunta);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Elimina de la base de datos la relacion de la accion con los eventos
    function eliminarEventoAccionAccion($id_accion)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM eventos_acciones WHERE id_accion = :id_accion");
            $stmt->bindParam(':id_accion', $id_accion);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Elimina de la base de datos la accion indicada
    function eliminarAccion($id_accion)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM acciones WHERE id_accion = :id_accion");
            $stmt->bindParam(':id_accion', $id_accion);
            $stmt->execute();
            $conn->commit();
        }
        catch(PDOException $e)
        {
            $conn->rollBack();
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }
?>