<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Configurar actividades</title>
        <link rel="stylesheet" href="../css/confAct.css">
        <script src="../js/jquery-3.7.1.min.js"></script>
		<script src="../js/confAct.js" type="text/javascript"></script>
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
                        <div class='form-row'>
                            <select name="tipoRespuesta" class="inputDialog">
                                <option value="" disabled selected>Selecciona el tipo de respuesta</option>
                                <option value="textoLibre">Texto libre</option>
                                <option value="numerico">Numérico</option>
                                <option value="si/no">Sí/No</option>
                                <option value="opcionMultiple">Opción múltiple</option>
                            </select>
                        </div>
                        <input type='submit' value='Añadir' name='añadirPregunta' id='añadir-pregunta'>
                        <input type='button' value='Cancelar'class='cancelar-nueva-pregunta'></input>
                    </form>
                </dialog>
                <table>
                    <?php 
                        $preguntas = buscarPreguntas();
                        
                        foreach($preguntas as $row) {
                            if($row["id_pregunta"] != 0){
                                echo "<tr><td>". $row["titulo"] ."</td>";
                                echo "<td><button class='edit edit-question' data-question-id='". $row["id_pregunta"] ."'>✏️</button></td>";
                                echo "<td><button class='edit delete-question' data-question-id='". $row["id_pregunta"] ."'>🗑️</button></td></tr>";
                                echo "
                                <dialog id='dialog-edit-question-". $row["id_pregunta"] ."'>
                                    <form method='post' id='edit-question' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                        <div class='form-row'>
                                            <input type='text' name='name' placeholder='Nuevo titulo de la pregunta' class='inputDialog' size='49'>
                                        </div><br>
                                        <input type='submit' value='Aplicar' name='aplicarCambioPregunta' id='aplicar-cambio-pregunta'>
                                        <input type='button' value='Cancelar' class='cancelar-cambio-pregunta' data-dialog-id='dialog-edit-question-". $row["id_pregunta"] ."'></input>
                                    </form>
                                </dialog>";
                                echo "
                                <dialog id='dialog-delete-question-". $row["id_pregunta"] ."' class='eliminar'>
                                    <form method='post' id='delete-question' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                        <div class='form-row'><p>¿Quieres eliminar la <b>pregunta</b>?</p></div><br>
                                        <input type='submit' value='Eliminar' name='aplicarEliminarDelGrupo' id='aplicar-eliminar-del-grupo'>
                                        <input type='button' value='Cancelar' class='cancelar-eliminar-pregunta' data-dialog-id='dialog-delete-question-". $row["id_pregunta"] ."'></input>
                                    </form>
                                </dialog>";
                            }
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
                            echo "<td><button class='edit edit-action' data-action-id='". $row["id_accion"] ."'>✏️</button></td>";
                            echo "<td><button class='edit delete-action' data-action-id='". $row["id_accion"] ."'>🗑️</button></td></tr>";
                            echo "
                            <dialog id='dialog-edit-action-". $row["id_accion"] ."'>
                                <form method='post' id='edit-action' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                    <div class='form-row'>
                                        <input type='text' name='name' placeholder='Nuevo titulo de la acción' class='inputDialog' size='49'>
                                    </div><br>
                                    <input type='submit' value='Aplicar' name='aplicarCambioAccion' id='aplicar-cambio-accion'>
                                    <input type='button' value='Cancelar' class='cancelar-cambio-accion' data-dialog-id='dialog-edit-action-". $row["id_accion"] ."'></input>
                                </form>
                            </dialog>";
                            echo "
                            <dialog id='dialog-delete-action-". $row["id_accion"] ."' class='eliminar'>
                                <form method='post' id='delete-action' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                    <div class='form-row'><p>¿Quieres eliminar la <b>acción</b>?</p></div><br>
                                    <input type='submit' value='Eliminar' name='aplicarEliminarDelGrupo' id='aplicar-eliminar-del-grupo'>
                                    <input type='button' value='Cancelar' class='cancelar-eliminar-accion' data-dialog-id='dialog-delete-action-". $row["id_accion"] ."'></input>
                                </form>
                            </dialog>";
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
                            echo "
                            <dialog id='dialog-edit-event-". $row["id_evento"] ."'>
                                <form method='post' id='edit-event' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                                    <div class='form-row'>
                                        <input type='text' name='name' placeholder='Nuevo titulo del evento' class='inputDialog' size='49'>
                                    </div><br>
                                    <input type='submit' value='Aplicar' name='aplicarCambioEvento' id='aplicar-cambio-evento'>
                                    <input type='button' value='Cancelar' class='cancelar-cambio-evento' data-dialog-id='dialog-edit-event-". $row["id_evento"] ."'></input>
                                </form>
                            </dialog>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

    