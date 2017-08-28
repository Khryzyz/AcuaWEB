@extends('layouts.Dashboard.Main')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> Mi información registrada en el sistema</h3>
        </div>
        <div class="panel-body">

            <div class="row margin-bottom-10">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-photo"></i> Avatar</h3>
                        </div>
                        <div class="panel-body text-center">
                            <!-- Imagen -->
                            <?php if($data->avatar){
                            ?>
                            <img src="{{url('/img/avatar/'.$data->avatar)}}" class="img-responsive img-thumbnail" alt="Avatar"
                                 height="100em"/>
                            <?php
                            }else{
                            ?>
                            <img src="{{url('/img/sin_avatar.png')}}" class="img-responsive img-thumbnail" alt="Avatar" height="100em"
                                 width="100em"/>
                        <?php
                        }
                        ?>
                        <!-- FIN Imagen -->
                        </div>
                        <div class="panel-footer btn-group-justified">
                            <a href='/general/getModalEditarAvatarUsuarioById/{{$data->idusuario}}'
                               class="btn btn-edit"
                               data-modal="modal-md">
                                <i class="fa fa-pencil"></i>
                                Editar avatar personal</a>
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
                                <div class="col-md-2">
                                    <strong>Tipo de Usuario:</strong>
                                </div>
                                <div class="col-md-10">
                                    {{$data->rol}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    <strong>Usuario:</strong>
                                </div>
                                <div class="col-md-10">
                                    {{$data->usuario}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    <strong>Correo:</strong>
                                </div>
                                <div class="col-md-10">
                                    {{$data->correo}}
                                </div>
                            </div>


                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    <strong>Primer Nombre:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->primer_nombre}}
                                </div>
                                <div class="col-md-2">
                                    <strong>Segundo Nombre:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->segundo_nombre}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    <strong>Primer Apellido:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->primer_apellido}}
                                </div>
                                <div class="col-md-2">
                                    <strong>Segundo Apellido:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->segundo_apellido}}
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <a href='/general/getModalEditarUsuarioById/{{$data->idusuario}}'
                               class="btn btn-edit"
                               data-modal="modal-md">
                                <i class="fa fa-pencil"></i>
                                Editar información personal</a>
                        <!--<a href='/general/getModalEditarPassUsuarioById/{{$data->idusuario}}'
                               class="btn btn-edit"
                               data-modal="modal-md">
                                <i class="fa fa-pencil"></i>
                                Editar clave de acceso</a>-->
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

                            <div class="row margin-bottom-10">
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
    </div>

@endsection

@section('scripts')

@endsection