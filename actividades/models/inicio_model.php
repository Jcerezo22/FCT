<?php
    //Verifica si el usuario ya esta en la base de datos, si esta obtiene su rol
    function rolUsu($usuario)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT rol_id FROM usuarios WHERE nombre = :usuario");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetch(); 
            $id_rol = $resultado["rol_id"];

            return $id_rol;
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
?>