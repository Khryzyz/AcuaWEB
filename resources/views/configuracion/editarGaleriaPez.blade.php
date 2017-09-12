@extends('layouts.Dashboard.Main')

@section('content')

    <div class="panel-primary">
        <div class="panel-body text-right">
            <a href="{{route('configMisPeces')}}"
               class="btn btn-back">
                <i class="fa fa-arrow-left"></i> Regresar</a>
        </div>
    </div>

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

                $detallePez = new \Kendo\UI\GridColumn();
                $detallePez
                    ->width(100)
                    ->title('Detalle');

                $accionPez = new \Kendo\UI\GridColumn();
                $accionPez
                    ->width(80)
                    ->title('Acción');

                //Se agregan columnas y atributos al grid
                $gridPez
                    ->addColumn(
                        $imagenPez,
                        $tituloPez,
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