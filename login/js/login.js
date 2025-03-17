$(document).ready(function(){

    
var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'es',
    height: 800, 
    initialView: 'timeGridWeek',
    slotMinTime: "8:00",
    firstDay: 1,
    nowIndicator: true,
    headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    navLinks: true,
    editable: true,
    selectable: true,
    selectMirror: true,
    dayMaxEvents: true,
    eventClassNames: function(arg) {
        my_class = arg.event.espacio;
        if (arg.view.type != 'resourceTimeGridDay') {
        if (arg.event.espacio == "Patio Columnas") {
            my_class = "";
        }
        }
        return my_class;
    },
    events: function(info, successCallback, failureCallback) {
    var ids = "calendario.php?id=0";
    var cs = document.querySelectorAll(".cs");
    cs.forEach(function (v) {
        if (v.checked) {
            ids = ids.concat(",", v.value);
        }
    });
    fetch(ids)
        .then(response => {
        if (!response.ok) {
            throw new Error('Error al obtener los datos del servidor.');
        }
        return response.json();
        })
        .then(data => {
        successCallback(data);
        })
        .catch(error => {
        console.error('Error cargando eventos:', error);
        failureCallback(error);
        });
    },
    eventDidMount: function (arg) {
        var cs = document.querySelectorAll(".cs");
        cs.forEach(function (v) {
            if (arg.event.extendedProps.id_espacio == v.value) {
                if (v.checked) {
                    arg.el.style.display = "block";
                } else {
                    arg.el.style.display = "none";
                }		
            }
            
        });
    }
});


calendar.render();

var csx = document.querySelectorAll(".cs");
csx.forEach(function (el) {
    
    el.addEventListener("change", function () {
        calendar.refetchEvents();
    });
    el.checked=true;
});

calendar.refetchEvents();

});