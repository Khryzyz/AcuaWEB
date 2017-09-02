@extends('layouts.Dashboard.Main')

@section('content')
    <div class="panel panel-green">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-users"></i> Lista de colegas</h3>
        </div>
        <div class="panel-body">
            <div class="panel-group">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $readColegas = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $readColegas
                    ->url(route('listColegas'))
                    ->contentType('application/json')
                    ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transportColegas = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transportColegas
                    ->read($readColegas)
                    ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

                //Inicializamos el esquema de la grid
                $schemaColegas = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema de l grid
                $schemaColegas
                    ->data('data')
                    ->total('total');

                //Inicializamos el Data Source
                $dataSourceColegas = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSourceColegas
                    ->transport($transportColegas)
                    ->pageSize(10)
                    ->schema($schemaColegas)
                    ->serverFiltering(true)
                    ->serverSorting(true)
                    ->serverPaging(true);

                //Inicializamos la grid
                $gridColegas = new \Kendo\UI\Grid('GridColegas');

                //Inicializamos las columnas de la grid
                $campoUnoColegas = new \Kendo\UI\GridColumn();
                $campoUnoColegas->title('Avatar')->width(30);

                $campoDosColegas = new \Kendo\UI\GridColumn();
                $campoDosColegas->title('Nombre')->width(150);

                $campoTresColegas = new \Kendo\UI\GridColumn();
                $campoTresColegas->title('Detalles')->width(50);

                $campoCuatroColegas = new \Kendo\UI\GridColumn();
                $campoCuatroColegas->title('Accion')->width(70);

                //Se agregan columnas y atributos al grid
                $gridColegas
                    ->addColumn(
                        $campoUnoColegas,
                        $campoDosColegas,
                        $campoTresColegas,
                        $campoCuatroColegas)
                    ->dataSource($dataSourceColegas)
                    ->sortable(true)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true)
                    ->rowTemplateId('row-template')
                    ->altRowTemplateId('alt-row-template');

                //renderizamos la grid
                echo $gridColegas->render();
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
                #: correo #
                <p class="estado"> Estado: #: estado #</p>
            </td>
            <td class="detalle">
                <h6>Procesos: #: procesos #</h6>
                <h6>Plantas: #: plantas #</h6>
                <h6>Peces: #: peces #</h6>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/social/perfilColega/#=idusuario#"
                       class="btn btn-view" style="color: white">
                        <i class="fa fa-user"></i> Ver perfil
                    </a>
                    <a href="/social/estadoColega/#=idusuario#"
                       data-modal="modal-sm"
                       class="btn btn-off-status" style="color: white">
                        <i class="fa fa-minus"></i> Eliminar
                    </a>
                </div>
            </td>
        </tr>
    </script>
    <script id="alt-row-template" type="text/x-kendo-template">
        <tr class="k-alt" data-uid="#: idusuario #">
            <td class="avatar">
                <img src="#if(data.avatar){#/img/avatar/#: data.avatar ##}else{#/img/sin_avatar.png#}#"
                     alt="#: idusuario #"
                     class="img-responsive img-rounded"/>
            </td>
            <td class="titulo">
                #: nombreusuario #
                <p class="estado"> Estado: #: estado #</p>
            </td>
            <td class="detalle">
                <h6>Procesos: #: procesos #</h6>
                <h6>Plantas: #: plantas #</h6>
                <h6>Peces: #: peces #</h6>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/social/perfilColega/#=idusuario#"
                       class="btn btn-view" style="color: white">
                        <i class="fa fa-user"></i> Ver perfil
                    </a>
                    <a href="/social/estadoColega/#=idusuario#"
                       data-modal="modal-sm"
                       class="btn btn-off-status" style="color: white">
                        <i class="fa fa-minus"></i> Eliminar
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