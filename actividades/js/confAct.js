$(document).ready(function () {
    // Función para cerrar el diálogo más cercano
    function cerrarDialog() {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    }

    /***********************************************PREGUNTAS******************************************************/

    // Abrir el diálogo de creación de preguntas al hacer clic en el botón
    $(".new-question").on("click", function () {
        const dialog = document.getElementById(`dialog-new-question`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de preguntas al hacer clic en "Cancelar"
    $(".cancelar-nueva-pregunta").on("click", cerrarDialog);

    // Abrir el diálogo de edición de pregunta correspondiente al hacer clic en un botón de edición
    $(".edit-question").on("click", function () {
        const id_pregunta = $(this).data("question-id");
        const dialog = document.getElementById(`dialog-edit-question-${id_pregunta}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de pregunta al hacer clic en "Cancelar"
    $(".cancelar-cambio-pregunta").on("click", cerrarDialog);

    // Abrir el diálogo de eliminación de pregunta al hacer clic en un botón de "papelera"
    $(".delete-question").on("click", function () {
        const id_pregunta = $(this).data("question-id");
        const dialog = document.getElementById(`dialog-delete-question-${id_pregunta}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de eliminación de pregunta al hacer clic en "Cancelar"
    $(".cancelar-eliminar-pregunta").on("click", cerrarDialog);
    
    /*************************************************ACCIONES******************************************************/

    // Abrir el diálogo de creación de acciones al hacer clic en el botón 
    $(".new-action").on("click", function () {
        const dialog = document.getElementById(`dialog-new-action`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de acciones al hacer clic en "Cancelar"
    $(".cancelar-nueva-accion").on("click", cerrarDialog);

    // Abrir el diálogo de edición de accion correspondiente al hacer clic en un botón de edición
    $(".edit-action").on("click", function () {
        const id_accion = $(this).data("action-id");
        const dialog = document.getElementById(`dialog-edit-action-${id_accion}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de accion al hacer clic en "Cancelar"
    $(".cancelar-cambio-accion").on("click", cerrarDialog);

    // Abrir el diálogo de eliminación de accion al hacer clic en un botón de "papelera"
    $(".delete-action").on("click", function () {
        const id_accion = $(this).data("action-id");
        const dialog = document.getElementById(`dialog-delete-action-${id_accion}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de eliminación de accion al hacer clic en "Cancelar"
    $(".cancelar-eliminar-accion").on("click", cerrarDialog);

    /*************************************************EVENTOS******************************************************/

    // Abrir el diálogo de edición de evento correspondiente al hacer clic en un botón de edición
    $(".add-acction").on("click", function () {
        const id_evento = $(this).data("event-id");
        const dialog = document.getElementById(`dialog-add-acction-event-${id_evento}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de evento al hacer clic en "Cancelar"
    $(".cancelar-añadir-accion-evento").on("click", cerrarDialog);

    // Abrir el diálogo de edición de evento correspondiente al hacer clic en un botón de edición
    $(".remove-acction").on("click", function () {
        const id_evento = $(this).data("event-id");
        const dialog = document.getElementById(`dialog-remove-acction-event-${id_evento}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de evento al hacer clic en "Cancelar"
    $(".cancelar-eliminar-accion-evento").on("click", cerrarDialog);

    // Abrir el diálogo de edición de evento correspondiente al hacer clic en un botón de edición
    $(".edit-event").on("click", function () {
        const id_evento = $(this).data("event-id");
        const dialog = document.getElementById(`dialog-edit-event-${id_evento}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de evento al hacer clic en "Cancelar"
    $(".cancelar-cambio-evento").on("click", cerrarDialog);
});
