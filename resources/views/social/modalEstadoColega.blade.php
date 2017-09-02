<div id="ModalEstadoColega">
    {!!Form::open(['url' => route('estadoColega'), 'method' => 'POST', 'role'=>'form','files' => 'true'])!!}
    {!!Form::hidden('usuarioid',$data->usuarioid,['class'=>'form-control'])!!}
    <div class="modal-header bg-primary">
        <h4>Estado Solicitud</h4>
    </div>

    <div class="modal-body" id="usuario">
        <p>¿Deseas <strong>Eliminar</strong> este colega de tu lista?</p>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Aceptar">

    </div>
    {!!Form::close()!!}
</div>
<script type="text/javascript">
    var modal = $('#ModalEstadoColega');

    $(function () {
        validarFormulario();// validar forularios con kendo
        eventResultFormFile(modal, onSuccess)

    });

    function validarFormulario() {
        var container = $('form');

        kendo.init(container);

        container.kendoValidator({
            //organiza los mensajes personalizados
            messages: {
                required: "Este campo es obligatorio"
            },
            //define reglas si necesita tener mas  de solo el campo requerido
            rules: {}
        });
    }

    function onSuccess(result) {

        result = JSON.parse(result)

        switch (result.estado) {
            case "success":
                $.msgbox(result.mensaje, {type: 'success'}, function () {
                    modalBs.modal('hide');
                    $('#GridColegas').data('kendoGrid').dataSource.read();
                    $('#GridColegas').data('kendoGrid').refresh();
                });
                break;
            case "error":
                $.msgbox(result.mensaje, {type: 'error'});
                break;
            case "fatal":
                $.msgbox(result.mensaje, {type: 'error'});
                break;
            case "nopass":
                $.msgbox(result.mensaje, {type: 'info'});
                break;
            default:
                $.msgbox("Error desconocido", {type: 'error'});
        }

    }
</script>