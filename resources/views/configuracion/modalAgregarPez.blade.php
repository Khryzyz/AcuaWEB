<div id="ModalAgregarUsuario">
    {!!Form::open(['url' => route('modalAgregarUsuario'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-tint"></i> Agregar Pez</h4>
    </div>
    <div class="modal-body" style="padding:40px 50px;">

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('nombre', 'Nombre:')!!}
            </div>
            <div class="col-md-9">
                {!!Form::text('nombre',null,['class'=>'form-control', 'required', 'placeholder'=>'Nombre'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('phmin', 'pH Min (pH):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('phmin',null,['class'=>'form-control float-positive', 'required','min'=>'1','max'=>'100', 'maxlength'=>'6', 'placeholder'=>'Area cultivo'])!!}
            </div>
            <div class="col-md-3">
                {!!Form::label('phmax', 'pH Max (pH):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('phmax', 'Area Min (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
            <div class="col-md-3">
                {!!Form::label('phmax', 'Area Max (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                Germinación Min (dia):
                {!!Form::label('phmax', 'Area Max (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
            <div class="col-md-3">
                Germinación (dia):
                {!!Form::label('phmax', 'Area Max (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                Crecimiento Min (dia):
                {!!Form::label('phmax', 'Area Max (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
            <div class="col-md-3">
                Crecimiento Max (dia):
                {!!Form::label('phmax', 'Area Max (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                Temperatura Min (°C):
                {!!Form::label('phmax', 'Area Max (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
            <div class="col-md-3">
                Temperatura Max (°C):
                {!!Form::label('phmax', 'Area Max (m²):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('area',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('phmax', 'Exposicion Solar:')!!}
            </div>
            <div class="col-md-9">
                Exposicion Solar:
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
    var modal = $('#ModalAgregarUsuario');

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
            rules: {
                float_positive: function (input) {

                    var expreg = /^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/;

                    if (input.is("[class=float-positive]")) {
                        return expreg.test(input.val());
                    }
                    return true;
                }
            }
        });
    }

    function onSuccess(result) {
        result = JSON.parse(result)
        console.log(result);
        if (result.estado = true) {
            $.msgbox(result.mensaje, {type: 'success'}, function () {
                modalBs.modal('hide');
            });
        }
    }
</script>