<div id="InfoUsuario">
    <?php if($data->tipoestado == 1){ ?>
    <div class="modal-header bg-warning">
        <h4>{{strtoupper($data->nombreusuario)}}</h4>
    </div>
    <?php } else { ?>
    <div class="modal-header bg-default">
        <h4>{{strtoupper($data->nombreusuario)}}</h4>
    </div>
    <?php } ?>

    <div class="modal-body" id="usuario">

        <div class="row">

            <div class="col-md-3">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-photo"></i> Avatar</h3>
                    </div>

                    <div class="panel-body text-center">
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

            </div>

            <div class="col-md-9">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Información personal</h3>
                    </div>

                    <div class="panel-body">

                        <div class="row margin-bottom-10">
                            <div class="col-md-3">
                                <strong>Estado:</strong>
                            </div>
                            <div class="col-md-9">
                                {{$data->estado}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-3">
                                <strong>Tipo de Usuario:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->rol}}
                            </div>
                            <div class="col-md-3">
                                <strong>Tipo de Acceso:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->acceso}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-3">
                                <strong>Usuario:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->usuario}}
                            </div>

                            <div class="col-md-3">
                                <strong>Correo:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->correo}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-3">
                                <strong>Primer Nombre:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->primer_nombre}}
                            </div>
                            <div class="col-md-3">
                                <strong>Segundo Nombre:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->segundo_nombre}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <strong>Primer Apellido:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->primer_apellido}}
                            </div>
                            <div class="col-md-3">
                                <strong>Segundo Apellido:</strong>
                            </div>
                            <div class="col-md-3">
                                {{$data->segundo_apellido}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-laptop"></i> Record de la aplicación</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row margin-bottom-10">
                            <div class="col-md-5">
                                <strong>Número de procesos a cargo:</strong>
                            </div>
                            <div class="col-md-7">
                                {{$data->procesos}}
                            </div>
                        </div>

                        <div class="row margin-bottom-10">
                            <div class="col-md-5">
                                <strong>Especimenes plantas registradas:</strong>
                            </div>
                            <div class="col-md-7">
                                {{$data->peces}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <strong>Especimenes peces registrados:</strong>
                            </div>
                            <div class="col-md-7">
                                {{$data->plantas}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>

</div>