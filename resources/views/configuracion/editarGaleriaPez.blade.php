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
                    <a href="{{route('modalAgregarImagen', ['id' => $data->idpez,'tipo'=>2])}}"
                       class="btn btn-add"
                       data-modal="modal-md">
                        <i class="fa fa-plus"></i>
                        Agregar Imagen</a>
                </div>
                <div class="panel-group">
                    <?php

                    //Inicializamos el Data Source de Transporte de lectura
                    $readPez = new \Kendo\Data\DataSourceTransportRead();

                    //Agregamos atributos al datasource de transporte de lectura
                    $readPez
                        ->url(route('getInfoGaleriaPezById', ['idPez' => $data->idpez]))
                        ->data(['_token' => csrf_token()])
                        ->contentType('application/json')
                        ->type('POST');

                    //Inicializamos el Data Source de Transporte
                    $transportPez = new \Kendo\Data\DataSourceTransport();

                    //Agregamos atributos al datasource de transporte
                    $transportPez
                        ->read($readPez)
                        ->parameterMap('function(data) { return kendo.stringify(data); }');

                    //Inicializamos el esquema de la grid
                    $schemaPez = new \Kendo\Data\DataSourceSchema();

                    //Agregamos los aributos del esquema de l grid
                    $schemaPez
                        ->data('data')
                        ->total('total');

                    //Inicializamos el Data Source
                    $dataSourcePez = new \Kendo\Data\DataSource();

                    //Agregamos atributos al datasource
                    $dataSourcePez
                        ->transport($transportPez)
                        ->pageSize(5)
                        ->schema($schemaPez)
                        ->serverFiltering(true)
                        ->serverSorting(true)
                        ->serverPaging(true);

                    //Inicializamos la grid
                    $gridPez = new \Kendo\UI\Grid('GridGaleria');

                    //Inicializamos las columnas de la grid
                    $imagenPez = new \Kendo\UI\GridColumn();
                    $imagenPez
                        ->width(50)
                        ->title('Imagen');

                    $tituloPez = new \Kendo\UI\GridColumn();
                    $tituloPez
                        ->width(100)
                        ->title('Titulo');

                    $estadoPez = new \Kendo\UI\GridColumn();
                    $estadoPez
                        ->width(30)
                        ->title('Estado');

                    $detallePez = new \Kendo\UI\GridColumn();
                    $detallePez
                        ->width(100)
                        ->title('Detalle');

                    $accionPez = new \Kendo\UI\GridColumn();
                    $accionPez
                        ->width(50)
                        ->title('Acción');

                    //Se agregan columnas y atributos al grid
                    $gridPez
                        ->addColumn(
                            $imagenPez,
                            $tituloPez,
                            $estadoPez,
                            $detallePez,
                            $accionPez
                        )
                        ->rowTemplateId('row-template')
                        ->altRowTemplateId('alt-row-template')
                        ->dataSource($dataSourcePez)
                        ->sortable(true)
                        ->dataBound('handleAjaxModal')
                        ->pageable(true);

                    //renderizamos la grid
                    echo $gridPez->render();
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
            #if(data.estado=1){#
            <td class="estado">
                Activo
            </td>
            #}else{#
            <td class="estado">
                Inactivo
            </td>
            #}#
            <td class="detalle">
                <p>Creación: #: creado #</p>
                <p>Actualización: #: actualizado #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/general/getModalEstadoElemento/#=idGaleria#/4/"
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
            #if(data.estado=1){#
            <td class="estado">
                Activo
            </td>
            #}else{#
            <td class="estado">
                Inactivo
            </td>
            #}#
            <td class="detalle">
                <p>Creación: #: creado #</p>
                <p>Actualización: #: actualizado #</p>
            </td>
            <td class="accion">
                <div class="btn-group-justified">
                    <a href="/general/getModalEstadoElemento/#=idGaleria#/4/"
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

        .titulo, .estado {
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

        td.imagen, td.estado {
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