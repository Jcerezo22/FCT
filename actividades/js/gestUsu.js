$(window).on("load",inicio);

function inicio(){
    $("#edit-group").on("click",anndirDefinicion);
    $("#aplicar-grupo").on("click",quitarDefinicion);
    $("#cancelar-grupo").on("click",anndirDefinicion);
    $("#quitarDef").on("click",quitarDefinicion);
    $("#annadirDef").on("click",anndirDefinicion);
    $("#quitarDef").on("click",quitarDefinicion);
}   

function inicio()
{
    /* Abrir registro */
    let botonRegistro = document.getElementById("registro");
    if (document.addEventListener)
        botonRegistro.addEventListener("click", mostrarDialogRegistro)
    else if (document.attachEvent)
        botonRegistro.attachEvent("onclick", mostrarDialogRegistro);

    /* Cerrar registro */
    let cancelarRegistro = document.getElementById("cancelarRegistro");
    if (document.addEventListener)
        cancelarRegistro.addEventListener("click", ocultarDialogRegistro)
    else if (document.attachEvent)
        cancelarRegistro.attachEvent("onclick", ocultarDialogRegistro);

    /* Enviar registro */
    let compRegistro = document.getElementById("comprobarRegistro");
    if (document.addEventListener)
        compRegistro.addEventListener("click", comprobarRegistro)
    else if (document.attachEvent)
        compRegistro.attachEvent("onclick", comprobarRegistro);

    /**************************************************************/

    /* Abrir inicio */
    let botonInicio = document.getElementById("inicio");
    if (document.addEventListener)
        botonInicio.addEventListener("click", mostrarDialogInicio)
    else if (document.attachEvent)
        botonInicio.attachEvent("onclick", mostrarDialogInicio);

    /* Cerrar inicio */
    let cancelarInicio = document.getElementById("cancelarInicio");
    if (document.addEventListener)
        cancelarInicio.addEventListener("click", ocultarDialogInicio)
    else if (document.attachEvent)
        cancelarInicio.attachEvent("onclick", ocultarDialogInicio);

    /* Enviar inicio */
    let compInicio= document.getElementById("comprobarInicio");
    if (document.addEventListener)
        compInicio.addEventListener("click", comprobarCookie)
    else if (document.attachEvent)
        compInicio.attachEvent("onclick", comprobarCookie);
}