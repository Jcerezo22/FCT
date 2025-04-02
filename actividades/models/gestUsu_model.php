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
    function buscarUsuPorGrupos($grupo_id)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT nombre FROM usuarios WHERE grupo_id = :grupo_id");
            $stmt->bindParam(':grupo_id', $grupo_id);
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
    function mostrarUsuarios($grupo_id)
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT nombre FROM usuarios WHERE grupo_id != :grupo_id");
            $stmt->bindParam(':grupo_id', $grupo_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            if(!empty($resultado))
            {
                foreach($resultado as $row) {
                    echo "<option value='". $row["nombre"] ."'>" . $row["nombre"] ."</option><br>";
                }
            }
            else
            {
                echo "<option value='1'>Todos los usuarios pertenecen a este grupo</option><br>";
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