@extends('layouts.Dashboard.Main')

@section('content')

    <div class="panel-body">
        <div class="col-md-7">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Actividad Reciente
                </div>
                <div class="panel-body">
                    <?php for($i = 0; $i < count($eventos_registrados);$i++){
                    $evento_registrado = (array)$eventos_registrados[$i];
                    switch ($evento_registrado['tipo']) {
                    case 1:
                    ?>
                    @include('layouts.Panels.Social.actividadPlantaRegistrada',$evento_registrado)
                    <?php
                    break;
                    case 2:
                    ?>
                    @include('layouts.Panels.Social.actividadPezRegistrado',$evento_registrado)
                    <?php
                    break;
                    case 3:
                    ?>
                    @include('layouts.Panels.Social.actividadProcesoRegistrado',$evento_registrado)
                    <?php
                    break;
                    }
                    }?>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Nuevos Colegas
                </div>
                <div class="panel-body">
                    <?php for($i = 0; $i < count($usuarios_registrados);$i++){
                    $usuario_registrado = (array)$usuarios_registrados[$i];
                    ?>
                    @include('layouts.Panels.Social.infoUsuarioRegistrado',$usuario_registrado)
                    <?php
                    }?>
                </div>
            </div>

        </div>
    </div>
    <div class="panel-footer">

    </div>
@endsection

@section('scripts')

@endsection