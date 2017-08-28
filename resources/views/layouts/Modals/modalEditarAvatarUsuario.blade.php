<div id="ModalEditarAvatarUsuario">

    {!!Form::open(['url' => route('modalEditarAvatarUsuario'), 'method' => 'POST', 'role'=>'form','files' => 'true'])!!}

    <div class="modal-header bg-warning">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4><i class="fa fa-image"></i> Editar avatar</h4>

    </div>
    <div class="modal-body">
        {!!Form::hidden('usuarioid',$data->idusuario,['class'=>'form-control'])!!}
        <div class="row margin-bottom-10">
            <div class="col-md-4">
                {!!Form::label('avatar', 'Imagen: (*)')!!}
            </div>
            <div class="col-md-8">
                <?php
                $upload = new \Kendo\UI\Upload('avatar');
                $upload->multiple(false);
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
    var modal = $('#ModalEditarAvatarUsuario');

    $(function () {
        validarFormulario();// validar forularios con kendo
        eventResultFormFile(modal, onSuccess, "{!! route('modalEditarAvatarUsuario') !!}")

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