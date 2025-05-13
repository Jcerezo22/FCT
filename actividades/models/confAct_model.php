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
?>