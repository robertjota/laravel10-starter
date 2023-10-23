document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector('#formulario');

    var calendarEl = document.getElementById('agenda');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',
        locale: "es",
        timeZone: 'America/Caracas',
        displayEventTime: false,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },

        //muestra los eventos por get solo si no esta protegida la vista
        events: baseURL+"/admin/eventos/mostrar",

        //muestra los eventos por post solo si esta protegida la vista
        /* EventSources: {
            url: baseURL + "/admin/eventos/mostrar",
            method: "POST",
            extraParams: {
                _token: formulario._token.value
            }
        }, */

        //seleciona la fecha del evento y muestra el formulario
        dateClick: function (info) {
            formulario.reset();

            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;

            $("#evento").modal("show");
            if ($("#btnModificar").show()) {
                $("#btnModificar").hide();
                $("#btnEliminar").hide();
                $("#btnGuardar").show();
            }
        },

        //selecciona un evento y muestra su informacion en el formulario
        eventClick: function (info) {
            var evento = info.event;
            var id = evento.id;

            axios.post(baseURL+"/admin/eventos/editar/"+id).
                then((response) => {
                    formulario.id.value = response.data.id;
                    formulario.title.value = response.data.title;
                    formulario.description.value = response.data.description;
                    formulario.start.value = response.data.start;
                    formulario.end.value = response.data.end;

                    $("#evento").modal("show");
                    if ($("#btnModificar").hide()) {
                        $("#btnModificar").show();
                        $("#btnEliminar").show();
                        $("#btnGuardar").hide();
                    }
                }).catch(
                    error => {
                        if (error.response) {
                            swal.fire({
                                title: "Error",
                                text: error.response.data.message,
                                type: "error",
                                showConfirmButton: true,
                            });
                            //console.log(error.response.data);
                        }
                    }
                );
        },
    });

    //muestra el calendario
    calendar.render();

    //guardar un evento
    document.getElementById('btnGuardar').addEventListener('click', function () {
        enviarDatos("/admin/eventos/guardar");
    });

    //eliminar un evento
    document.getElementById('btnEliminar').addEventListener('click', function () {
        enviarDatos("/admin/eventos/eliminar/"+formulario.id.value);

    });

    //actualizar un evento
    document.getElementById('btnModificar').addEventListener('click', function () {
        enviarDatos("/admin/eventos/actualizar/" + formulario.id.value);

    });

    function enviarDatos(url) {

        const datos = new FormData(formulario);
        const nuevaUrl = baseURL + url;

        axios.post(nuevaUrl, datos).
            then((response) => {
                calendar.refetchEvents();
                $("#evento").modal("hide");

            }).catch(
                error => {
                    if (error.response) {
                        swal.fire({
                            title: "Error",
                            text: error.response.data.message,
                            type: "error",
                            showConfirmButton: true,
                        });
                        //console.log(error.response.data);
                    }
                }
            );
    }

});


