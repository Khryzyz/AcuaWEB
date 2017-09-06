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
            ->url(route('getValuesComparativaProcesoByIdForChart',
                ['idProcesoUsuario' => $procesoUsuario, 'idProcesoColega' => $procesoColega, 'idTipoSensor' => $idTipoSensor,]
            ))
            ->data(['_token' => csrf_token()])
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

        $chartValueProcesosUsuarioSeriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $chartValueProcesosUsuarioSeriesItem
            ->field('valorUsuario')
            ->color('#' . $colorSensorUsuario)
            ->name($nombreSensor . ' (' . $unidadSensor . ') Usuario ');

        $chartValueProcesosColegaSeriesItem = new \Kendo\Dataviz\UI\ChartSeriesItem();
        $chartValueProcesosColegaSeriesItem
            ->field('valorColega')
            ->color('#' . $colorSensorColega)
            ->name($nombreSensor . ' (' . $unidadSensor . ') Colega ');

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
            ->addSeriesItem($chartValueProcesosUsuarioSeriesItem)
            ->addSeriesItem($chartValueProcesosColegaSeriesItem)
            ->addValueAxisItem($chartValueProcesosValueAxisItem)
            ->addCategoryAxisItem($chartValueProcesosCategoryAxisItem)
            ->seriesDefaults(array('type' => 'line', 'style' => 'smooth'))
            ->tooltip($chartValueProcesosTooltip)
            ->transitions(false)
            ->renderAs('svg');

        echo $chartValueProcesos->render();

        ?>
    </div>
    @include('layouts.Panels.Procesos.gridValuesComparativaProceso',
           ['procesoUsuario'=>$procesoUsuario,
            'procesoColega'=>$procesoColega,
            'idTipoSensor' => $idTipoSensor,
            'idProceso'=>$procesoUsuario,
            'unidadSensor'=>$unidadSensor])

</div>

