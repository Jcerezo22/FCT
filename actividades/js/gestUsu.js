$(document).ready(function () {
    // Abrir el diálogo correspondiente al hacer clic en un botón de edición
    $(".edit-group").on("click", function () {
        const groupId = $(this).data("group-id");
        const dialog = document.getElementById(`dialog-edit-group-${groupId}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo al hacer clic en "Cancelar"
    $(".cancelar-grupo").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });

    // Abrir el diálogo correspondiente al hacer clic en un botón de edición
    $(".edit-rol").on("click", function () {
        const rolId = $(this).data("rol-id");
        const dialog = document.getElementById(`dialog-edit-rol-${rolId}`);
        if (dialog) {
            dialog.showModal();
        }
    });

    // Cerrar el diálogo al hacer clic en "Cancelar"
    $(".cancelar-rol").on("click", function () {
        const dialog = $(this).closest("dialog").get(0);
        if (dialog) {
            dialog.close();
        }
    });
});
