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
                    <a href="{{route('modalAgregarPlanta')}}"
                       class="btn btn-add"
                       data-modal="modal-md">
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

                    //Agregamos los aributos del esquema del grid
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
                    $nombre = new \Kendo\UI\GridColumn();
                    $nombre->field('nombre')->title('Nombre')->width(100);

                    $actualizacion = new \Kendo\UI\GridColumn();
                    $actualizacion->field('actualizacion')->title('Ultima Actualización')->width(80);

                    $estado = new \Kendo\UI\GridColumn();
                    $estado->field('estadoplanta')->title('Estado')->templateId('estadoplanta')->width(60);

                    $verplanta = new \Kendo\UI\GridColumn();
                    $verplanta->field('verplanta')->title('Ver')->templateId('verplanta')->width(125);

                    $editarplanta = new \Kendo\UI\GridColumn();
                    $editarplanta->field('editarplanta')->title('Editar')->templateId('editarplanta')->width(125);

                    $gridFilterable = new \Kendo\UI\GridFilterable();
                    $gridFilterable->mode("row");

                    //Se agregan columnas y atributos al grid
                    $gridPlantas
                        ->addColumn(
                            $nombre,
                            $actualizacion,
                            $estado,
                            $verplanta,
                            $editarplanta)
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

    <script id='estadoplanta' type='text/x-kendo-tmpl'>
    <div class="btn-group-justified">
        #if(estado == 'Activo'){#
            <a href="/general/getModalEstadoElemento/#=idplanta#/2/"
            class="btn btn-off-status"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Desactivar</a>
        #} else {#
            <a href="/general/getModalEstadoElemento/#=idplanta#/2/"
            class="btn btn-on-status"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Activar</a>
        #}#
        </div>
    </script>

    <script id='verplanta' type='text/x-kendo-tmpl'>
         <div class="btn-group-justified">
            <a href="/general/getModalInfoPlantaById/#=idplanta#"
               class="btn btn-view"
               data-modal="modal-md">
                <i class="fa fa-leaf"></i> Ver Planta</a>
            <a href='/general/getModalGaleriaPlantaById/#=idplanta#'
               class="btn btn-view #if(conteogaleria < 1){# disabled #}# "
               data-modal="modal-lg">
                <i class="fa fa-image"></i> Ver Galeria</a>
        </div>
    </script>

    <script id='editarplanta' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
            <a href='/general/getModalEditarPlantaById/#=idplanta#'
            class="btn btn-edit #if(estado == 'Inactivo'){# disabled #}# "
            data-modal="modal-md">
            <i class="fa fa-leaf"></i> Editar Planta</a>
            <a href='/general/getModalEditarGaleriaPlantaById/#=idplanta#'
            class="btn btn-edit #if(estado == 'Inactivo'){# disabled #}# "
            data-modal="modal-md">
            <i class="fa fa-image"></i> Editar Galeria</a>
        </div>
    </script>
@endsection