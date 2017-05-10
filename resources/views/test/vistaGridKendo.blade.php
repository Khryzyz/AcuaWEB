@extends('layouts.admin.principal')

@section('content')

    <?php
    $Utils = new Utils();
    ?>

    <h1>Grid Kendo</h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Grid Obtenida en Kendo</h3>
        </div>
        <div class="panel-body">
            <?php

            //Inicializamos el Data Source de Transporte de lectura
            $read = new \Kendo\Data\DataSourceTransportRead();

            //Agregamos atributos al datasource de transporte de lectura
            $read
                ->url('getGridKendo')
                ->contentType('application/json')
                ->type('POST');

            //Inicializamos el Data Source de Transporte
            $transport = new \Kendo\Data\DataSourceTransport();

            //Agregamos atributos al datasource de transporte
            $transport
                ->read($read)
                ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

            //Inicializamos el esquema de la grid
            $schema = new \Kendo\Data\DataSourceSchema();

            //Agregamos los aributos del esquema de l grid
            $schema
                ->data('data')
                ->total('total');

            //Inicializamos el Data Source
            $dataSource = new \Kendo\Data\DataSource();

            //Agregamos atributos al datasource
            $dataSource
                ->transport($transport)
                ->pageSize(5)
                ->schema($schema)
                ->serverFiltering(true)
                ->serverSorting(true)
                ->serverPaging(true);

            //Inicializamos la grid
            $grid = new \Kendo\UI\Grid('GridKendo');

            //Inicializamos las columnas de la grid
            $idproceso = new \Kendo\UI\GridColumn();
            $idproceso->field('idproceso')->title('Id Proceso');

            $codigo = new \Kendo\UI\GridColumn();
            $codigo->field('codigo')->title('Codigo');

            $fechaimplementacion = new \Kendo\UI\GridColumn();
            $fechaimplementacion->field('fechaimplementacion')->title('Fecha Implementacion ');

            $areacultivo = new \Kendo\UI\GridColumn();
            $areacultivo->field('areacultivo')->title('Area Cultivo');

            $volumencultivo = new \Kendo\UI\GridColumn();
            $volumencultivo->field('volumencultivo')->title('Volumen Cultivo');

            $estado = new \Kendo\UI\GridColumn();
            $estado->field('estado')->title('Estado');


            $gridFilterable = new \Kendo\UI\GridFilterable();
            $gridFilterable->mode("row");

            //Se agregan columnas y atributos al grid
            $grid
                ->addColumn($idproceso, $codigo, $fechaimplementacion, $areacultivo, $volumencultivo, $estado)
                ->dataSource($dataSource)
                ->sortable(true)
                ->filterable($gridFilterable)
                ->dataBound('handleAjaxModal')
                ->scrollable(true)
                ->pageable(true);

            //renderizamos la grid
            echo $grid->render();
            ?>
        </div>
        <div class="panel-footer">
        </div>
    </div>
@endsection

@section('scripts')

@endsection