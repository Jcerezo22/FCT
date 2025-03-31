<?php
    /* Busca los grupos que hay en la base de datos*/
    function buscarUsuarios()
    {
        $conn = abrirBD();

        try {
            $stmt = $conn->prepare("SELECT a.nombre nombre, a.id_usuario id, b.nombre nombreRol FROM usuarios a, roles b WHERE a.rol_id = b.id");
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

    /* Muestra los usuarios que no estan en el grupo pasado por parametro */
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

    /* Busca los usuarios de cada grupo que hay en la base de datos*/
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
            $stmt = $conn->prepare("SELECT id, nombre FROM grupos");
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