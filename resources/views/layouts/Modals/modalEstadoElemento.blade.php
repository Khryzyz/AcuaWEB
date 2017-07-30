<div id="ModalEstadoElemento">
    {!!Form::open(['url' => route('modalEstadoElemento'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-edit"></i> {{$data->estado}} {{$data->elemento}}: {{$data->nombre}}</h4>
    </div>
    <div class="modal-body">

        {!!Form::hidden('estado',$data->estadoactual,['class'=>'form-control'])!!}
        {!!Form::hidden('elemento',$data->elementotipo,['class'=>'form-control'])!!}
        {!!Form::hidden('id',$data->id,['class'=>'form-control'])!!}

        <?php if ($data->estadoactual == 1) { ?>
        <?php if ($data->relacion > 0) { ?>
        <p>El elemento <strong>{{$data->nombre}}</strong> esta relacionado a <strong>{{$data->relacion}}</strong>
            procesos.</p>
        <p>Para <strong>"Desactivar"</strong> el elemento no debe estar relacionado a procesos activos.</p>
        <?php } else { ?>
        <p>¿Deseas <strong>"Desactivar"</strong> el elemento <strong>{{$data->nombre}}</strong>?</p>
        <?php } ?>
        <?php } else { ?>
        <p>¿Deseas <strong>"Activar"</strong> el elemento <strong>{{$data->nombre}}</strong>?</p>
        <?php } ?>


    </div>

    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <?php if ($data->relacion == 0) { ?>
        <input type="submit" class="btn btn-primary" value="Guardar">
        <?php } ?>
    </div>

    {!!Form::close()!!}

</div>

<script type="text/javascript">
    var modal = $('#ModalEstadoElemento');

    $(function () {
        eventResultForm(modal, onSuccess)
    });

    function onSuccess(result) {

        result = JSON.parse(result)

        switch (result.estado) {
            case "success":
                $.msgbox(result.mensaje, {type: 'success'}, function () {
                    modalBs.modal('hide');
                    <?php switch($data->elementotipo) {
                        case 1:
                     ?>
                    $('#GridUsuarios').data('kendoGrid').dataSource.read();
                    $('#GridUsuarios').data('kendoGrid').refresh();
                    <?php
                            break;
                        case 2:
                    ?>
                    $('#GridPlanta').data('kendoGrid').dataSource.read();
                    $('#GridPlanta').data('kendoGrid').refresh();
                    <?php
                            break;
                        case 3:
                    ?>
                    $('#GridPez').data('kendoGrid').dataSource.read();
                    $('#GridPez').data('kendoGrid').refresh();
                    <?php
                    break;
                        case 4:
                    ?>
                    $('#GridProceso').data('kendoGrid').dataSource.read();
                    $('#GridProceso').data('kendoGrid').refresh();
                    <?php
                    break;
                    }?>
                });
                break;
            case "error":
                $.msgbox(result.mensaje);
                break;
            case "fatal":
                $.msgbox(result.mensaje, {type: 'error'});
                break;
            default:
                $.msgbox("Error desconocido", {type: 'error'});
        }

    }
</script>