@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>
    <div class="panel-primary">
        <div class="panel-body text-right">
            <a href="{{route('getViewInfoValoresProcesoById', ['idProceso' => $data->id])}}"
               class="btn btn-view">
                <i class="fa fa-line-chart"></i> Valores del proceso</a>
        </div>
    </div>

    @include('layouts.Panels.Procesos.infoProceso')

    <?php if($data->estado == ("Activo")) {?>
    <div class="panel-primary">
        <div class="panel-body text-left">
            <a href="{{url(route('editarEspecimenesProcesos', ['idProceso' => $data->id]))}}" class="btn btn-add">
                <i class="fa fa-plus"></i> Editar Espécimenes</a>
        </div>
    </div>
    <?php } ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Características del proceso - Plantas</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readPlanta = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPlanta
                    ->url(route('getInfoPlantaByProcesoId', ['idProceso' => $data->id]))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportPlanta = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportPlanta
                    ->read($readPlanta)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                //Inicializamos el esquema de la grid
                $schemaPlanta = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema del grid
                $schemaPlanta
                    ->data('data')
                    ->total('total');

                //Inicializamos el Data Source
                $dataSourcePlanta = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourcePlanta
                    ->transport($transportPlanta)
                    ->pageSize(10)
                    ->schema($schemaPlanta)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridPlanta = new \Kendo\UI\Grid('GridPlanta');

                //Inicializamos las columnas de la grid
                $nombrePlanta = new \Kendo\UI\GridColumn();
                $nombrePlanta->field('nombre')->title('Nombre')->width(50);

                $porcentajePlanta = new \Kendo\UI\GridColumn();
                $porcentajePlanta->field('porcentaje')->title('Porcentaje')->templateId('porcentaje')->width(50);

                $estadoPlanta = new \Kendo\UI\GridColumn();
                $estadoPlanta->field('estado')->title('Estado')->width(50);

                $vercaracteristicaplanta = new \Kendo\UI\GridColumn();
                $vercaracteristicaplanta->field('vercaracteristicaplanta')->title('Ver')->templateId('vercaracteristicaplanta')->width(100);

                //Se agregan columnas y atributos al grid
                $gridPlanta
                    ->addColumn($nombrePlanta, $porcentajePlanta, $estadoPlanta, $vercaracteristicaplanta)
                    ->dataSource($dataSourcePlanta)
                    ->sortable(true)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

                //renderizamos la grid
                echo $gridPlanta->render();
                ?>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Características del proceso - Peces</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readPez = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPez
                    ->url(route('getInfoPezByProcesoId', ['idProceso' => $data->id]))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportPez = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportPez
                    ->read($readPez)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                //Inicializamos el esquema de la grid
                $schemaPez = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema de l grid
                $schemaPez
                    ->data('data')
                    ->total('total');

                //Inicializamos el Data Source
                $dataSourcePez = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourcePez
                    ->transport($transportPez)
                    ->pageSize(10)
                    ->schema($schemaPez)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridPez = new \Kendo\UI\Grid('GridPez');

                //Inicializamos las columnas de la grid
                $nombrePez = new \Kendo\UI\GridColumn();
                $nombrePez->field('nombre')->title('Nombre')->width(50);

                $porcentajePez = new \Kendo\UI\GridColumn();
                $porcentajePez->field('porcentaje')->title('Porcentaje')->templateId('porcentaje')->width(50);

                $estadoPez = new \Kendo\UI\GridColumn();
                $estadoPez->field('estado')->title('Estado')->width(50);

                $vercaracteristicapez = new \Kendo\UI\GridColumn();
                $vercaracteristicapez->field('vercaracteristicapez')->title('Ver')->templateId('vercaracteristicapez')->width(100);

                //Se agregan columnas y atributos al grid
                $gridPez
                    ->addColumn($nombrePez, $porcentajePez, $estadoPez, $vercaracteristicapez)
                    ->dataSource($dataSourcePez)
                    ->sortable(true)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

                //renderizamos la grid
                echo $gridPez->render();
                ?>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script id="porcentaje" type="text/x-kendo-tmpl">
        <div class="text-right">
            <strong>#=porcentaje#</strong>
        </div>
    </script>

    <script id="vercaracteristicaplanta" type="text/x-kendo-tmpl">
        <div class="btn-group-justified">
            <a href="/general/getModalInfoPlantaById/#=idplanta#"
            class="btn btn-view"
            data-modal="modal-md">
            <i class="fa fa-leaf"></i> Características de la planta</a>
        </div>
    </script>

    <script id="vercaracteristicapez" type="text/x-kendo-tmpl">
        <div class="btn-group-justified">
            <a href="/general/getModalInfoPezById/#=idpez#"
            class="btn btn-view"
            data-modal="modal-md">
            <i class="fa fa-tint"></i> Características del pez</a>
        </div>
    </script>
@endsection