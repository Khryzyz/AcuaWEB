@extends('layouts.Dashboard.Main')

@section('content')

    <div class="panel-body">
        <div class="col-md-7">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Actividad Reciente
                </div>
                <div class="panel-body">
                    <?php for($i = 0; $i < count($registers);$i++){
                    $register = (array)$registers[$i];
                    ?>
                    @include('layouts.Panels.Social.actividadPezRegistrado',$register)
                    @include('layouts.Panels.Social.actividadPlantaRegistrada',$register)
                    @include('layouts.Panels.Social.actividadProcesoRegistrado',$register)
                    <?php
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
                    <?php for($i = 0; $i < count($registers);$i++){
                    $register = (array)$registers[$i];
                    ?>
                    @include('layouts.Panels.Social.infoUsuarioRegistrado',$register)
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