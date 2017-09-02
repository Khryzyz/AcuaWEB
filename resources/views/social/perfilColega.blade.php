@extends('layouts.Dashboard.Main')

@section('content')
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> Información registrada en el sistema</h3>
        </div>
        <div class="panel-body">

            <div class="row margin-bottom-10">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-photo"></i> Avatar</h3>
                        </div>
                        <div class="panel-body text-center">
                            <!-- Imagen -->
                            <?php if($data->avatar){
                            ?>
                            <img src="{{url('/img/avatar/'.$data->avatar)}}" class="img-responsive img-thumbnail"
                                 alt="Avatar"
                                 width="200em"/>
                            <?php
                            }else{
                            ?>
                            <img src="{{url('/img/sin_avatar.png')}}" class="img-responsive img-thumbnail" alt="Avatar"
                                 width="200em"/>
                        <?php
                        }
                        ?>
                        <!-- FIN Imagen -->
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Información personal</h3>
                        </div>
                        <div class="panel-body">


                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    <strong>Correo:</strong>
                                </div>
                                <div class="col-md-10">
                                    {{$data->correo}}
                                </div>
                            </div>


                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    <strong>Primer Nombre:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->primer_nombre}}
                                </div>
                                <div class="col-md-2">
                                    <strong>Segundo Nombre:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->segundo_nombre}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-2">
                                    <strong>Primer Apellido:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->primer_apellido}}
                                </div>
                                <div class="col-md-2">
                                    <strong>Segundo Apellido:</strong>
                                </div>
                                <div class="col-md-4">
                                    {{$data->segundo_apellido}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-laptop"></i> Record de la aplicación</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row margin-bottom-10">
                                <div class="col-md-5">
                                    <strong>Número de procesos a cargo:</strong>
                                </div>
                                <div class="col-md-7">
                                    {{$data->procesos}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-5">
                                    <strong>Especimenes plantas registradas:</strong>
                                </div>
                                <div class="col-md-7">
                                    {{$data->peces}}
                                </div>
                            </div>

                            <div class="row margin-bottom-10">
                                <div class="col-md-5">
                                    <strong>Especimenes peces registrados:</strong>
                                </div>
                                <div class="col-md-7">
                                    {{$data->plantas}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-leaf"></i> Plantas registradas en el sistema</h3>
        </div>
        <div class="panel-body">
            <?php

            //Inicializamos el Data Source de Transporte de lectura
            $readPlantas = new \Kendo\Data\DataSourceTransportRead();

            //Agregamos atributos al datasource de transporte de lectura
            $readPlantas
                ->url(route('getPlantasByColegaId', ['usuarioid' => $data->idusuario]))
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
            $estado->field('estado')->title('Estado')->width(60);

            $verplanta = new \Kendo\UI\GridColumn();
            $verplanta->field('verplanta')->title('Ver')->templateId('verplanta')->width(125);

            $gridFilterable = new \Kendo\UI\GridFilterable();
            $gridFilterable->mode("row");

            //Se agregan columnas y atributos al grid
            $gridPlantas
                ->addColumn(
                    $nombre,
                    $actualizacion,
                    $estado,
                    $verplanta)
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

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tint"></i> Peces registrados en el sistema</h3>
        </div>
        <div class="panel-body">
            <?php

            //Inicializamos el Data Source de Transporte de lectura
            $readPeces = new \Kendo\Data\DataSourceTransportRead();

            //Agregamos atributos al datasource de transporte de lectura
            $readPeces
                ->url(route('getPecesByColegaId', ['usuarioid' => $data->idusuario]))
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
            $nombre = new \Kendo\UI\GridColumn();
            $nombre->field('nombre')->title('Nombre')->width(100);

            $actualizacion = new \Kendo\UI\GridColumn();
            $actualizacion->field('actualizacion')->title('Ultima Actualización')->width(80);

            $estado = new \Kendo\UI\GridColumn();
            $estado->field('estado')->title('Estado')->width(60);

            $verpez = new \Kendo\UI\GridColumn();
            $verpez->field('verpez')->title('Ver')->templateId('verpez')->width(125);

            $gridFilterable = new \Kendo\UI\GridFilterable();
            $gridFilterable->mode("row");

            //Se agregan columnas y atributos al grid
            $gridPeces
                ->addColumn(
                    $nombre,
                    $actualizacion,
                    $estado,
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
@endsection


@section('scripts')
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

    <script id='verpez' type='text/x-kendo-tmpl'>
      <div class="btn-group-justified">
        <a href="/general/getModalInfoPezById/#=idpez#"
           class="btn btn-view"
           data-modal="modal-md">
            <i class="fa fa-tint"></i> Ver Pez</a>
           <a href='/general/getModalGaleriaPezById/#=idpez#'
           class="btn btn-view #if(conteogaleria < 1){# disabled #}# "
           data-modal="modal-xl">
           <i class="fa fa-image"></i> Ver Galeria</a>
    </div>


    </script>

@endsection