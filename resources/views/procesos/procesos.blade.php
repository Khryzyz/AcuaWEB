@extends('layouts.Dashboard.Main')

@section('content')

    <div class="panel-body">

        @include('layouts.Panels.Usuario.infoUsuario')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-gears"></i> Registro de procesos del usuario</h4>
            </div>
            <div class="panel-body">
                <div class="panel-group">
                    <a href="{{route('modalAgregarProcesos')}}" class="btn btn-primary" data-modal="modal-md"><i
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
                    $nombre = new \Kendo\UI\GridColumn();
                    $nombre->field('nombre')->title('Nombre')->width(200);

                    $fechaimplementacion = new \Kendo\UI\GridColumn();
                    $fechaimplementacion->field('fechaimplementacion')->title('Fecha Implementacion')->width(100);

                    $estadoproceso = new \Kendo\UI\GridColumn();
                    $estadoproceso->field('estadoproceso')->title('Estado')->templateId('estadoproceso')->width(100);

                    $verproceso = new \Kendo\UI\GridColumn();
                    $verproceso->field('verproceso')->title('Ver')->templateId('verproceso')->width(100);

                    $editarproceso = new \Kendo\UI\GridColumn();
                    $editarproceso->field('editarproceso')->title('Editar')->templateId('editarproceso')->width(100);

                    $gridFilterable = new \Kendo\UI\GridFilterable();
                    $gridFilterable->mode("row");

                    //Se agregan columnas y atributos al grid
                    $gridProcesos
                        ->addColumn(
                            $nombre,
                            $fechaimplementacion,
                            $estadoproceso,
                            $verproceso,
                            $editarproceso
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
    </div>
@endsection

@section('scripts')
    <script id='estadoproceso' type='text/x-kendo-tmpl'>
    <div class="btn-group-justified">
        #if(estado == 'Activo'){#
            <a href="/general/getModalEstadoElemento/#=idproceso#/4/"
            class="btn btn-danger"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Desactivar</a>
        #} else {#
            <a href="/general/getModalEstadoElemento/#=idproceso#/4/"
            class="btn btn-success"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Activar</a>
        #}#
        </div>

    </script>
    <script id='verproceso' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
            <a href='/procesos/getViewInfoCaracteristicasProcesoById/#=idproceso#'
            class='btn btn-primary'>
            <i class="fa fa-eye"></i> Ver Proceso</a>
        </div>
    </script>
    <script id='editarproceso' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
            <a href='/procesos/modalEditarProcesos/#=idproceso#'
            class="btn btn-success"
            data-modal="modal-md">
            <i class="fa fa-wrench"></i> Editar Proceso</a>
        </div>
    </script>

@endsection