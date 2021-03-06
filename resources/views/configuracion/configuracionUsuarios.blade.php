@extends('layouts.Dashboard.Main')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-users"></i> Usuarios registrados en el sistema</h3>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <a href="{{route('modalAgregarUsuario')}}" class="btn btn-add" data-modal="modal-md">
                    <i class="fa fa-plus"></i>
                    Agregar Usuario</a>
            </div>
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readUsuarios = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readUsuarios
                    ->url(route('getUsuarios'))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportUsuarios = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportUsuarios
                    ->read($readUsuarios)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                //Inicializamos el esquema de la grid
                $schemaUsuarios = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema de l grid
                $schemaUsuarios
                    ->data('data')
                    ->total('total');

                $gridGroupItemUsuarios = new Kendo\Data\DataSourceGroupItem();
                $gridGroupItemUsuarios->field('rol');

                //Inicializamos el Data Source
                $dataSourceUsuarios = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourceUsuarios
                    ->addGroupItem($gridGroupItemUsuarios)
                    ->transport($transportUsuarios)
                    ->pageSize(10)
                    ->schema($schemaUsuarios)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridUsuarios = new \Kendo\UI\Grid('GridUsuarios');

                //Inicializamos las columnas de la grid
                $idusuario = new \Kendo\UI\GridColumn();
                $idusuario->field('idusuario')->title('Id')->hidden(true);

                $usuario = new \Kendo\UI\GridColumn();
                $usuario->field('usuario')->title('Usuario')->width(80);

                $email = new \Kendo\UI\GridColumn();
                $email->field('email')->title('Email')->width(90);

                $nombre = new \Kendo\UI\GridColumn();
                $nombre->field('nombre')->title('Nombre')->width(150);

                $estadousuario = new \Kendo\UI\GridColumn();
                $estadousuario->field('estadousuario')->title('Estado')->templateId('estadousuario')->width(70);

                // $editarusuario = new \Kendo\UI\GridColumn();
                // $editarusuario->field('editarusuario')->title('Editar')->templateId('editarusuario')->width(70);

                $verusuario = new \Kendo\UI\GridColumn();
                $verusuario->field('verusuario')->title('Ver')->templateId('verusuario')->width(70);

                //Se agregan columnas y atributos al grid
                $gridUsuarios
                    ->addColumn($idusuario,
                        $usuario,
                        $email,
                        $nombre,
                        $estadousuario,
                        //$editarusuario,
                        $verusuario)
                    ->dataSource($dataSourceUsuarios)
                    ->sortable(true)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

                //renderizamos la grid
                echo $gridUsuarios->render();
                ?>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script id='estadousuario' type='text/x-kendo-tmpl'>
    <div class="btn-group-justified">
        #if(estado == 'Activo'){#
            <a href="/general/getModalEstadoElemento/#=idusuario#/1/"
            class="btn btn-off-status"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Desactivar</a>
        #} else {#
            <a href="/general/getModalEstadoElemento/#=idusuario#/1/"
            class="btn btn-on-status"
            data-modal="modal-sm">
            <i class="fa fa-power-off"></i> Activar</a>
        #}#
        </div>
    </script>
    <script id='editarusuario' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
            <a href='procesos/getViewInfoCaracteristicasProcesoById/#=idusuario#'
            class='btn btn-edit'>
            <i class="fa fa-wrench"> </i>Editar Usuario</a>
        </div>
    </script>
    <script id='verusuario' type='text/x-kendo-tmpl'>
        <div class="btn-group-justified">
             <a href="/general/getModalInfoUsuarioById/#=idusuario#"
            class="btn btn-view"
            data-modal="modal-xl">
            <i class="fa fa-user"></i> Ver Usuario</a>
        </div>
    </script>
@endsection