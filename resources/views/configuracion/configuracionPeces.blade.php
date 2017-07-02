@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tint"></i> Peces registrados en el sistema</h3>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <a href="{{route('modalAgregarPez')}}" class="btn btn-primary" data-modal="modal-lg">
                    <i class="fa fa-plus"></i>
                    Agregar Pez</a>
            </div>
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readPeces = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPeces
                    ->url(route('getPeces'))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportPeces = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportPeces
                    ->read($readPeces)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                //Inicializamos el esquema de la grid
                $schemaPeces = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema de l grid
                $schemaPeces
                    ->data('data')
                    ->total('total');

                $gridGroupItemPeces = new Kendo\Data\DataSourceGroupItem();
                $gridGroupItemPeces->field('usuario');

                //Inicializamos el Data Source
                $dataSourcePeces = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourcePeces
                    ->addGroupItem($gridGroupItemPeces)
                    ->transport($transportPeces)
                    ->pageSize(20)
                    ->schema($schemaPeces)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridPeces = new \Kendo\UI\Grid('Grid');


                //Inicializamos las columnas de la grid
                $idpez = new \Kendo\UI\GridColumn();
                $idpez->field('idpez')->title('Id')->hidden(true);

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

                $editarpez = new \Kendo\UI\GridColumn();
                $editarpez->field('editarpez')->title('Editar')->templateId('editarpez')->width(70);

                $verpez = new \Kendo\UI\GridColumn();
                $verpez->field('verpez')->title('Ver')->templateId('verpez')->width(70);

                $gridFilterable = new \Kendo\UI\GridFilterable();
                $gridFilterable->mode("row");

                //Se agregan columnas y atributos al grid
                $gridPeces
                    ->addColumn($idpez,
                        $usuario,
                        $nombre,
                        $registro,
                        $actualizacion,
                        $estado,
                        $editarpez,
                        $verpez)
                    ->dataSource($dataSourcePeces)
                    ->sortable(true)
                    ->filterable($gridFilterable)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

                //renderizamos la grid
                echo $gridPeces->render();
                ?>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script id='editarpez' type='text/x-kendo-tmpl'>
        <a href='/procesos/getViewInfoCaracteristicasProcesoById/#=idpez#' class='btn btn-primary text-center'>
        <i class="fa fa-wrench"></i> Editar Pez</a>
    </script>
    <script id='verpez' type='text/x-kendo-tmpl'>
       <a href="/general/getModalInfoPezById/#=idpez#"
        class="btn btn-primary"
        data-modal="modal-lg">
        <i class="fa fa-eye"></i> Ver Pez</a>
    </script>
@endsection