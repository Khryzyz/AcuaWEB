@extends('layouts.Dashboard.Main')

@section('content')

    @include('layouts.Panels.Usuario.infoUsuario')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-gears"></i> Registro de procesos del usuario</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">

                <a href="{{route('modalAgregarProcesos')}}" class="btn btn-add" data-modal="modal-md"><i
                            class="fa fa-plus"></i>
                    Agregar proceso</a>
            </div>
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $read = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $read
                    ->url(route('getProcesosByIdUsuario', ['idUsuario' => Auth::user()->id]))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transport = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transport
                    ->read($read)
                    ->parameterMap('function(data) { return kendo.stringify(data); }');

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
                    ->pageSize(10)
                    ->schema($schema)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridProcesos = new \Kendo\UI\Grid('GridProceso');

                //Inicializamos las columnas de la grid
                $verproceso = new \Kendo\UI\GridColumn();
                $verproceso->title('Seleccionar')->templateId('verproceso')->width(80);

                $nombre = new \Kendo\UI\GridColumn();
                $nombre->field('nombre')->title('Nombre')->width(100);

                $fechaimplementacion = new \Kendo\UI\GridColumn();
                $fechaimplementacion->field('fechaimplementacion')->title('Fecha Implementacion')->width(60);

                $estadoproceso = new \Kendo\UI\GridColumn();
                $estadoproceso->title('Estado')->templateId('estadoproceso')->width(80);

                $editarproceso = new \Kendo\UI\GridColumn();
                $editarproceso->title('Editar')->templateId('editarproceso')->width(80);

                $reporteproceso = new \Kendo\UI\GridColumn();
                $reporteproceso->title('Reporte')->templateId('reporteproceso')->width(80);

                $gridFilterable = new \Kendo\UI\GridFilterable();
                $gridFilterable->mode("row");

                //Se agregan columnas y atributos al grid
                $gridProcesos
                    ->addColumn(
                        $verproceso,
                        $nombre,
                        $fechaimplementacion,
                        $estadoproceso,
                        $editarproceso,
                        $reporteproceso
                    )
                    ->dataSource($dataSource)
                    ->sortable(true)
                    ->filterable($gridFilterable)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

                //renderizamos la grid
                echo $gridProcesos->render();
                ?>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script id='verproceso' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
            <a href='/procesos/getViewInfoCaracteristicasProcesoById/#=idproceso#'
            class='btn btn-view'>
            <i class="fa fa-gear"></i> Ver Proceso</a>
        </div>
    </script>
    <script id='estadoproceso' type='text/x-kendo-tmpl'>
    <div class="btn-group-justified">
        #if(estado == 'Activo'){#
            <a href="/general/getModalEstadoElemento/#=idproceso#/4/"
            class="btn btn-off-status"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Desactivar</a>
        #} else {#
            <a href="/general/getModalEstadoElemento/#=idproceso#/4/"
            class="btn btn-on-status"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Activar</a>
        #}#
        </div>
    </script>
    <script id='editarproceso' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
            <a href='/procesos/modalEditarProcesos/#=idproceso#'
            class="btn btn-edit #if(estado == 'Inactivo'){# disabled #}# "
            data-modal="modal-md">
            <i class="fa fa-info"></i> Editar Información</a>
        </div>
    </script>
    <script id='reporteproceso' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
            <a href='/reportes/reporteProceso/#=idproceso#'
            target="_blank"
            class="btn btn-report #if(estado == 'Inactivo'){# disabled #}# ">
            <i class="fa fa-bar-chart"></i> Generar Reporte</a>
        </div>
    </script>
@endsection