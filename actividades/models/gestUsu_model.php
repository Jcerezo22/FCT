<?php
    /* Busca los usuarios que hay en la base de datos*/
    function buscarUsuarios()
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.nombre nombre, a.id_usuario id, b.nombre nombreRol FROM usuarios a, roles b WHERE a.rol_id = b.id ORDER BY 1");
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

    /* Busca los usuarios del grupo pasado por parametro*/
    function buscarUsuPorGrupos($id_grupo)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.nombre FROM usuarios a, grupo_usuario b WHERE b.id_grupo = :id_grupo AND a.id_usuario = b.id_usuario");
            $stmt->bindParam(':id_grupo', $id_grupo);
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

    /* Busca los grupos que hay en la base de datos*/
    function buscarGrupos()
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT id, nombre FROM grupos ORDER BY 2");
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

    /* Muestra como opciones los usuarios que no estan en el grupo pasado por parametro */
    function mostrarUsuariosAñadir($id_grupo)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.nombre, a.id_usuario FROM usuarios a JOIN grupo_usuario b ON a.id_usuario = b.id_usuario WHERE NOT EXISTS (SELECT 1 FROM grupo_usuario b2 WHERE b2.id_usuario = a.id_usuario AND b2.id_grupo = :id_grupo) GROUP BY a.id_usuario, a.nombre");
            $stmt->bindParam(':id_grupo', $id_grupo);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            if(!empty($resultado))
            {
                foreach($resultado as $row) {
                    echo "<option value='". $row["id_usuario"] ."'>" . $row["nombre"] ."</option><br>";
                }
            }
            else
            {
                echo "<option value='0'>Todos los usuarios pertenecen a este grupo</option><br>";
            }
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    /* Muestra como opciones los usuarios que estan en el grupo pasado por parametro */
    function mostrarUsuariosEliminar($id_grupo)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.nombre, a.id_usuario FROM usuarios a, grupo_usuario b WHERE b.id_grupo = :id_grupo AND a.id_usuario = b.id_usuario");
            $stmt->bindParam(':id_grupo', $id_grupo);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            if(!empty($resultado))
            {
                foreach($resultado as $row) {
                    echo "<option value='". $row["id_usuario"] ."'>" . $row["nombre"] ."</option><br>";
                }
            }
            else
            {
                echo "<option value='0'>Ningún usuario pertenece a este grupo</option><br>";
            }
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    /* Muestra como opciones los roles que existen en la base de datos que el usuario pasado por parametro no tenga ya*/
    function mostrarRoles($nombreRol)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT id, nombre FROM roles WHERE nombre != :nombreRol");
            $stmt->bindParam(':nombreRol', $nombreRol);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                echo "<option value='". $row["id"] ."'>" . $row["nombre"] ."</option><br>";
            }
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = cerrarBD($conn);
    }

    //Inserta un nuevo grupo en la base de datos 
    function insertarGrupo($nombre)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO grupos (nombre) VALUES (:nombre)");
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

    //Añade al grupo al usuario indicado
    function añadirAlGrupo($id_grupo, $id_usuario)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO grupo_usuario (id_grupo,id_usuario) VALUES (:id_grupo,:id_usuario)");
            $stmt->bindParam(':id_grupo', $id_grupo);
            $stmt->bindParam(':id_usuario', $id_usuario);
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

    //Elimina del grupo al usuario indicado
    function eliminarDelGrupo($id_grupo, $id_usuario)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM grupo_usuario WHERE id_grupo = :id_grupo AND id_usuario = :id_usuario");
            $stmt->bindParam(':id_grupo', $id_grupo);
            $stmt->bindParam(':id_usuario', $id_usuario);
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

    //Actualiza el rol del usuario indicado
    function actualizarRol($rol_id, $id_usuario)
    {
        $conn = abrirBD();

        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE usuarios SET rol_id = :rol_id WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':rol_id', $rol_id);
            $stmt->bindParam(':id_usuario', $id_usuario);
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