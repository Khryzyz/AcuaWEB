<div id="ModalEstadoSolicitud">
    {!!Form::open(['url' => route('estadoSolicitud'), 'method' => 'POST', 'role'=>'form','files' => 'true'])!!}
    {!!Form::hidden('usuarioid',$data->usuarioid,['class'=>'form-control'])!!}
    {!!Form::hidden('tipo',$data->tipo,['class'=>'form-control'])!!}
    <div class="modal-header bg-primary">
        <h4>Estado Solicitud</h4>
    </div>

    <div class="modal-body" id="usuario">
        <?php switch ($data->tipo) {
        case 2:
        ?>
        <p>¿Deseas <strong>Aceptar</strong> esta solicitud?</p>
        <?php
        break;
        case 3:
        ?>
        <p>¿Deseas <strong>Rechazar</strong> esta solicitud?</p>
        <?php
        break;
        case 4:
        ?>
        <p>¿Deseas <strong>Cancelar</strong> esta solicitud?</p>
        <?php
        break;
        }
        ?>

    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Aceptar">

    </div>
    {!!Form::close()!!}
</div>
<script type="text/javascript">
    var modal = $('#ModalEstadoSolicitud');

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
                    <?php switch ($data->tipo) {
                    case 2:
                    case 3:
                    ?>
                    $('#GridSolicitudesRecibidas').data('kendoGrid').dataSource.read();
                    $('#GridSolicitudesRecibidas').data('kendoGrid').refresh();
                    <?php
                    break;
                    case 4:
                    ?>
                    $('#GridSolicitudesRealizadas').data('kendoGrid').dataSource.read();
                    $('#GridSolicitudesRealizadas').data('kendoGrid').refresh();
                    <?php
                    break;
                    }
                    ?>
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