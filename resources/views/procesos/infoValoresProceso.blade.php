@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>
    <div class="panel-primary">
        <div class="panel-body text-right">
            <a href="../../procesos/getViewInfoCaracteristicasProcesoById/{{$data->id}}"
               class="btn btn-primary">
                <i class="fa fa-wrench"></i> Caracteristicas del proceso</a>
        </div>
    </div>

    @include('layouts.Panels.Procesos.infoProceso')

    <div class="row">
        <div class="col-md-6">
            @include('layouts.Panels.Procesos.chartValuesProceso',
            ['idTipoSensor' => 2,
            'nombreSensor'=>'Temperatura Agua',
            'colorSensor'=>'FF9F11',
            'unidadSensor'=>'°c'])
        </div>
        <div class="col-md-6">
            @include('layouts.Panels.Procesos.chartValuesProceso',
            ['idTipoSensor' => 3,
            'nombreSensor'=>'Temperatura Ambiente',
            'colorSensor'=>'FFB70D',
            'unidadSensor'=>'°c'])
        </div>
        <div class="col-md-6">
            @include('layouts.Panels.Procesos.chartValuesProceso',
            ['idTipoSensor' => 6,
            'nombreSensor'=>'Flujo',
            'colorSensor'=>'4977FF',
            'unidadSensor'=>'m³/s'])
        </div>
        <div class="col-md-6">
            @include('layouts.Panels.Procesos.chartValuesProceso',
            ['idTipoSensor' => 1,
            'nombreSensor'=>'Caudal',
            'colorSensor'=>'000EFF',
            'unidadSensor'=>'q'])
        </div>
        <div class="col-md-6">
            @include('layouts.Panels.Procesos.chartValuesProceso',
            ['idTipoSensor' => 4,
            'nombreSensor'=>'Amonio',
            'colorSensor'=>'0CE86F',
            'unidadSensor'=>'mg/l'])
        </div>
        <div class="col-md-6">
            @include('layouts.Panels.Procesos.chartValuesProceso',
            ['idTipoSensor' => 5,
            'nombreSensor'=>'pH',
            'colorSensor'=>'5737E8',
            'unidadSensor'=>'pH'])
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        var timestamp = null;
        var data;
        function cargar_push() {
            datosgrid = $("#chart").data("kendoChart").dataSource.data();
            cuantos = datosgrid.length;
            prejson = JSON.stringify(datosgrid[0]);
            $.post('muestras/GetBideoData', prejson, function (data) {
                data = JSON.parse(data);
                if (data.estado) {
                    $("#chart").data("kendoChart").dataSource.data(data.result);
                    $("#chart").data("kendoChart").refresh();
                    $("#grid").data("kendoGrid").dataSource.read();
                }
                setTimeout('cargar_push()', 1000);
            })
        }

        $(document).ready(function () {
            setTimeout('cargar_push()', 3000);
        });

    </script>
@endsection
