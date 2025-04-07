$(document).ready(function () {
    // Abrir el diálogo de edición de grupo correspondiente al hacer clic en un botón de edición
    $(".edit-group").on("click", function () {
        const groupId = $(this).data("group-id");
        const dialog = document.getElementById(`dialog-edit-group-${groupId}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de grupo al hacer clic en "Cancelar"
    $(".cancelar-grupo").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });

    // Abrir el diálogo de edición de rol correspondiente al hacer clic en un botón de edición
    $(".edit-rol").on("click", function () {
        const rolId = $(this).data("rol-id");
        const dialog = document.getElementById(`dialog-edit-rol-${rolId}`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de edición de rol al hacer clic en "Cancelar"
    $(".cancelar-rol").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });

    // Abrir el diálogo de creación de grupos al hacer clic en un botón de edición
    $(".new-group").on("click", function () {
        const dialog = document.getElementById(`dialog-new-group`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de grupos al hacer clic en "Cancelar"
    $(".cancelar-nuevo-grupo").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });
    
    // Abrir el diálogo de creación de usuarios al hacer clic en un botón de edición
    $(".new-user").on("click", function () {
        const dialog = document.getElementById(`dialog-new-user`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de usuarios al hacer clic en "Cancelar"
    $(".cancelar-nuevo-usuario").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });
});
