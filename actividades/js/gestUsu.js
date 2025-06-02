$(document).ready(function () {
    // Función para cerrar el diálogo más cercano
    function cerrarDialog() {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    }

    /***********************************************GRUPOS******************************************************/

    // Abrir el diálogo de creación de grupos al hacer clic en un botón de edición
    $(".new-group").on("click", function () {
        const dialog = document.getElementById(`dialog-new-group`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de grupos al hacer clic en "Cancelar"
    $(".cancelar-nuevo-grupo").on("click", cerrarDialog);

    // Abrir el diálogo de edición de grupo correspondiente al hacer clic en un botón de edición
    $(".edit-group").on("click", function () {
        const groupId = $(this).data("group-id");
        const dialog = document.getElementById(`dialog-edit-group-${groupId}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de edición de grupo al hacer clic en "Cancelar"
    $(".cancelar-grupo").on("click", cerrarDialog);

    // Abrir el diálogo de modificación de grupo correspondiente al hacer clic en un botón "menos"
    $(".delete-user-group").on("click", function () {
        const groupId = $(this).data("group-id");
        const dialog = document.getElementById(`dialog-delete-user-group-${groupId}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo de modificación de grupo al hacer clic en "Cancelar"
    $(".cancelar-eliminar-usuario-grupo").on("click", cerrarDialog);

    /***********************************************ROLES******************************************************/

    // Abrir el diálogo de edición de rol correspondiente al hacer clic en un botón de edición
    $(".edit-rol").on("click", function () {
        const rolId = $(this).data("rol-id");
        const dialog = document.getElementById(`dialog-edit-rol-${rolId}`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de edición de rol al hacer clic en "Cancelar"
    $(".cancelar-rol").on("click", cerrarDialog);

    /***********************************************USUARIOS******************************************************/
    
    // Abrir el diálogo de creación de usuarios al hacer clic en un botón de edición
    $(".new-user").on("click", function () {
        const dialog = document.getElementById(`dialog-new-user`);
        if (dialog) {
            dialog.showModal();
        } 
    });

    // Cerrar el diálogo de creación de usuarios al hacer clic en "Cancelar"
    $(".cancelar-nuevo-usuario").on("click", cerrarDialog);
});
