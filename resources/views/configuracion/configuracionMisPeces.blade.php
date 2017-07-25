@extends('layouts.Dashboard.Main')

@section('content')
    <div class="panel-body">

        @include('layouts.Panels.Usuario.infoUsuario')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tint"></i> Mis Peces registrados en el sistema</h3>
            </div>
            <div class="panel-body">
                <div class="panel-group">
                    <a href="{{route('modalAgregarPez')}}" class="btn btn-primary" data-modal="modal-md">
                        <i class="fa fa-plus"></i>
                        Agregar Pez</a>
                </div>
                <div class="panel-group">
                    <?php

                    //Inicializamos el Data Source de Transporte de lectura
                    $readPeces = new \Kendo\Data\DataSourceTransportRead();

                    //Agregamos atributos al datasource de transporte de lectura
                    $readPeces
                        ->url(route('getPecesByUsuarioId'))
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

                    //Inicializamos el Data Source
                    $dataSourcePeces = new \Kendo\Data\DataSource();

                    //Agregamos atributos al datasource
                    $dataSourcePeces
                        ->transport($transportPeces)
                        ->pageSize(20)
                        ->schema($schemaPeces)
                        ->serverFiltering(true)
                        ->serverSorting(true)
                        ->serverPaging(true);

                    //Inicializamos la grid
                    $gridPeces = new \Kendo\UI\Grid('GridPez');


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

                    $verpez = new \Kendo\UI\GridColumn();
                    $verpez->field('verpez')->title('Ver')->templateId('verpez')->width(125);

                    $editarpez = new \Kendo\UI\GridColumn();
                    $editarpez->field('editarpez')->title('Editar')->templateId('editarpez')->width(125);

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
                            $verpez,
                            $editarpez)
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
    </div>
@endsection

@section('scripts')
    <script id='verpez' type='text/x-kendo-tmpl'>
      <div class="btn-group-justified">
        <a href="/general/getModalInfoPezById/#=idpez#"
           class="btn btn-primary"
           data-modal="modal-md">
            <i class="fa fa-eye"></i> Ver Pez</a>
        <a href='/general/getModalGaleriaPezById/#=idpez#'
           class="btn btn-primary"
           data-modal="modal-xl">
            <i class="fa fa-image"></i> Ver Galeria</a>
    </div>


    </script>
    <script id='editarpez' type='text/x-kendo-tmpl'>
    <div class="btn-group-justified">
        <a href='/general/getModalEditarPezById/#=idpez#'
        class="btn btn-success"
        data-modal="modal-md">
        <i class="fa fa-wrench"></i> Editar Pez</a>
        <a href='/general/getModalEditarGaleriaPezById/#=idpez#'
        class="btn btn-success"
        data-modal="modal-md">
        <i class="fa fa-wrench"></i> Editar Galeria</a>
    </div>


    </script>
@endsection