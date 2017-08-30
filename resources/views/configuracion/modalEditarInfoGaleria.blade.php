<div id="ModalEditarInfoGaleria">
    {!!Form::open(['url' => route('modalEditarInfoGaleria'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-edit"></i> Editar {{$data->titulo}}</h4>
    </div>
    <div class="modal-body">

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::hidden('id',$data->idGaleria,['class'=>'form-control'])!!}
                {!!Form::label('titulo', 'Titulo:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('titulo',$data->titulo,['class'=>'form-control', 'required','placeholder'=>'Titulo'])!!}
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('descripcion', 'Descripción:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('descripcion',$data->descripcion,['class'=>'form-control', 'required','placeholder'=>'Descripción'])!!}
            </div>
        </div>

        @include('layouts.Panels.Annotations.allFieldsRequired')

    </div>

    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <input type="submit" class="btn btn-primary" value="Guardar">

    </div>

    {!!Form::close()!!}

</div>

<script type="text/javascript">
    var modal = $('#ModalEditarInfoGaleria');

    $(function () {
        validarFormulario();// validar forularios con kendo
        eventResultForm(modal, onSuccess)
    });

    function validarFormulario() {
        var container = $('form');

        kendo.init(container);

        container.kendoValidator({
            //organiza los mensajes personalizados
            messages: {
                float_positive: "Este campo debe ser un decimal positivo",
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