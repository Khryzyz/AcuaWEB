<div id="ModalAgregarPlanta">
    {!!Form::open(['url' => route('modalAgregarPlanta'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-leaf"></i> Agregar Planta</h4>
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
                {!!Form::number('phmin',null,['class'=>'form-control float-positive', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Min'])!!}
            </div>
            <div class="col-md-3">
                {!!Form::label('phmax', 'pH Max (pH):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('phmax',null,['class'=>'form-control float-positive', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'pH Max'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('plantmin', 'Plantas por m² Min (und):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('plantmin',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'Plantas por m² Min'])!!}
            </div>
            <div class="col-md-3">
                {!!Form::label('plantmax', 'Plantas por m² Max (und):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('plantmax',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'Plantas por m² Max'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('germin', 'Germinación Min (dia):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('germin',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'Germinación Min'])!!}
            </div>
            <div class="col-md-3">

                {!!Form::label('germax', 'Germinación Max (dia):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('germax',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'Germinación Max'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('cremin', 'Crecimiento Min (dia):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('cremin',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'Crecimiento Min'])!!}
            </div>
            <div class="col-md-3">
                {!!Form::label('cremax', 'Crecimiento Max (dia):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('cremax',null,['class'=>'form-control', 'required','min'=>'1','max'=>'100', 'maxlength'=>'3', 'placeholder'=>'Crecimiento Max'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('tempmin', 'Temperatura Min (°C):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('tempmin',null,['class'=>'form-control', 'required','min'=>'1','max'=>'50', 'maxlength'=>'2', 'placeholder'=>'Temperatura Min'])!!}
            </div>
            <div class="col-md-3">
                {!!Form::label('tempmax', 'Temperatura Max (°C):')!!}
            </div>
            <div class="col-md-3">
                {!!Form::number('tempmax',null,['class'=>'form-control', 'required','min'=>'1','max'=>'50', 'maxlength'=>'2', 'placeholder'=>'Temperatura Max'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-3">
                {!!Form::label('expsolar', 'Exposicion Solar:')!!}
            </div>
            <div class="col-md-9">
                <?php
                $readDropDown = new \Kendo\Data\DataSourceTransportRead();

                $readDropDown
                    ->url(route('getTiposExpoSolar'))
                    ->contentType('application/json')
                    ->type('POST');
                $transportDropDown = new \Kendo\Data\DataSourceTransport();

                $transportDropDown->read($readDropDown)
                    ->parameterMap('function(data) {
              return kendo.stringify(data);
           }');

                $dataSourceDropDown = new \Kendo\Data\DataSource();

                $dataSourceDropDown->transport($transportDropDown);

                $dropDownList = new \Kendo\UI\DropDownList('expsolar');

                $dropDownList->dataSource($dataSourceDropDown)
                    ->dataTextField('nombre')
                    ->dataValueField('id')
                    ->attr('style', 'width: 100%')
                    ->attr('required', 'required');

                echo $dropDownList->render();

                ?>
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
    var modal = $('#ModalAgregarPlanta');

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

        switch (result.estado) {
            case "success":
                $.msgbox(result.mensaje, {type: 'success'}, function () {
                    modalBs.modal('hide');
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