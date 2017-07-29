<div id="ModalAgregarUsuario">
    {!!Form::open(['url' => route('modalAgregarUsuario'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-user"></i> Agregar Usuario</h4>
    </div>
    <div class="modal-body">

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('usuario', 'Username: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('usuario',null,['class'=>'form-control', 'required', 'placeholder'=>'Username'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('pass', 'Contraseña: (*)')!!}
            </div>
            <div class="col-md-8">
                <input type="password" class="form-control" id="pass" name="pass" , required="required" ,
                       placeholder="Contraseña"/>
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('confirm_pass', 'Confirmar Contraseña: (*)')!!}
            </div>
            <div class="col-md-8">
                <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" , required="required"
                       , placeholder="Confirmar Contraseña"/>
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('email', 'Correo Electronico: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::email('email',null,['class'=>'form-control', 'required', 'data-email-msg'=>'Formato de correo no valido', 'placeholder'=>'Correo Electronico'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('primernombre', 'Primer Nombre: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('primernombre',null,['class'=>'form-control', 'required', 'placeholder'=>'Primer Nombre'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('segundonombre', 'Segundo Nombre:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('segundonombre',null,['class'=>'form-control', 'placeholder'=>'Segundo Nombre'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('primerapellido', 'Primer Apellido: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('primerapellido',null,['class'=>'form-control', 'required', 'placeholder'=>'Primer Apellido'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('segundoapellido', 'Segundo Apellido:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('segundoapellido',null,['class'=>'form-control', 'placeholder'=>'Segundo Apellido'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('tiposUsuario', 'Tipo Usuario: (*)')!!}
            </div>
            <div class="col-md-8">
                <?php
                $readDropDown = new \Kendo\Data\DataSourceTransportRead();

                $readDropDown
                    ->url(route('getTiposUsuario'))
                    ->contentType('application/json')
                    ->type('POST');
                $transportDropDown = new \Kendo\Data\DataSourceTransport();

                $transportDropDown->read($readDropDown)
                    ->parameterMap('function(data) {
              return kendo.stringify(data);
           }');

                $dataSourceDropDown = new \Kendo\Data\DataSource();

                $dataSourceDropDown->transport($transportDropDown);

                $dropDownList = new \Kendo\UI\DropDownList('tiposUsuario');

                $dropDownList->dataSource($dataSourceDropDown)
                    ->dataTextField('nombre')
                    ->dataValueField('id')
                    ->optionLabel('Seleccione...')
                    ->attr('style', 'width: 100%')
                    ->attr('required', 'required');

                echo $dropDownList->render();

                ?>
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
                confirmaPasswords: "Contraseñas no coinciden",
                required: "Este campo es obligatorio"
            },
            //define reglas si necesita tener mas  de solo el campo requerido
            rules: {
                confirmaPasswords: function (input) {
                    if (input.is("[name=pass]") || input.is("[name=confirm_pass]")) {
                        if (input.is("[name=confirm_pass]")) {
                            return input.val() === $("#pass").val();
                        }
                        if (input.is("[name=pass]")) {
                            return input.val() === $("#confirm_pass").val();
                        }
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
                    $('#GridUsuarios').data('kendoGrid').dataSource.read();
                    $('#GridUsuarios').data('kendoGrid').refresh();
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