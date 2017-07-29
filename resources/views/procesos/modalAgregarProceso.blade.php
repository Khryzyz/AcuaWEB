<div id="ModalAgregarProceso">
    {!!Form::open(['url' => route('modalAgregarProcesos'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-gear"></i> Agregar Proceso</h4>
    </div>
    <div class="modal-body">

        <div class="row margin-bottom-10">
            <div class="col-md-4 vert">
                {!!Form::label('nombre', 'Nombre Del Proceso: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('nombre',null,['class'=>'form-control', 'required',  'placeholder'=>'Nombre del proceso'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('descripcion', 'Descripcion Del Proceso:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('descripcion',null,['class'=>'form-control', 'placeholder'=>'Descripción del proceso'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('fecha', 'Fecha Implementación:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('area', 'Area cultivo:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::number('area',null,['class'=>'form-control', 'min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'Area cultivo'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('volumen', 'Volumen de cultivo:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::number('volumen',null,['class'=>'form-control', 'min'=>'1','max'=>'100', 'maxlength'=>3, 'placeholder'=>'Volumen del cultivo'])!!}
            </div>
        </div>

        @include('layouts.Panels.Annotations.someFieldsRequired')

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
    {!!Form::close()!!}
</div>
<script type="text/javascript">
    var modal = $('#ModalAgregarProceso');

    $(function () {

        // validar forularios con kendo
        validarFormulario();

        // Respuesta del evento retorno del formulario
        eventResultForm(modal, onSuccess)

    });

    // validar forularios con kendo
    function validarFormulario() {
        var container = $('form');

        kendo.init(container);

        container.kendoValidator({
            //organiza los mensajes personalizados
            messages: {
                required: "Este campo es obligatorio"
            }
        });
    }

    // Respuesta del evento retorno del formulario
    function onSuccess(result) {

        result = JSON.parse(result)

        switch (result.estado) {
            case "success":
                $.msgbox(result.mensaje, {type: 'success'}, function () {
                    modalBs.modal('hide');
                    $('#GridProceso').data('kendoGrid').dataSource.read();
                    $('#GridProceso').data('kendoGrid').refresh();
                });
                break;
            case "error":
                $.msgbox(result.mensaje, {type: 'warning'});
                break;
            case "fatal":
                $.msgbox(result.mensaje, {type: 'error'});
                break;
            default:
                $.msgbox("Error desconocido", {type: 'error'});
        }

    }
</script>