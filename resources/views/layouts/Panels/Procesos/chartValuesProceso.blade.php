<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Valores {{$nombreSensor}}</h3>
    </div>
    <div class="panel-body">
        <?php

        //Inicializamos el Data Source de Transporte de lectura
        $chartValueProcesosRead = new \Kendo\Data\DataSourceTransportRead();

        //Agregamos atributos al datasource de transporte de lectura
        $chartValueProcesosRead
            ->url(route('getValuesProcesoByIdForChart',
                ['idTipoSensor' => $idTipoSensor, 'idProceso' => $data->id]
            ))
            ->contentType('application/json')
            ->type('POST');

        //Inicializamos el Data Source de Transporte
        $chartValueProcesosTransport = new \Kendo\Data\DataSourceTransport();
        $chartValueProcesosTransport
            ->read($chartValueProcesosRead)
            ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

        //Inicializamos el Data Source
        $chartValueProcesosDatasource = new \Kendo\Data\DataSource();

        //Inicializamos el formato de ordenamiento
        $chartValueProcesosDatasourceSortItem = new \Kendo\Data\DataSourceSortItem();

        $chartValueProcesosDatasourceSortItem
            ->dir('asc')
            ->field('fecha');

        $chartValueProcesosDatasource
            ->transport($chartValueProcesosTransport)
            ->addSortItem($chartValueProcesosDatasourceSortItem);

        $chartValueProcesosSeriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $chartValueProcesosSeriesItem
            ->field('valor')
            ->color('#' . $colorSensor)
            ->name($nombreSensor . ' ( ' . $unidadSensor . ' ) ');

        $chartValueProcesosValueAxisItem = new \Kendo\Dataviz\UI\ChartValueAxisItem();
        $chartValueProcesosValueAxisItem
            ->labels(array('format' => 'n2'));


        $chartValueProcesosCategoryAxisItem = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
        $chartValueProcesosCategoryAxisItem
            ->field('fecha')
            ->labels(array('rotation' => -45))
            ->crosshair(array('visible' => true));

        $chartValueProcesosTooltip = new \Kendo\Dataviz\UI\ChartTooltip();
        $chartValueProcesosTooltip
            ->visible(true)
            ->format('n2')
            ->shared(true);

        $chartValueProcesosTitle = new \Kendo\Dataviz\UI\ChartTitle();
        $chartValueProcesosTitle
            ->text('Graficas de muestra de los valores de ' . $nombreSensor);

        $chartValueProcesos = new \Kendo\Dataviz\UI\Chart('Chart' . $idTipoSensor);

        $chartValueProcesos
            ->title($chartValueProcesosTitle)
            ->dataSource($chartValueProcesosDatasource)
            ->legend(array('position' => 'top'))
            ->addSeriesItem($chartValueProcesosSeriesItem)
            ->addValueAxisItem($chartValueProcesosValueAxisItem)
            ->addCategoryAxisItem($chartValueProcesosCategoryAxisItem)
            ->seriesDefaults(array('type' => 'line', 'style' => 'smooth'))
            ->tooltip($chartValueProcesosTooltip)
            ->transitions(false)
            ->renderAs('svg');

        echo $chartValueProcesos->render();

        ?>
    </div>
    @include('layouts.Panels.Procesos.gridValuesProceso',
           ['idTipoSensor' => $idTipoSensor,
           'idProceso'=>$data->id,
           'unidadSensor'=>$unidadSensor])
</div>
@section('scripts')
    <!--
    <script type="text/javascript">
        var timestamp = null;
        var data;
        function cargar_push() {
            datosgrid = $("#chart{{$idTipoSensor}}").data("kendoChart").dataSource.data();
            cuantos = datosgrid.length;
            prejson = JSON.stringify(datosgrid[0]);
            $.post('../../procesos/getValuesProcesoById/{{ $idTipoSensor }}/{{ $data->id}}', prejson, function (data) {
                data = JSON.parse(data);
                if (data.estado) {
                    $("#chart{{$idTipoSensor}}").data("kendoChart").dataSource.data(data.result);
                    $("#chart{{$idTipoSensor}}").data("kendoChart").refresh();
                    $("#grid").data("kendoGrid").dataSource.read();
                }
                setTimeout('cargar_push()', 1000);
            })
        }

        $(document).ready(function () {
            setTimeout('cargar_push()', 3000);
        });

    </script>
    -->
@endsection