@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>
    <div class="panel-primary">
        <div class="panel-body text-right">
            <a href="{{route('getViewInfoCaracteristicasProcesoById', ['idProceso' => $data->idproceso])}}"
               class="btn btn-view">
                <i class="fa fa-wrench"></i> Características del proceso</a>
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
    <script>

        function reloadValues() {
            $("#Chart1").data("kendoChart").dataSource.read();
            $("#Chart1").data("kendoChart").refresh();
            $("#Grid1").data("kendoGrid").dataSource.read();
            $("#Grid1").data('kendoGrid').refresh();

            $("#Chart2").data("kendoChart").dataSource.read();
            $("#Chart2").data("kendoChart").refresh();
            $("#Grid2").data("kendoGrid").dataSource.read();
            $("#Grid2").data('kendoGrid').refresh();

            $("#Chart3").data("kendoChart").dataSource.read();
            $("#Chart3").data("kendoChart").refresh();
            $("#Grid3").data("kendoGrid").dataSource.read();
            $("#Grid3").data('kendoGrid').refresh();

            $("#Chart4").data("kendoChart").dataSource.read();
            $("#Chart4").data("kendoChart").refresh();
            $("#Grid4").data("kendoGrid").dataSource.read();
            $("#Grid4").data('kendoGrid').refresh();

            $("#Chart5").data("kendoChart").dataSource.read();
            $("#Chart5").data("kendoChart").refresh();
            $("#Grid5").data("kendoGrid").dataSource.read();
            $("#Grid5").data('kendoGrid').refresh();

            $("#Chart6").data("kendoChart").dataSource.read();
            $("#Chart6").data("kendoChart").refresh();
            $("#Grid6").data("kendoGrid").dataSource.read();
            $("#Grid6").data('kendoGrid').refresh();

        }

        $(document).ready(function () {
            setInterval('reloadValues()', 60000);
        });

    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection