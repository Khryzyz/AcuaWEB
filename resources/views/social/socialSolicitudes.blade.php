@extends('layouts.Dashboard.Main')

@section('content')
    <div class="panel panel-green">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-users"></i> Solicitudes Recibidas</h3>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readSolicitudesRecibidas = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readSolicitudesRecibidas
                    ->url(route('solicitudesRecibidas'))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportSolicitudesRecibidas = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportSolicitudesRecibidas
                    ->read($readSolicitudesRecibidas)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                //Inicializamos el esquema de la grid
                $schemaSolicitudesRecibidas = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema de l grid
                $schemaSolicitudesRecibidas
                    ->data('data')
                    ->total('total');

                //Inicializamos el Data Source
                $dataSourceSolicitudesRecibidas = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourceSolicitudesRecibidas
                    ->transport($transportSolicitudesRecibidas)
                    ->pageSize(10)
                    ->schema($schemaSolicitudesRecibidas)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridSolicitudesRecibidas = new \Kendo\UI\Grid('GridSolicitudesRecibidas');

                //Inicializamos las columnas de la grid
                $campoUnoSolicitudesRecibidas = new \Kendo\UI\GridColumn();
                $campoUnoSolicitudesRecibidas->title('Avatar')->width(30);

                $campoDosSolicitudesRecibidas = new \Kendo\UI\GridColumn();
                $campoDosSolicitudesRecibidas->title('Nombre')->width(150);

                $campoTresSolicitudesRecibidas = new \Kendo\UI\GridColumn();
                $campoTresSolicitudesRecibidas->title('Detalles')->width(40);

                $campoCuatroSolicitudesRecibidas = new \Kendo\UI\GridColumn();
                $campoCuatroSolicitudesRecibidas->title('Accion')->width(70);

                //Se agregan columnas y atributos al grid
                $gridSolicitudesRecibidas
                    ->addColumn(
                        $campoUnoSolicitudesRecibidas,
                        $campoDosSolicitudesRecibidas,
                        $campoTresSolicitudesRecibidas,
                        $campoCuatroSolicitudesRecibidas)
                    ->dataSource($dataSourceSolicitudesRecibidas)
                    ->sortable(true)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true)
                    ->rowTemplateId('row-template')
                    ->altRowTemplateId('alt-row-template');

                //renderizamos la grid
                echo $gridSolicitudesRecibidas->render();
                ?>
            </div>
        </div>
    </div>

    <div class="panel panel-yellow">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-users"></i> Solicitudes Realizadas</h3>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readSolicitudesRealizadas = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readSolicitudesRealizadas
                    ->url(route('solicitudesRealizadas'))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportSolicitudesRealizadas = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportSolicitudesRealizadas
                    ->read($readSolicitudesRealizadas)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                //Inicializamos el esquema de la grid
                $schemaSolicitudesRealizadas = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema de l grid
                $schemaSolicitudesRealizadas
                    ->data('data')
                    ->total('total');

                //Inicializamos el Data Source
                $dataSourceSolicitudesRealizadas = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourceSolicitudesRealizadas
                    ->transport($transportSolicitudesRealizadas)
                    ->pageSize(10)
                    ->schema($schemaSolicitudesRealizadas)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridSolicitudesRealizadas = new \Kendo\UI\Grid('GridSolicitudesRealizadas');

                //Inicializamos las columnas de la grid
                $campoUnoSolicitudesRealizadas = new \Kendo\UI\GridColumn();
                $campoUnoSolicitudesRealizadas->title('Avatar')->width(30);

                $campoDosSolicitudesRealizadas = new \Kendo\UI\GridColumn();
                $campoDosSolicitudesRealizadas->title('Nombre')->width(150);

                $campoTresSolicitudesRealizadas = new \Kendo\UI\GridColumn();
                $campoTresSolicitudesRealizadas->title('Detalles')->width(40);

                $campoCuatroSolicitudesRealizadas = new \Kendo\UI\GridColumn();
                $campoCuatroSolicitudesRealizadas->title('Accion')->width(70);

                //Se agregan columnas y atributos al grid
                $gridSolicitudesRealizadas
                    ->addColumn(
                        $campoUnoSolicitudesRealizadas,
                        $campoDosSolicitudesRealizadas,
                        $campoTresSolicitudesRealizadas,
                        $campoCuatroSolicitudesRealizadas)
                    ->dataSource($dataSourceSolicitudesRealizadas)
                    ->sortable(true)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true)
                    ->rowTemplateId('row-template')
                    ->altRowTemplateId('alt-row-template');

                //renderizamos la grid
                echo $gridSolicitudesRealizadas->render();
                ?>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script id="row-template" type="text/x-kendo-template">
        <tr data-uid="#: idusuario #">
            <td class="avatar">
                <img src="#if(data.avatar){#/img/avatar/#: data.avatar ##}else{#/img/sin_avatar.png#}#"
                     alt="#: idusuario #"
                     class="img-responsive img-rounded"/>
            </td>
            <td class="titulo">
                #: nombreusuario #
                <p class="estado"> #: estado #</p>
            </td>
            <td class="detalle">
                <p>Procesos: #: procesos #</p>
                <p>Plantas: #: plantas #</p>
                <p>Peces: #: peces #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/configuracion/modalEditarInfoGaleria/#=idusuario#"
                       data-modal="modal-sm"
                       class="btn btn-on-status" style="color: white">
                        <i class="fa fa-plus"></i> Aceptar
                    </a>
                    <a href="/configuracion/modalEditarInfoGaleria/#=idusuario#"
                       data-modal="modal-sm"
                       class="btn btn-off-status" style="color: white">
                        <i class="fa fa-minus"></i> Rechazar
                    </a>
                </div>
            </td>
        </tr>
    </script>
    <script id="alt-row-template" type="text/x-kendo-template">
        <tr class="k-alt" data-uid="#: idGaleria #">
            <td class="avatar">
                <img src="#if(data.avatar){#/img/avatar/#: data.avatar ##}else{#/img/sin_avatar.png#}#"
                     alt="#: idusuario #"
                     class="img-responsive img-rounded"/>
            </td>
            <td class="titulo">
                #: nombreusuario #
                <p class="estado"> #: estado #</p>
            </td>
            <td class="detalle">
                <p>Procesos: #: procesos #</p>
                <p>Plantas: #: plantas #</p>
                <p>Peces: #: peces #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/configuracion/modalEditarInfoGaleria/#=idusuario#"
                       data-modal="modal-sm"
                       class="btn btn-on-status" style="color: white">
                        <i class="fa fa-plus"></i> Aceptar
                    </a>
                    <a href="/configuracion/modalEditarInfoGaleria/#=idusuario#"
                       data-modal="modal-sm"
                       class="btn btn-off-status" style="color: white">
                        <i class="fa fa-minus"></i> Rechazar
                    </a>
                </div>
            </td>
        </tr>
    </script>
    <style>

        .titulo {
            font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
            font-size: 20px;
            font-weight: bold;
            color: #898989;
            align-items: center;
        }

        p.estado {
            font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
            font-size: 15px;
            font-weight: bold;
            color: #565656;
            align-items: center;
        }

        td.avatar {
            text-align: center;
            width: 80em;
        }

        td.titulo, p.estado {
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