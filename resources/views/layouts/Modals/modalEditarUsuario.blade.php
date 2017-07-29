<div id="ModalAgregarUsuario">
    {!!Form::open(['url' => route('modalAgregarUsuario'), 'method' => 'POST', 'role'=>"form"])!!}
    <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><i class="fa fa-user"></i> Editar Usuario</h4>
    </div>
    <div class="modal-body">

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('usuario', 'Username: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('usuario',$data->usuario,['class'=>'form-control', 'required', 'placeholder'=>'Username'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('email', 'Correo Electronico: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::email('email',$data->correo,['class'=>'form-control', 'required', 'data-email-msg'=>'Formato de correo no valido', 'placeholder'=>'Correo Electronico'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('primernombre', 'Primer Nombre: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('primernombre',$data->primer_nombre,['class'=>'form-control', 'required', 'placeholder'=>'Primer Nombre'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('segundonombre', 'Segundo Nombre:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('segundonombre',$data->segundo_nombre,['class'=>'form-control', 'placeholder'=>'Segundo Nombre'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('primerapellido', 'Primer Apellido: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('primerapellido',$data->primer_apellido,['class'=>'form-control', 'required', 'placeholder'=>'Primer Apellido'])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('segundoapellido', 'Segundo Apellido:')!!}
            </div>
            <div class="col-md-8">
                {!!Form::text('segundoapellido',$data->segundo_apellido,['class'=>'form-control', 'placeholder'=>'Segundo Apellido'])!!}
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