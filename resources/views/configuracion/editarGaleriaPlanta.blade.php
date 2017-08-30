@extends('layouts.Dashboard.Main')

@section('content')

    <div class="panel-body">

        @include('layouts.Panels.Usuario.infoUsuario')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-leaf"></i> Galeria {{$data->nombre}}</h3>
            </div>
            <div class="panel-body">
                <div class="panel-group">
                    <a href="{{route('modalAgregarImagen', ['id' => $data->idplanta,'tipo'=>1])}}"
                       class="btn btn-add"
                       data-modal="modal-md">
                        <i class="fa fa-plus"></i>
                        Agregar Imagen</a>
                </div>
                <div class="panel-group">
                    <?php

                    //Inicializamos el Data Source de Transporte de lectura
                    $readPlantas = new \Kendo\Data\DataSourceTransportRead();

                    //Agregamos atributos al datasource de transporte de lectura
                    $readPlantas
                        ->url(route('getInfoGaleriaPlantaById', ['idPlanta' => $data->idplanta]))
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
                    $gridPlantas = new \Kendo\UI\Grid('GridGaleria');

                    //Inicializamos las columnas de la grid
                    $imagenPlanta = new \Kendo\UI\GridColumn();
                    $imagenPlanta
                        ->width(50)
                        ->title('Imagen');

                    $tituloPlanta = new \Kendo\UI\GridColumn();
                    $tituloPlanta
                        ->width(100)
                        ->title('Titulo');

                    $detallePlanta = new \Kendo\UI\GridColumn();
                    $detallePlanta
                        ->width(100)
                        ->title('Detalle');

                    $accionPlanta = new \Kendo\UI\GridColumn();
                    $accionPlanta
                        ->width(80)
                        ->title('Acción');

                    //Se agregan columnas y atributos al grid
                    $gridPlantas
                        ->addColumn(
                            $imagenPlanta,
                            $tituloPlanta,
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
    </div>
@endsection
@section('scripts')
    <script id="row-template" type="text/x-kendo-template">
        <tr data-uid="#: idGaleria #">
            <td class="imagen">
                <img src="#if(data.imagen){#/img/gallery/#: data.imagen ##}else{#/img/sin_imagen.png#}#"
                     alt="#: idGaleria #"
                     class="img-responsive img-rounded"/>
            </td>
            <td class="titulo">
                #: titulo #
                <p class="descripcion"> #: descripcion #</p>
            </td>
            <td class="detalle">
                #if(data.estado == 1){#
                <p class="estado">
                    Activo
                </p>
                #}else{#
                <p class="estado">
                    Inactivo
                </p>
                #}#
                <p>Creación: #: creado #</p>
                <p>Actualización: #: actualizado #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/configuracion/modalEditarInfoGaleria/#=idGaleria#"
                       data-modal="modal-sm"
                       class="btn btn-edit #if(estado== '2'){# disabled #}#">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                    <a href="/configuracion/modalEstadoGaleria/#=idGaleria#/#=estado#"
                       data-modal="modal-sm"
                       #if(estado== '1'){#
                    class="btn btn-off-status">
                    <i class="fa fa-power-off"></i> Desactivar</a>
                    #}else{#
                    class="btn btn-on-status ">
                    <i class="fa fa-power-off"></i> Activar
                    #}#
                    </a>
                </div>
            </td>
        </tr>
    </script>
    <script id="alt-row-template" type="text/x-kendo-template">
        <tr class="k-alt" data-uid="#: idGaleria #">
            <td class="imagen">
                <img src="#if(data.imagen){#/img/gallery/#: data.imagen ##}else{#/img/sin_imagen.png#}#"
                     alt="#: idGaleria #"
                     class="img-responsive img-rounded"/>
            </td>
            <td class="titulo">
                #: titulo #
                <p class="descripcion"> #: descripcion #</p>
            </td>
            <td class="detalle">
                #if(data.estado == 1){#
                <p class="estado">
                    Activo
                </p>
                #}else{#
                <p class="estado">
                    Inactivo
                </p>
                #}#
                <p>Creación: #: creado #</p>
                <p>Actualización: #: actualizado #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/configuracion/modalEditarInfoGaleria/#=idGaleria#"
                       data-modal="modal-sm"
                       class="btn btn-edit #if(estado== '2'){# disabled #}#">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                    <a href="/configuracion/modalEstadoGaleria/#=idGaleria#/#=estado#"
                       data-modal="modal-sm"
                       #if(estado== '1'){#
                    class="btn btn-off-status">
                    <i class="fa fa-power-off"></i> Desactivar
                    #}else{#
                    class="btn btn-on-status ">
                    <i class="fa fa-power-off"></i> Activar
                    #}#
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

        p.descripcion {
            font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
            font-size: 15px;
            font-weight: bold;
            color: #565656;
            align-items: center;
        }

        td.imagen {
            text-align: center;
        }

        td.titulo, p.descripcion {
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