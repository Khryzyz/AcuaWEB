@extends('layouts.admin.principal')

@section('content')

    <?php
    $Utils = new Utils();
    ?>

    <h3>Procesos</h3>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Información del usuario</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-book"></i>
                    Nombre:
                </div>
                <div class="col-md-10">
                    {{$dataUsuario[0]->nombreusuario}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-user"></i>
                    Usuario:
                </div>
                <div class="col-md-10">
                    {{$dataUsuario[0]->usuario}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-certificate"></i>
                    Tipo de Usuario:
                </div>
                <div class="col-md-10">
                    {{$dataUsuario[0]->tipousuario}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-envelope-o"></i>
                    Correo:
                </div>
                <div class="col-md-10">
                    {{$dataUsuario[0]->correousuario}}
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Registro de procesos del usuario</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <a href="../test/getModalTest" class="btn btn-primary" data-modal="modal-lg"><i class="fa fa-plus"></i>
                    Agregar proceso</a>
            </div>
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $read = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $read
                    ->url('procesos/getProcesosByIdUsuario/' . Auth::user()->id)
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
                    ->pageSize(10)
                    ->schema($schema)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $grid = new \Kendo\UI\Grid('GridKendo');

                //Inicializamos las columnas de la grid
                $idproceso = new \Kendo\UI\GridColumn();
                $idproceso->field('idproceso')->title('Id Proceso')->width(100);

                $nombre = new \Kendo\UI\GridColumn();
                $nombre->field('nombre')->title('Nombre')->width(200);

                $fechaimplementacion = new \Kendo\UI\GridColumn();
                $fechaimplementacion->field('fechaimplementacion')->title('Fecha Implementacion')->width(200);

                $estado = new \Kendo\UI\GridColumn();
                $estado->field('estado')->title('Estado')->width(100);

                $verproceso = new \Kendo\UI\GridColumn();
                $verproceso->field('verproceso')->title('Ver')->templateId('verproceso')->width(100);

                /*$gridFilterable = new \Kendo\UI\GridFilterable();
                $gridFilterable->mode("row");*/

                //Se agregan columnas y atributos al grid
                $grid
                    ->addColumn($idproceso, $nombre, $fechaimplementacion, $estado, $verproceso)
                    ->dataSource($dataSource)
                    ->sortable(true)
                    //->filterable($gridFilterable)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

                //renderizamos la grid
                echo $grid->render();
                ?>
            </div>
        </div>
    </div>
    <p>
        <?php
        //var_dump(Auth::user());
        ?>
    </p>

@endsection

<script id="verproceso" type="text/x-kendo-tmpl">
    <a href="../test/getModalTest/#=idproceso#" class="btn btn-primary" data-modal="">Ver Proceso</a>
</script>
