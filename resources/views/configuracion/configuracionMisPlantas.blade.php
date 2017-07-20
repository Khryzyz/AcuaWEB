@extends('layouts.Dashboard.Main')

@section('content')

    <div class="panel-body">

        @include('layouts.Panels.Usuario.infoUsuario')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-leaf"></i> Plantas registradas en el sistema</h3>
            </div>
            <div class="panel-body">
                <div class="panel-group">
                    <a href="{{route('modalAgregarPlanta')}}" class="btn btn-primary" data-modal="modal-lg">
                        <i class="fa fa-plus"></i>
                        Agregar Planta</a>
                </div>
                <div class="panel-group">
                    <?php

                    //Inicializamos el Data Source de Transporte de lectura
                    $readPlantas = new \Kendo\Data\DataSourceTransportRead();

                    //Agregamos atributos al datasource de transporte de lectura
                    $readPlantas
                        ->url(route('getPlantasByUsuarioId'))
                        ->contentType('application/json')
                        ->type('POST');

                    //Inicializamos el Data Source de Transporte
                    $transportPlantas = new \Kendo\Data\DataSourceTransport();

                    //Agregamos atributos al datasource de transporte
                    $transportPlantas
                        ->read($readPlantas)
                        ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                    //Inicializamos el esquema de la grid
                    $schemaPlantas = new \Kendo\Data\DataSourceSchema();

                    //Agregamos los aributos del esquema de l grid
                    $schemaPlantas
                        ->data('data')
                        ->total('total');


                    //Inicializamos el Data Source
                    $dataSourcePlantas = new \Kendo\Data\DataSource();

                    //Agregamos atributos al datasource
                    $dataSourcePlantas
                        ->transport($transportPlantas)
                        ->pageSize(20)
                        ->schema($schemaPlantas)
                        ->serverFiltering(true)
                        ->serverSorting(true)
                        ->serverPaging(true);

                    //Inicializamos la grid
                    $gridPlantas = new \Kendo\UI\Grid('GridPlanta');

                    //Inicializamos las columnas de la grid
                    $idplanta = new \Kendo\UI\GridColumn();
                    $idplanta->field('idplanta')->title('Id')->hidden(true);

                    $usuario = new \Kendo\UI\GridColumn();
                    $usuario->field('usuario')->title('Usuario')->hidden(true);

                    $nombre = new \Kendo\UI\GridColumn();
                    $nombre->field('nombre')->title('Nombre')->width(100);

                    $registro = new \Kendo\UI\GridColumn();
                    $registro->field('registro')->title('Fecha Registro')->width(80);

                    $actualizacion = new \Kendo\UI\GridColumn();
                    $actualizacion->field('actualizacion')->title('Fecha Actualización')->width(80);

                    $estado = new \Kendo\UI\GridColumn();
                    $estado->field('estado')->title('Estado')->width(50);

                    $editarplanta = new \Kendo\UI\GridColumn();
                    $editarplanta->field('editarplanta')->title('Editar')->templateId('editarplanta')->width(70);

                    $verplanta = new \Kendo\UI\GridColumn();
                    $verplanta->field('verplanta')->title('Ver')->templateId('verplanta')->width(70);

                    $gridFilterable = new \Kendo\UI\GridFilterable();
                    $gridFilterable->mode("row");

                    //Se agregan columnas y atributos al grid
                    $gridPlantas
                        ->addColumn($idplanta,
                            $usuario,
                            $nombre,
                            $registro,
                            $actualizacion,
                            $estado,
                            $editarplanta,
                            $verplanta
                        )
                        ->dataSource($dataSourcePlantas)
                        ->filterable($gridFilterable)
                        ->sortable(true)
                        ->dataBound('handleAjaxModal')
                        ->pageable(true);

                    //renderizamos la grid
                    echo $gridPlantas->render();
                    ?>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script id='editarplanta' type='text/x-kendo-tmpl'>
        <a href='/configuracion/modalAgregarPlantas/#=idplanta#' class='btn btn-primary text-center'>
        <i class="fa fa-wrench"></i> Editar Planta</a>

    </script>
    <script id='verplanta' type='text/x-kendo-tmpl'>
        <a href="/general/getModalInfoPlantaById/#=idplanta#"
         class="btn btn-primary"
         data-modal="modal-lg">
        <i class="fa fa-eye"></i> Ver Planta</a>

    </script>
@endsection