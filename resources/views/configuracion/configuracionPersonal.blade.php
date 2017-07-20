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
                            <img src="{{url('/img/sin_avatar.png')}}" class="img-responsive img-thumbnail"
                                 alt="Imagen no disponible"/>

                            <!-- FIN Imagen -->
                        </div>
                        <div class="panel-footer text-right">
                            <a href="{{route('modalAgregarProcesos')}}" class="btn btn-primary" data-modal="modal-lg">
                                <i class="fa fa-pencil"></i>
                                Editar avatar</a>
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
                                    Tipo de Usuario:
                                </div>
                                <div class="col-md-10">
                                    {{$data->rol}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    Usuario:
                                </div>
                                <div class="col-md-10">
                                    {{$data->usuario}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    Correo:
                                </div>
                                <div class="col-md-10">
                                    {{$data->correo}}
                                </div>
                            </div>


                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    Primer Nombre:
                                </div>
                                <div class="col-md-4">
                                    {{$data->primer_nombre}}
                                </div>
                                <div class="col-md-2">
                                    Segundo Nombre:
                                </div>
                                <div class="col-md-4">
                                    {{$data->segundo_nombre}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    Primer Apellido:
                                </div>
                                <div class="col-md-4">
                                    {{$data->primer_apellido}}
                                </div>
                                <div class="col-md-2">
                                    Segundo Apellido:
                                </div>
                                <div class="col-md-4">
                                    {{$data->segundo_apellido}}
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <a href="{{route('modalAgregarProcesos')}}" class="btn btn-primary" data-modal="modal-lg">
                                <i class="fa fa-pencil"></i>
                                Editar información personal</a>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-laptop"></i> Record de la aplicación</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row margin-bottom-10">
                                <div class="col-md-4">
                                    Número de procesos a cargo:
                                </div>
                                <div class="col-md-8">
                                    {{$data->procesos}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-4">
                                    Especimenes plantas registradas:
                                </div>
                                <div class="col-md-8">
                                    {{$data->peces}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-4">
                                    Especimenes peces registrados:
                                </div>
                                <div class="col-md-8">
                                    {{$data->plantas}}
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