<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Configurar actividades</title>
        <link rel="stylesheet" href="../css/confAct.css">
        <script src="../js/jquery-3.7.1.min.js"></script>
		<script src="../js/gestUsu.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <h1>Configurar actividades</h1>
            <div class="admin-container">
                <button type="button" class="admin-button volver" onclick="window.location.href='../index.php'">Volver</button>	
            </div>  
            <div class="questions">
                <button class="manage-questions">Preguntas</button>
                <button class="new-question">+ Nueva pregunta</button>
                <dialog id="dialog-new-question">
                    <form method='post' name="new-question" id='new-question' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
                        <div class='form-row'>
                            <input type="text" name="name" placeholder="Titulo de la nueva pregunta" class="inputDialog" size="49">
                        </div>
                        <input type='submit' value='Añadir' name='añadirPregunta' id='añadir-pregunta'>
                        <input type='button' value='Cancelar'class='cancelar-nueva-pregunta'></input>
                    </form>
                </dialog>
                <table>
                    <?php 
                        $preguntas = buscarPreguntas();
                        
                        foreach($preguntas as $row) {
                            echo "<tr><td>". $row["titulo"] ."</td>";
                            echo "<td><button class='edit edit-question' data-question-id='". $row["id_pregunta"] ."'>✏️</button></td></tr>";
                            /*echo "
                            <dialog id='dialog-edit-rol-". $row["id"] ."'>
                                <form method='post' id='edit-rol' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                    <div class='form-row'><p>Cambiar a <b>". $row["nombre"]  ."</b> al rol de </p>
                                    <select name='roles' class='form-control'>";
                                        mostrarRoles($row["nombreRol"]);
                            echo "
                                    </select></div><br>
                                    <input type='hidden' name='id_usuario' value='". $row["id"] ."'>
                                    <input type='submit' value='Aplicar' name='aplicarRol' id='aplicar-rol'>
                                    <input type='button' value='Cancelar' class='cancelar-rol' data-dialog-id='dialog-edit-rol-". $row["id"] ."'></input>
                                </form>
                            </dialog>";*/
                        }
                    ?>
                </table>
            </div>
            <div class="actions">
                <button class="manage-actions">Acciones</button>
                <button class="new-action">+ Nueva acción</button>
                <dialog id="dialog-new-action">
                    <form method='post' name="new-action" id='new-action' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
                        <div class='form-row'>
                            <input type="text" name="name" placeholder="Nombre de la nueva acción" class="inputDialog"  size="49">
                        </div>
                        <input type='submit' value='Añadir' name='añadirAccion' id='annadir-accion'>
                        <input type='button' value='Cancelar'class='cancelar-nueva-accion'></input>
                    </form>
                </dialog>
                <table>
                    <?php 
                        $acciones = buscarAcciones();
                        
                        foreach($acciones as $row) {
                            echo "<tr><td>". $row["nombre"] ."</td>";
                            echo "<td><button class='edit edit-action' data-action-id='". $row["id_accion"] ."'>✏️</button></td></tr>";
                            /*echo "
                            <dialog id='dialog-edit-rol-". $row["id"] ."'>
                                <form method='post' id='edit-rol' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                    <div class='form-row'><p>Cambiar a <b>". $row["nombre"]  ."</b> al rol de </p>
                                    <select name='roles' class='form-control'>";
                                        mostrarRoles($row["nombreRol"]);
                            echo "
                                    </select></div><br>
                                    <input type='hidden' name='id_usuario' value='". $row["id"] ."'>
                                    <input type='submit' value='Aplicar' name='aplicarRol' id='aplicar-rol'>
                                    <input type='button' value='Cancelar' class='cancelar-rol' data-dialog-id='dialog-edit-rol-". $row["id"] ."'></input>
                                </form>
                            </dialog>";*/
                        }
                    ?>
                </table>
            </div>
            <div class="events">
                <button class="manage-events">Eventos</button>
                <table>
                    <?php 
                        $eventos = buscarEventos();
                        
                        foreach($eventos as $row) {
                            echo "<tr><td>". $row["nombre"] ."</td>";
                            echo "<td><button class='edit edit-event' data-event-id='". $row["id_evento"] ."'>✏️</button></td></tr>";
                            /*echo "
                            <dialog id='dialog-edit-rol-". $row["id"] ."'>
                                <form method='post' id='edit-rol' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                    <div class='form-row'><p>Cambiar a <b>". $row["nombre"]  ."</b> al rol de </p>
                                    <select name='roles' class='form-control'>";
                                        mostrarRoles($row["nombreRol"]);
                            echo "
                                    </select></div><br>
                                    <input type='hidden' name='id_usuario' value='". $row["id"] ."'>
                                    <input type='submit' value='Aplicar' name='aplicarRol' id='aplicar-rol'>
                                    <input type='button' value='Cancelar' class='cancelar-rol' data-dialog-id='dialog-edit-rol-". $row["id"] ."'></input>
                                </form>
                            </dialog>";*/
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

    