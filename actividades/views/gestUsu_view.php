<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Gestionar usuarios</title>
        <link rel="stylesheet" href="../css/gestUsu.css">
        <script src="../js/jquery-3.7.1.min.js"></script>
		<script src="../js/gestUsu.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <h1>Gestionar usuarios</h1>
            <div class="admin-container">
                <button type="button" class="admin-button volver" onclick="window.location.href='../index.php'">Volver</button>	
            </div>  
            <div class="groups">
                <button class="manage-users">Grupos</button>
                <button class="new-group">+ Nuevo grupo</button>
                <table>
                    <?php 
                        $grupos = buscarGrupos();
                        
                        foreach($grupos as $row) {
                            echo "<tr><td>". $row["nombre"] ."</td><td>";
                            $usuPorGrupo = buscarUsuPorGrupos($row["id"]);
                            if(!empty($usuPorGrupo))
                            {
                                if(count($usuPorGrupo) > 1)
                                {
                                    for($i=0 ; $i<2 ; $i++){
                                        if($i==0)
                                            echo $usuPorGrupo[$i]["nombre"]. ", ";
                                        else    
                                            echo $usuPorGrupo[$i]["nombre"]. "...";
                                    }
                                }
                                else
                                {
                                    echo $usuPorGrupo[0]["nombre"];
                                }
                            }
                            else
                            {
                                echo "...";
                            }
                            echo "</td><td><button class='edit edit-group' data-group-id='". $row["id"] ."'>✏️</button></td></tr>";
                            echo "
                            <dialog id='dialog-edit-group-". $row["id"] ."'>
                                <form method='post' id='edit-group' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                    <div class='form-row'><p>Añadir al grupo de <b>". $row["nombre"]  ."</b> a </p>
                                    <select name='usuarios' class='form-control'>";
                                        mostrarUsuarios();
                            echo "
                                    </select></div><br>
                                    <input type='hidden' name='grupo_id' value='". $row["id"] ."'>
                                    <input type='button' value='Aplicar' name='Aplicar' id='aplicar-grupo'>
                                    <input type='button' value='Cancelar'class='cancelar-grupo' data-dialog-id='dialog-edit-group-". $row["id"] ."'></input>
                                </form>
                            </dialog>";
                        }
                    ?>
                </table>
            </div>
            <div class="users">
                <button class="manage-users">Usuarios</button>
                <button class="new-user">+ Nuevo usuario</button>
                <table>
                    <?php 
                        $usuarios = buscarUsuarios();
                        
                        foreach($usuarios as $row) {
                            echo "<tr><td>". $row["nombre"] ."</td><td>". $row["nombreRol"] ."</td><td><button class='edit'>✏️</button></td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

    