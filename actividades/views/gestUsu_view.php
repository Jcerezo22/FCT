<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Gestionar usuarios</title>
        <link rel="stylesheet" href="../css/gestUsu.css">
    </head>
    <body>
        <div class="container">
            <h1>Gestionar usuarios</h1>
            <div class="admin-container">
                <button type="button" class="admin-button reservar" onclick="window.location.href='../index.php'">Volver</button>	
            </div>  
            <div class="groups">
                <button class="manage-users">Grupos</button>
                <button class="new-group">+ Nuevo grupo</button>
                <table>
                    <?php 
                        $grupos = mostrarGrupos();
                        
                        foreach($grupos as $row) {
                            echo "<tr><td>". $row["nombre"] ."</td><td>";
                            $usuPorGrupo = mostrarUsuPorGrupos($row["id"]);
                            if(!empty($usuPorGrupo))
                            {
                                if(count($usuPorGrupo) > 1)
                                {
                                    for($i=0 ; $i<2 ; $i++){
                                        if($i==0)
                                            echo $usuPorGrupo[$i]["nombre"]. ", ";
                                        else    
                                            echo $usuPorGrupo[$i]["nombre"];
                                    }
                                }
                                else
                                {
                                    echo $usuPorGrupo[0]["nombre"];
                                }
                            }
                            echo "...</td><td><button class='edit'>✏️</button></td></tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="users">
                <button class="manage-users">Usuarios</button>
                <button class="new-user">+ Nuevo usuario</button>
                <table>
                    <?php 
                        $usuarios = mostrarUsuarios();
                        
                        foreach($usuarios as $row) {
                            echo "<tr><td>". $row["nombre"] ."</td><td>". $row["nombreRol"] ."</td><td><button class='edit'>✏️</button></td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

    