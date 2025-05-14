$(document).ready(function () {
    /***********************************************PREGUNTAS******************************************************/

    // Abrir el diálogo de creación de preguntas al hacer clic en el botón
    $(".new-question").on("click", function () {
        const dialog = document.getElementById(`dialog-new-question`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de preguntas al hacer clic en "Cancelar"
    $(".cancelar-nueva-pregunta").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });

    // Abrir el diálogo de edición de pregunta correspondiente al hacer clic en un botón de edición
    $(".edit-question").on("click", function () {
        const id_pregunta = $(this).data("question-id");
        const dialog = document.getElementById(`dialog-edit-question-${id_pregunta}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de pregunta al hacer clic en "Cancelar"
    $(".cancelar-cambio-pregunta").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });
    
    /*************************************************ACCIONES******************************************************/

    // Abrir el diálogo de creación de acciones al hacer clic en el botón 
    $(".new-action").on("click", function () {
        const dialog = document.getElementById(`dialog-new-action`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de acciones al hacer clic en "Cancelar"
    $(".cancelar-nueva-accion").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });

    // Abrir el diálogo de edición de accion correspondiente al hacer clic en un botón de edición
    $(".edit-action").on("click", function () {
        const id_accion = $(this).data("action-id");
        const dialog = document.getElementById(`dialog-edit-action-${id_accion}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de accion al hacer clic en "Cancelar"
    $(".cancelar-cambio-accion").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    }); 

    /*************************************************EVENTOS******************************************************/

    // Abrir el diálogo de edición de evento correspondiente al hacer clic en un botón de edición
    $(".edit-event").on("click", function () {
        const id_evento = $(this).data("event-id");
        const dialog = document.getElementById(`dialog-edit-event-${id_evento}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de evento al hacer clic en "Cancelar"
    $(".cancelar-cambio-evento").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    }); 
});
