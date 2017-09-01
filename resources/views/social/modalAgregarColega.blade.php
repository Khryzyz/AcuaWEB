<div id="ModalAgregarColega">
    {!!Form::open(['url' => route('modalAgregarColega'), 'method' => 'POST', 'role'=>'form','files' => 'true'])!!}
    {!!Form::hidden('usuarioid',$data->idusuario,['class'=>'form-control'])!!}
    <div class="modal-header bg-primary">
        <?php if ($data->conteo == 0){
        ?>
        <p><h4>¿Confirmas que deseas <strong>Agregar</strong> a este colega?</h4></p>
        <?php
        }else{
        ?>
        <p><h4>No puedes <strong>Agregar</strong> a este colega.</h4></p>
        <?php
        }
        ?>
    </div>

    <div class="modal-body" id="usuario">

        <div class="row">

            <div class="col-md-3">

                <div class="text-center">
                    <!-- Imagen -->
                    <?php if($data->avatar){
                    ?>
                    <img src="{{url('/img/avatar/'.$data->avatar)}}" class="img-responsive img-thumbnail"
                         alt="Avatar"
                         width="200em"/>
                    <?php
                    }else{
                    ?>
                    <img src="{{url('/img/sin_avatar.png')}}" class="img-responsive img-thumbnail" alt="Avatar"
                         width="200em"/>
                <?php
                }
                ?>
                <!-- FIN Imagen -->
                </div>

            </div>

            <div class="col-md-9">

                <div class="panel-group">

                    <div class="row margin-bottom-10">
                        <div class="col-md-2">
                            <strong>Nombre:</strong>
                        </div>
                        <div class="col-md-10">
                            {{$data->nombreusuario}}
                        </div>
                    </div>

                    <div class="row margin-bottom-10">
                        <div class="col-md-2">
                            <strong>Estado:</strong>
                        </div>
                        <div class="col-md-10">
                            {{$data->estado}}
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <?php if ($data->conteo == 0){
        ?>
        <input type="submit" class="btn btn-primary" value="Aceptar">
        <?php
        }
        ?>

    </div>
    {!!Form::close()!!}
</div>
<script type="text/javascript">
    var modal = $('#ModalAgregarColega');

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