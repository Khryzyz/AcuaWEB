<div id="ModalEstadoGaleria">

    {!!Form::open(['url' => route('modalEstadoGaleria'), 'method' => 'POST', 'role'=>"form"])!!}

    <div class="modal-header bg-primary">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4><i class="fa fa-edit"></i> Cambiar estado</h4>

    </div>

    <div class="modal-body">

        {!!Form::hidden('id',$data->idGaleria,['class'=>'form-control'])!!}

        {!!Form::hidden('estado',$data->estado,['class'=>'form-control'])!!}

        <?php if ($data->estado == 1) { ?>

        <p>¿Deseas <strong>"Desactivar"</strong> el elemento de la galeria?</p>

        <?php } else { ?>

        <p>¿Deseas <strong>"Activar"</strong> el elemento de la galeria?</p>

        <?php } ?>


    </div>

    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>

    {!!Form::close()!!}

</div>

<script type="text/javascript">
    var modal = $('#ModalEstadoGaleria');

    $(function () {
        eventResultForm(modal, onSuccess)
    });

    function onSuccess(result) {

        result = JSON.parse(result)

        switch (result.estado) {
            case "success":
                $.msgbox(result.mensaje, {type: 'success'}, function () {
                    modalBs.modal('hide');
                    $('#GridGaleria').data('kendoGrid').dataSource.read();
                    $('#GridGaleria').data('kendoGrid').refresh();
                });
                break;
            case "error":
                $.msgbox(result.mensaje, {type: 'info'});
                break;
            case "fatal":
                $.msgbox(result.mensaje, {type: 'error'});
                break;
            default:
                $.msgbox("Error desconocido", {type: 'error'});
        }

    }
</script>