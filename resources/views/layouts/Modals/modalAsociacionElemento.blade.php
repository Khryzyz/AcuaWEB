<div id="ModalEstadoElemento">
    {!!Form::open(['url' => route('modalAsociarEspecimenProceso'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-edit"></i>
            <?php if ($data->asociado == 2) { ?>Retirar<?php } else { ?>Agregar<?php } ?> {{$data->elemento}}: {{$data->nombre}}</h4>
    </div>
    <div class="modal-body">

        {!!Form::hidden('id',$data->id,['class'=>'form-control'])!!}
        {!!Form::hidden('elementotipo',$data->elementotipo,['class'=>'form-control'])!!}
        {!!Form::hidden('procesoid',$data->procesoid,['class'=>'form-control'])!!}
        {!!Form::hidden('asociado',$data->asociado,['class'=>'form-control'])!!}

        <?php if ($data->asociado == 2) { ?>
        <p>¿Deseas <strong>"Retirar"</strong> el elemento <strong>{{$data->nombre}}</strong> del proceso?</p>
        <?php } else { ?>
        <p>¿Deseas <strong>"Agregar"</strong> el elemento <strong>{{$data->nombre}}</strong> al proceso?</p>
        <?php } ?>


    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
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
                    $('#GridEspecimenPlanta').data('kendoGrid').dataSource.read();
                    $('#GridEspecimenPlanta').data('kendoGrid').refresh();
                    <?php
                            break;
                        case 2:
                    ?>
                    $('#GridEspecimenPez').data('kendoGrid').dataSource.read();
                    $('#GridEspecimenPez').data('kendoGrid').refresh();
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