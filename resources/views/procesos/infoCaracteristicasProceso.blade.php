@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>
    <div class="panel-primary">
        <div class="panel-body text-right">
            <a href="../../procesos/getViewInfoValoresProcesoById/{{$data->id}}"
               class="btn btn-primary">
                <i class="fa fa-line-chart"></i> Valores del proceso</a>
        </div>
    </div>

    @include('layouts.Panels.Procesos.infoProceso')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Caracteristicas del proceso - Plantas</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readPlanta = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPlanta
                    ->url('../../procesos/getInfoPlantaByProcesoId/' . $data->id)
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
                $porcentajePlanta->field('porcentaje')->title('Porcentaje')->width(50);

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
            <h4 class="panel-title">Caracteristicas del proceso - Peces</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readPez = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPez
                    ->url('../../procesos/getInfoPezByProcesoId/' . $data->id)
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
                $porcentajePez->field('porcentaje')->title('Porcentaje')->width(50);

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
    <script id="vercaracteristicaplanta" type="text/x-kendo-tmpl">
        <a href="../../procesos/getModalInfoPlantaById/#=idplanta#"
         class="btn btn-primary"
         data-modal="modal-lg">
         <i class="fa fa-leaf"></i> Caracteristicas de la planta</a>
    </script>

    <script id="vercaracteristicapez" type="text/x-kendo-tmpl">
        <a href="../../procesos/getModalInfoPezById/#=idpez#"
        class="btn btn-primary"
        data-modal="modal-lg">
        <i class="fa fa-tint"></i> Caracteristicas del pez</a>
    </script>
@endsection