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
                            echo "</td><td><button class='edit' id='edit-group'>✏️</button></td></tr>";
                        }
                    ?>
                </table>
                <dialog id="dialog-edit-group">
                    <form method="dialog" id="edit-group">
                        <label for="nomUsuR">Nombre de usuario: </label>
                        <input type="text" id="nomUsuR" name="nomUsuR"><br><br>
                        <label for="contraR">Contraseña: </label>
                        <input type="password" id="contraR" name="contraR"><br><br>
                        <input type="button" value="Aceptar" name="Aceptar" id="aplicar-grupo">
                        <input type="button" value="Cancelar" name="Cancelar" id="cancelar-grupo">
                    </form>
                </dialog>
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

    