@extends('layouts.Dashboard.Main')

@section('content')

    <div class="panel-primary">
        <div class="panel-body text-right">
            <a href="{{route('comparativaProcesos')}}"
               class="btn btn-back">
                <i class="fa fa-arrow-left"></i> Regresar</a>
        </div>
    </div>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-exchange"></i> Comparativa de Procesos</h3>
        </div>

        <div class="panel-body">
            <h4>Información de mi proceso</h4>
            <h6>Nombre: {{$dataProcesoUsuario->nombre}}</h6>
            <h6>Descripción: {{$dataProcesoUsuario->descripcion}}</h6>
            <h6>Fecha de Implementación: {{$dataProcesoUsuario->fechaimplementacion}}</h6>
            </br>
            <h4>Información del proceso de: {{$dataUsuario->nombreusuario}}</h4>
            <h6>Nombre: {{$dataProcesoColega->nombre}}</h6>
            <h6>Descripción: {{$dataProcesoColega->descripcion}}</h6>
            <h6>Fecha de Implementación: {{$dataProcesoColega->fechaimplementacion}}</h6>
        </div>

    </div>

    <div class="panel panel-primary" id="panelcomparativa">

        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-table"></i> Resultados comparativa de Procesos</h3>
        </div>

        <div class="panel-body">
            <div class="panel-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users"></i> Proceso comparado</h3>
                            </div>
                            <div class="panel-body">
                                <h5><strong>Especimenes</strong></h5>
                                <h6>Plantas en proceso: {{$dataResumenProcesoColega->plantas}}</h6>
                                <h6>Peces en proceso: {{$dataResumenProcesoColega->peces}}</h6>
                                </br>
                                <h5><strong>Caracteristicas proceso</strong></h5>
                                <h6>Area cultivo: {{$dataResumenProcesoColega->areacultivo}}</h6>
                                <h6>Volumen cultivo: {{$dataResumenProcesoColega->volumencultivo}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user"></i> Mi Proceso</h3>
                            </div>
                            <div class="panel-body">
                                <h5><strong>Especimenes</strong></h5>
                                <h6>Plantas en proceso: {{$dataResumenProcesoUsuario->plantas}}</h6>
                                <h6>Peces en proceso: {{$dataResumenProcesoUsuario->peces}}</h6>
                                </br>
                                <h5><strong>Caracteristicas proceso</strong></h5>
                                <h6>Area cultivo: {{$dataResumenProcesoUsuario->areacultivo}}</h6>
                                <h6>Volumen cultivo: {{$dataResumenProcesoUsuario->volumencultivo}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-exchange"></i> Comparativa</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 text-justify">
                                <h5><strong>Especimenes</strong></h5>
                                <h6>Plantas en común: {{$dataCoincidencias->coincidencias_plantas}}</h6>
                                <h6>Peces en común: {{$dataCoincidencias->coincidencias_peces}}</h6>
                                </br>
                                <h5><strong>Caracteristicas proceso</strong></h5>
                                <h6>Diferencia de
                                    area: {{abs($dataProcesoUsuario->areacultivo-$dataProcesoColega->areacultivo)}}</h6>
                                <h6>Diferencia de
                                    volumen: {{abs($dataProcesoUsuario->volumencultivo-$dataProcesoColega->volumencultivo)}}</h6>
                                </br>
                                <h5><strong>Descripción de resultado</strong></h5>
                                <?php
                                if ($dataCoincidencias->porcentaje_coincidencia <= 25) {
                                ?>
                                <p>El <strong>porcentaje de coincidencia</strong> es muy bajo y se recomienda no tomar
                                    esta comparacion como significativa para su sistema.</p>
                                <?php
                                } elseif ($dataCoincidencias->porcentaje_coincidencia > 25 && $dataCoincidencias->porcentaje_coincidencia < 50) {
                                ?>
                                <p>El <strong>porcentaje de coincidencia</strong> es bajo y se recomienda no tomar
                                    esta comparacion como significativa para su sistema, pero ciertos factores pueden
                                    beneficiar sus cultivo, tanto para los peces como para las plantas ya que su
                                    coincidencia
                                    en especimenes, puede ajustarse a sus necesidades</p>
                                <?php
                                } elseif ($dataCoincidencias->porcentaje_coincidencia > 50 && $dataCoincidencias->porcentaje_coincidencia < 75) {
                                ?>
                                <p>El <strong>porcentaje de coincidencia</strong> es moderadamente alto y la comparativa
                                    puede ser tomada como significativa para su sistema, la mayor parte de los factores
                                    pueden
                                    beneficiar sus cultivo, tanto para los peces como para las plantas ya que su
                                    coincidencia
                                    en especimenes se ajusta altamente a sus necesidades</p>
                                <?php
                                } elseif ($dataCoincidencias->porcentaje_coincidencia > 75) {
                                ?>
                                <p>El <strong>porcentaje de coincidencia</strong> es alto y la comparativa
                                    puede ser tomada como significativa para su sistema, la mayor parte de los factores
                                    pueden
                                    beneficiar sus cultivo, tanto para los peces como para las plantas ya que su
                                    coincidencia
                                    en especimenes se ajusta altamente a sus necesidades, recomendamos la comunicación
                                    con su colega, en caso de necesitar guia en el proceso</p>
                                <?php
                                }
                                ?>

                                <div class="panel-footer">
                                    <h5>Porcentaje de similitud
                                        <strong>{{number_format($dataCoincidencias->porcentaje_coincidencia, 2, ',', ' ')}}
                                            %</strong></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div id="example" class="k-content">
                                    <div id="gauge-container">
                                        <div id="gauge"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary" id="panelchartscomparativa">

        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-table"></i> Resultados comparativa de Procesos</h3>
        </div>

        <div class="panel-body">
            <div class="row">
                <?php
                $procesoUsuario = $dataResumenProcesoUsuario->procesoid;
                $procesoColega = $dataResumenProcesoColega->procesoid;
                ?>
                <div class="col-md-6">
                    @include('layouts.Panels.Procesos.chartValuesComparativaProceso',
                    ['idTipoSensor' => 2,
                    'nombreSensor'=>'Temperatura Agua',
                    'colorSensorUsuario'=>'FF9F11',
                    'colorSensorColega'=>'119BFF',
                    'unidadSensor'=>'°c',
                    'procesoUsuario'=>$procesoUsuario,
                    'procesoColega'=>$procesoColega])
                </div>
                <div class="col-md-6">
                    @include('layouts.Panels.Procesos.chartValuesComparativaProceso',
                    ['idTipoSensor' => 3,
                    'nombreSensor'=>'Temperatura Ambiente',
                    'colorSensorUsuario'=>'FFB70D',
                    'colorSensorColega'=>'0036B2',
                    'unidadSensor'=>'°c',
                    'procesoUsuario'=>$procesoUsuario,
                    'procesoColega'=>$procesoColega])
                </div>
                <div class="col-md-6">
                    @include('layouts.Panels.Procesos.chartValuesComparativaProceso',
                    ['idTipoSensor' => 6,
                    'nombreSensor'=>'Flujo',
                    'colorSensorUsuario'=>'4977FF',
                    'colorSensorColega'=>'B2850F',
                    'unidadSensor'=>'m³/s',
                    'procesoUsuario'=>$procesoUsuario,
                    'procesoColega'=>$procesoColega])
                </div>
                <div class="col-md-6">
                    @include('layouts.Panels.Procesos.chartValuesComparativaProceso',
                    ['idTipoSensor' => 1,
                    'nombreSensor'=>'Caudal',
                    'colorSensorUsuario'=>'000EFF',
                    'colorSensorColega'=>'B28E00',
                    'unidadSensor'=>'q',
                    'procesoUsuario'=>$procesoUsuario,
                    'procesoColega'=>$procesoColega])
                </div>
                <div class="col-md-6">
                    @include('layouts.Panels.Procesos.chartValuesComparativaProceso',
                    ['idTipoSensor' => 4,
                    'nombreSensor'=>'Amonio',
                    'colorSensorUsuario'=>'0CE86F',
                    'colorSensorColega'=>'E81F0C',
                    'unidadSensor'=>'mg/l',
                    'procesoUsuario'=>$procesoUsuario,
                    'procesoColega'=>$procesoColega])
                </div>
                <div class="col-md-6">
                    @include('layouts.Panels.Procesos.chartValuesComparativaProceso',
                    ['idTipoSensor' => 5,
                    'nombreSensor'=>'pH',
                    'colorSensorUsuario'=>'5737E8',
                    'colorSensorColega'=>'9B8A06',
                    'unidadSensor'=>'pH',
                    'procesoUsuario'=>$procesoUsuario,
                    'procesoColega'=>$procesoColega])
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>

        $(document).ready(function () {

            createGauges();

            $(document).bind("kendo:skinChange", function (e) {
                createGauges();
            });

        });

        function createGauges() {
            var value = $("#gauge-value").val();

            $("#gauge").kendoLinearGauge({
                pointer: {
                    value: '{{$dataCoincidencias->porcentaje_coincidencia}}'
                },

                scale: {
                    majorUnit: 10,
                    minorUnit: 1,
                    min: 0,
                    max: 100,
                    vertical: true,
                    ranges: [
                        {
                            from: 100,
                            to: 75,
                            color: "#14CC18"
                        }, {
                            from: 75,
                            to: 50,
                            color: "#2798df"
                        }, {
                            from: 50,
                            to: 25,
                            color: "#ffc700"
                        }, {
                            from: 25,
                            to: 0,
                            color: "#c20000"
                        }
                    ]
                }
            });
        }

    </script>
    <style>
        .k-readonly {
            color: gray;
        }

        #gauge-container {
            text-align: center;
            margin: 0 auto;
            background: transparent url({{url('/img/linear-gauge-container.png')}}) no-repeat 50% 50%;
            padding: 18px;
            width: 300px;
            height: 336px;
        }

        #gauge {
            height: 300px;
            display: inline-block;
            *display: inline;
            zoom: 1;
        }
    </style>
@endsection