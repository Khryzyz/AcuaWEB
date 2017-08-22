@extends('layouts.Dashboard.Main')

@section('content')

    <?php
    $Utils = new Utils();
    ?>

    <div class="panel-primary">
        <div class="panel-body text-right">
            <a href="{{route('getViewInfoCaracteristicasProcesoById', ['idProceso' => $data->id])}}"
               class="btn btn-view">
                <i class="fa fa-wrench"></i> Características del proceso</a>
        </div>
    </div>

    @include('layouts.Panels.Procesos.infoProceso')

    <div class="panel panel-success">
        <div class="panel-heading">
            <h4><i class="fa fa-leaf"></i> Editar plantas asociadas al proceso {{$data->nombre}}</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readPlantas = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPlantas
                    ->url(route('getPlantasByUsuarioIdForProceso', ['idProceso' => $data->id]))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportPlantas = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportPlantas
                    ->read($readPlantas)
                    ->parameterMap('function(data) { return kendo.stringify(data); }');

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
                    ->pageSize(5)
                    ->schema($schemaPlantas)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridPlantas = new \Kendo\UI\Grid('GridEspecimenPlanta');

                //Inicializamos las columnas de la grid
                $imagenPlanta = new \Kendo\UI\GridColumn();
                $imagenPlanta
                    ->width(50)
                    ->title('Imagen');

                $nombrePlanta = new \Kendo\UI\GridColumn();
                $nombrePlanta
                    ->width(100)
                    ->title('Nombre');

                $detallePlanta = new \Kendo\UI\GridColumn();
                $detallePlanta
                    ->width(150)
                    ->title('Detalle');

                $accionPlanta = new \Kendo\UI\GridColumn();
                $accionPlanta
                    ->width(80)
                    ->title('Acción');

                //Se agregan columnas y atributos al grid
                $gridPlantas
                    ->addColumn(
                        $imagenPlanta,
                        $nombrePlanta,
                        $detallePlanta,
                        $accionPlanta
                    )
                    ->rowTemplateId('row-template')
                    ->altRowTemplateId('alt-row-template')
                    ->dataSource($dataSourcePlantas)
                    ->sortable(true)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

                //renderizamos la grid
                echo $gridPlantas->render();
                ?>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class="fa fa-tint"></i> Editar peces asociados al proceso {{$data->nombre}}</h4>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readPeces = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readPeces
                    ->url(route('getPecesByUsuarioIdForProceso', ['idProceso' => $data->id]))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportPeces = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportPeces
                    ->read($readPeces)
                    ->parameterMap('function(data) { return kendo.stringify(data); }');

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
                    ->pageSize(5)
                    ->schema($schemaPeces)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridPeces = new \Kendo\UI\Grid('GridEspecimenPez');

                //Inicializamos las columnas de la grid
                $imagenPez = new \Kendo\UI\GridColumn();
                $imagenPez
                    ->width(50)
                    ->title('Imagen');

                $nombrePez = new \Kendo\UI\GridColumn();
                $nombrePez
                    ->width(100)
                    ->title('Nombre');

                $detallePez = new \Kendo\UI\GridColumn();
                $detallePez
                    ->width(150)
                    ->title('Detalle');

                $accionPez = new \Kendo\UI\GridColumn();
                $accionPez
                    ->width(80)
                    ->title('Acción');

                //Se agregan columnas y atributos al grid
                $gridPeces
                    ->addColumn(
                        $imagenPez,
                        $nombrePez,
                        $detallePez,
                        $accionPez
                    )
                    ->rowTemplateId('row-template')
                    ->altRowTemplateId('alt-row-template')
                    ->dataSource($dataSourcePeces)
                    ->sortable(true)
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
    <script id="row-template" type="text/x-kendo-template">
        <tr data-uid="#: id #">
            <td class="imagen">
                <img src="#if(data.imagen){#/img/gallery/#: data.imagen ##}else{#/img/sin_imagen.png#}#" alt="#: id #"
                     class="img-responsive img-rounded"/>
            </td>
            <td class="nombre">
                #: nombre #
            </td>
            <td class="detalle">
                <p>Fecha Actualización: #: actualizacion #</p>
                <p>Usuario: #: usuario #</p>
                <p>Tipo Acceso: #: acceso #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href='/procesos/modalAsociarEspecimenProceso/#=id#/{{$data->id}}/#=tipoespecimen#/#=estado#/' data-modal="modal-sm"
                    #if(estado == '1'){#
                        class="btn btn-on-status ">
                        <i class="fa fa-check-circle"></i> Agregar
                    #}else{#
                        class="btn btn-off-status ">
                        <i class="fa fa-circle"></i> Retirar
                    #}#
                    </a>
                </div>
            </td>
        </tr>
    </script>
    <script id="alt-row-template" type="text/x-kendo-template">
        <tr class="k-alt" data-uid="#: id #">
            <td class="imagen">
                <img src="#if(data.imagen){#/img/gallery/#: data.imagen ##}else{#/img/sin_imagen.png#}#" alt="#: id #"
                     class="img-responsive img-rounded"/>
            </td>
            <td class="nombre">
                #: nombre #
            </td>
            <td class="detalle">
                <p>Fecha Actualización: #: actualizacion #</p>
                <p>Usuario: #: usuario #</p>
                <p>Tipo Acceso: #: acceso #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href='/procesos/modalAsociarEspecimenProceso/#=id#/{{$data->id}}/#=tipoespecimen#/#=estado#' data-modal="modal-sm"
                    #if(estado == '1'){#
                        class="btn btn-on-status ">
                        <i class="fa fa-check-circle"></i> Agregar
                    #}else{#
                        class="btn btn-off-status ">
                        <i class="fa fa-circle"></i> Retirar
                    #}#
                    </a>
                </div>
            </td>
        </tr>
    </script>
    <style>

        .nombre {
            font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
            font-size: 30px;
            font-weight: bold;
            color: #898989;
            align-items: center;
        }

        td.imagen {
            text-align: center;
        }

        td.nombre {
            text-align: left;
        }

        .k-grid-header .k-header {
            padding: 10px 20px;
        }

        .k-grid td {
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.15) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0.05)), color-stop(100%, rgba(0, 0, 0, 0.15)));
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.15) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.15) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.15) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.15) 100%);
            padding: 20px;
        }

        .k-grid .k-alt td {
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0.2)), color-stop(100%, rgba(0, 0, 0, 0.1)));
            background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.1) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.1) 100%);
        }
    </style>
@endsection