/*permite procedimientos ajax para laravel*/
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var modalBs = $('#modalBs');
var modalBsContent = $('#modalBs').find(".modal-content");
$(function(){

    /*elimina boton de seleccion de filtros de la grid*/

    $('.k-grid.k-widget .k-dropdown-wrap.k-state-default').remove();

    handleAjaxModal();
})

function handleAjaxModal() {


    // Limpia los eventos asociados para elementos ya existentes, asi evita duplicación
    $("a[data-modal]").unbind("click");
    // Evita cachear las transaccione Ajax previas
    $.ajaxSetup({ cache: false });

    // Configura evento del link para aquellos para los que desean abrir popups
    $("a[data-modal]").on("click", function (e) {
        var dataModalValue = $(this).data("modal");

        modalBsContent.load(this.href, function (response, status, xhr) {
            switch (status) {
                case "success":
                modalBs.modal({ backdrop: 'static', keyboard: false }, 'show');

                if (dataModalValue == "modal-lg") {
                    modalBs.find(".modal-dialog").addClass("modal-lg");
                } else {
                    modalBs.find(".modal-dialog").removeClass("modal-lg");
                }

                break;

                case "error":
                var message = "Error de ejecución: " + xhr.status + " " + xhr.statusText;
                if (xhr.status == 403) $.msgbox(response, { type: 'error' });
                else $.msgbox(message, { type: 'error' });
                break;
            }

        });
        return false;
    });
}


function eventResultForm(modal, onSuccess) {
    modal.find('form').submit(function () {
        $.ajax({
            url: this.action,
            type: this.method,
            data: $(this).serialize(),
            success: function (result) {
                onSuccess(result);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var message = "Error de ejecución: " + textStatus + " " + errorThrown;
                $.msgbox(message, { type: 'error' });
                console.log("Error: ");
            }
        });
        return false;
    });
}


