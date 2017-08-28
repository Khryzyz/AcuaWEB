<div id="ModalEditarPassUsuario">

    {!!Form::open(['url' => route('modalEditarPassUsuario'), 'method' => 'POST', 'role'=>"form"])!!}

    <div class="modal-header bg-warning">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4><i class="fa fa-key"></i> Editar clave de acceso</h4>

    </div>
    <div class="modal-body">

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('old_pass', 'Contraseña Anterior: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::hidden('usuarioid',$data->id,['class'=>'form-control'])!!}
                {!!Form::password('old_pass',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña Anterior','maxlength'=>10])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('pass', 'Contraseña Nueva: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::password('pass',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña Nueva','maxlength'=>10])!!}
            </div>
        </div>

        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('confirm_pass', 'Repita Contraseña Nueva: (*)')!!}
            </div>
            <div class="col-md-8">
                {!!Form::password('confirm_pass',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña Nueva','maxlength'=>10])!!}
            </div>
        </div>

    </div>

    @include('layouts.Panels.Annotations.someFieldsRequired')


    <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <input type="submit" class="btn btn-primary" value="Guardar">

    </div>

    {!!Form::close()!!}

</div>
<script type="text/javascript">
    var modal = $('#ModalEditarPassUsuario');

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
                    location.reload();
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