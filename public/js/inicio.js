/*permite procedimientos ajax para laravel*/
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var modalBs = $('#modalBs');
var modalBsContent = $('#modalBs').find(".modal-content");
$(function () {

    /*elimina boton de seleccion de filtros de la grid*/

    $('span[unselectable].k-dropdown-wrap.k-state-default').removeAttr('style');
    $('table .k-dropdown-wrap.k-state-default').css('display', 'none');
    $('table span.k-widget.k-dropdown.k-header.k-dropdown-operator').remove();
    // $('table').addClass('.table .table-responsive')
    handleAjaxModal();
})

function handleAjaxModal() {


    // Limpia los eventos asociados para elementos ya existentes, asi evita duplicación
    $("a[data-modal]").unbind("click");
    // Evita cachear las transaccione Ajax previas
    $.ajaxSetup({cache: false});

    // Configura evento del link para aquellos para los que desean abrir popups
    $("a[data-modal]").on("click", function (e) {
        var dataModalValue = $(this).data("modal");

        modalBsContent.load(this.href, function (response, status, xhr) {
            switch (status) {
                case "success":
                    modalBs.modal({backdrop: 'static', keyboard: false}, 'show');

                    modalBs.find(".modal-dialog").removeClass("modal-sm");
                    modalBs.find(".modal-dialog").removeClass("modal-md");
                    modalBs.find(".modal-dialog").removeClass("modal-lg");
                    modalBs.find(".modal-dialog").removeClass("modal-xl");

                    switch (dataModalValue) {
                        case "modal-sm":
                            modalBs.find(".modal-dialog").addClass("modal-sm");
                            break;
                        case "modal-md":
                            modalBs.find(".modal-dialog").addClass("modal-md");
                            break;
                        case "modal-lg":
                            modalBs.find(".modal-dialog").addClass("modal-lg");
                            break;
                        case "modal-xl":
                            modalBs.find(".modal-dialog").addClass("modal-xl");
                            break;
                    }
                    break;

                case "error":
                    var message = "Error de ejecución: " + xhr.status + " " + xhr.statusText;
                    if (xhr.status == 403) $.msgbox(response, {type: 'error'});
                    else $.msgbox(message, {type: 'error'});
                    break;
            }

        });
        return false;
    });
}

function eventResultForm(modal, onSuccess) {
    modal.find('form').submit(function () {
        event.preventDefault();
        $.ajax({
            url: this.action,
            type: this.method,
            data: $(this).serialize(),
            processData: false,
            contentType: false,
            success: function (result) {
                onSuccess(result);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var message = "Error de ejecución: " + textStatus + " " + errorThrown;
                $.msgbox(message, {type: 'error'});
                console.log("Error: ");
            }
        });
        return false;
    });
}

function eventResultFormFile(modal, onSuccess) {
    modal.find('form').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: this.action,
            type: this.method,
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                onSuccess(result);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                var message = "Error de ejecución: " + textStatus + " " + errorThrown;
                $.msgbox(message, {type: 'error'});
                console.log("Error: ");
            }
        });
    });
}
