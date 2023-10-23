//Manejo de input por tipo de pago
function mostrar(id) {
    if (id == "3") {
        $("#smonto").show();
        $("#sdivisa").hide();
        $("#referencia").val("N/A");
        $("#referencia").prop("readonly", true);
        //$("#divisa").val(null);
    }

    if (id == "1") {
        $("#smonto").show();
        $("#sdivisa").hide();
        $("#referencia").val(null);
        $("#referencia").prop("readonly", false);
        $("#referencia").prop("required", "required");
        //$("#divisa").val(null);
    }

    if (id == "2") {
        $("#smonto").hide();
        $("#sdivisa").show();
        $("#referencia").val("N/A");
        $("#referencia").prop("readonly", true);
        //$("#monto").val(null);
    }
}

// mostrar numero de casa en un input
if (!$('input.casaNum').val()) {
    $('input.casaNum').val($('select#casa_id').val());
}
$('select#casa_id').change(function(){
    $('input.casaNum').val($(this).val());
});


$(document).on("click", ".btnBorrar", function () {});
function borrarSiNo(id) {
    swal.fire({
        title: "Estas Seguro de Eliminar\n el recibo #" + id + " ?",
        text: "Esto no se puede revertir!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Borrar!",
        cancelButtonText: "No, Cancelar!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "funciones.php",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    swal.fire(
                        response.titulo,
                        response.message,
                        response.status
                    );
                    $(".swal2-confirm").click(function () {
                        location.reload(true);
                    });
                },
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swal.fire("Cancelado", "Tu recibo no se eliminó :)", "error");
        }
    });
}
