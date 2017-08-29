<div id="ModalAgregarImagen">

    {!!Form::open(['url' => url('configuracion/modalAgregarImagen'), 'method' => 'POST', 'role'=>'form','files' => 'true'])!!}

    <div class="modal-header <?php if ($data->tipo==1) echo "bg-success"; else echo "bg-info"; ?>">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4><i class="fa <?php if ($data->tipo==1) echo "fa-leaf"; else echo "fa-tint"; ?>"></i> Agregar Imagen</h4>

    </div>
    <div class="modal-body">
        {!!Form::hidden('usuarioid',$data->idusuario,['class'=>'form-control'])!!}
        {!!Form::hidden('tipo',$data->tipo,['class'=>'form-control'])!!}
        {!!Form::hidden('id',$data->id,['class'=>'form-control'])!!}
        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('titulo', 'Titulo:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('titulo',null,['class'=>'form-control', 'required', 'placeholder'=>'Titulo'])!!}
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('descripcion', 'Descripción:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('descripcion',null,['class'=>'form-control', 'required', 'placeholder'=>'Descripción'])!!}
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('imagen', 'Imagen:')!!}
            </div>
            <div class="col-md-8">
                <?php
                $upload = new \Kendo\UI\Upload('imagen');
                $upload
                    ->multiple(false)
                    ->attr('required', 'required');
                echo $upload->render();
                ?>
            </div>
        </div>

    </div>

    @include('layouts.Panels.Annotations.allFieldsRequired')


    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <input type="submit" class="btn btn-primary" value="Guardar">

    </div>

    {!!Form::close()!!}

</div>
<script type="text/javascript">
    var modal = $('#ModalAgregarImagen');

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
                    $('#GridGaleria').data('kendoGrid').dataSource.read();
                    $('#GridGaleria').data('kendoGrid').refresh();
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