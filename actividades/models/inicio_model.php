<?php
    //Verifica si el usuario ya esta en la base de datos, si esta obtiene sus datos
    function datosUsu($usuario)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.id_usuario, a.nombre, a.rol_id, b.id_grupo FROM usuarios a, grupo_usuario b WHERE nombre = :usuario AND a.id_usuario = b.id_usuario");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetch(); 

            return $resultado;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Inserta un nuevo usuario en la base de datos 
    function insertarUsu($usuario)
    {
        $conn = abrirBD();

        try {
            $fecha = date("Y-m-d h:i:s");
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre , fecha_registro) VALUES (:nombre,:fecha_registro)");
            $stmt->bindParam(':nombre', $usuario);
            $stmt->bindParam(':fecha_registro', $fecha);
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

    //Verifica si el usuario esta implicado en alguna actividad
    function actividadesUsu($id_usuario)
    {
        $conn = abrirBD();

        try {
            $fecha = date("Y-m-d");
            $stmt = $conn->prepare("SELECT b.nombre, b.fecha, b.hora_inicio, b.hora_fin, b.estado, b.fecha_reserva, b.fecha_autorizacion, b.lugar, b.observaciones, b.comida, b.comida_fuera, b.autobus FROM actividad_usuario a, actividades b WHERE a.id_usuario = :id_usuario AND b.fecha >= :fecha AND a.id_actividad = b.id_actividad");
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll(); 

            return $resultado;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        $conn = cerrarBD($conn);
    } 
?>